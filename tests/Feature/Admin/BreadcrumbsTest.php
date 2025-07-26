<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

class BreadcrumbsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        $adminRole = Role::create(['name' => 'admin']);
        $this->admin = User::factory()->create()->assignRole('admin');
    }

    /** @test */
    public function breadcrumbs_show_correct_hierarchy()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users/create');

        $response->assertSee('Dashboard')
            ->assertSee('Users')
            ->assertSee('Create User');
    }

    /** @test */
    public function breadcrumbs_are_properly_linked()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users/1/edit');

        $response->assertSee(route('admin.dashboard'))
            ->assertSee(route('admin.users.index'))
            ->assertSee(route('admin.users.edit', 1));
    }

    /** @test */
    public function current_page_is_not_linked()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users');

        $response->assertSee('Users')
            ->assertDontSee('href="/admin/users">' . 'Users');
    }

    /** @test */
    public function breadcrumbs_show_dynamic_content()
    {
        $user = User::factory()->create(['name' => 'John Doe']);

        $response = $this->actingAs($this->admin)
            ->get("/admin/users/{$user->id}");

        $response->assertSee('Users')
            ->assertSee('John Doe');
    }

    /** @test */
    public function breadcrumbs_are_responsive()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users');

        $response->assertSee('flex flex-wrap items-center space-x-2');
    }

    /** @test */
    public function breadcrumbs_show_separators()
    {
        $response = $this->actingAs($this->admin)
            ->get('/admin/users');

        $response->assertSee('svg') // Checking for separator icon
            ->assertSee('class="text-gray-400"');
    }
}
