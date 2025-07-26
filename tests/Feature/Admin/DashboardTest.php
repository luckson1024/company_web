<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        // Create admin user
        $this->admin = User::factory()->create()->assignRole('admin');

        // Create some test users with different roles
        User::factory()->count(3)->create()->each(fn($user) => $user->assignRole('manager'));
        User::factory()->count(5)->create()->each(fn($user) => $user->assignRole('user'));
    }

    /** @test */
    public function dashboard_shows_correct_user_count()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('Total Users: 9'); // 1 admin + 3 managers + 5 users
    }

    /** @test */
    public function dashboard_shows_correct_role_breakdown()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('Administrators: 1')
            ->assertSee('Managers: 3')
            ->assertSee('Users: 5');
    }

    /** @test */
    public function dashboard_shows_recent_activities()
    {
        $newUser = User::factory()->create();
        
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('New user registered')
            ->assertSee($newUser->name);
    }

    /** @test */
    public function dashboard_widgets_are_responsive()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('grid-cols-1 md:grid-cols-2 lg:grid-cols-4');
    }

    /** @test */
    public function dashboard_shows_system_status()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('System Status')
            ->assertSee('Queue Status')
            ->assertSee('Cache Status')
            ->assertSee('Storage Status');
    }

    /** @test */
    public function dashboard_quick_actions_are_accessible()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('Quick Actions')
            ->assertSee('Create User')
            ->assertSee('Add Service')
            ->assertSee('View Reports');
    }

    /** @test */
    public function dashboard_analytics_data_is_current()
    {
        // Create some test data
        $recentUser = User::factory()->create(['created_at' => now()]);
        $oldUser = User::factory()->create(['created_at' => now()->subDays(30)]);

        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('New Users (Last 30 Days)')
            ->assertSee('Active Users');
    }
}
