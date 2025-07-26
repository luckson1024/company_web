<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class AdminLayoutTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create admin role and user
        $adminRole = Role::create(['name' => 'admin']);
        $this->admin = User::factory()->create()->assignRole('admin');
    }

    /** @test */
    public function admin_layout_is_accessible_to_admin_users()
    {
        $this->actingAs($this->admin)
            ->get('/admin/dashboard')
            ->assertStatus(200)
            ->assertViewIs('admin.dashboard')
            ->assertSee('Dashboard')
            ->assertSee($this->admin->name);
    }

    /** @test */
    public function admin_layout_includes_required_components()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        // Check for sidebar navigation
        $response->assertSee('Dashboard')
            ->assertSee('Users')
            ->assertSee('Services')
            ->assertSee('Settings');

        // Check for header components
        $response->assertSee($this->admin->name)
            ->assertSee('Profile')
            ->assertSee('Settings')
            ->assertSee('Logout');

        // Check for breadcrumbs
        $response->assertSee('Home')
            ->assertSee('Dashboard');
    }

    /** @test */
    public function admin_layout_is_not_accessible_to_guests()
    {
        $this->get('/admin/dashboard')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_layout_is_not_accessible_to_non_admin_users()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertStatus(403);
    }

    /** @test */
    public function sidebar_navigation_shows_correct_active_state()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users');

        $response->assertSee('active-nav-link users');
        $response->assertDontSee('active-nav-link dashboard');
    }

    /** @test */
    public function mobile_navigation_is_toggleable()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('data-mobile-menu-open="false"')
            ->assertSee('mobile-nav-button');
    }

    /** @test */
    public function breadcrumbs_show_correct_path()
    {
        $this->actingAs($this->admin)
            ->get('/admin/users/create')
            ->assertSee('Home')
            ->assertSee('Users')
            ->assertSee('Create');
    }

    /** @test */
    public function user_menu_is_functional()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/dashboard');

        $response->assertSee('user-menu-button')
            ->assertSee('user-menu-items');
    }
}
