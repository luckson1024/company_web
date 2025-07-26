<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $manager;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        // Create test users
        $this->admin = User::factory()->create()->assignRole('admin');
        $this->manager = User::factory()->create()->assignRole('manager');
        $this->user = User::factory()->create()->assignRole('user');
    }

    /** @test */
    public function admin_can_access_all_admin_routes()
    {
        $routes = [
            '/admin/dashboard',
            '/admin/users',
            '/admin/services',
            '/admin/settings'
        ];

        foreach ($routes as $route) {
            $this->actingAs($this->admin)
                ->get($route)
                ->assertStatus(200);
        }
    }

    /** @test */
    public function manager_has_limited_access()
    {
        // Should have access to
        $this->actingAs($this->manager)
            ->get('/admin/dashboard')
            ->assertStatus(200);

        // Should not have access to
        $this->actingAs($this->manager)
            ->get('/admin/settings')
            ->assertStatus(403);
    }

    /** @test */
    public function regular_user_cannot_access_admin_routes()
    {
        $routes = [
            '/admin/dashboard',
            '/admin/users',
            '/admin/services',
            '/admin/settings'
        ];

        foreach ($routes as $route) {
            $this->actingAs($this->user)
                ->get($route)
                ->assertStatus(403);
        }
    }

    /** @test */
    public function admin_can_update_system_settings()
    {
        $settings = [
            'site_name' => 'Updated Site Name',
            'contact_email' => 'new@example.com',
            'maintenance_mode' => true
        ];

        $response = $this->actingAs($this->admin)
            ->post('/admin/settings', $settings);

        $response->assertStatus(302);
        $this->assertDatabaseHas('settings', [
            'key' => 'site_name',
            'value' => 'Updated Site Name'
        ]);
    }

    /** @test */
    public function admin_can_manage_user_permissions()
    {
        $newPermission = Permission::create(['name' => 'test.permission']);
        
        $response = $this->actingAs($this->admin)
            ->post("/admin/users/{$this->manager->id}/permissions", [
                'permissions' => [$newPermission->id]
            ]);

        $response->assertStatus(302);
        $this->assertTrue($this->manager->fresh()->hasPermissionTo('test.permission'));
    }

    /** @test */
    public function admin_can_access_activity_logs()
    {
        // Create some activity
        $this->actingAs($this->admin)
            ->post('/admin/users', User::factory()->raw());

        $response = $this->actingAs($this->admin)
            ->get('/admin/activity-logs');

        $response->assertStatus(200)
            ->assertSee('Activity Logs')
            ->assertSee('Created user');
    }

    /** @test */
    public function admin_can_manage_roles()
    {
        $response = $this->actingAs($this->admin)
            ->post('/admin/roles', [
                'name' => 'new-role',
                'permissions' => []
            ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('roles', ['name' => 'new-role']);
    }

    /** @test */
    public function admin_can_view_system_information()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/system-info');

        $response->assertStatus(200)
            ->assertSee('System Information')
            ->assertSee('PHP Version')
            ->assertSee('Laravel Version')
            ->assertSee('Database');
    }
}
