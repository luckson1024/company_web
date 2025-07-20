<?php

namespace Tests\Feature\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminUserCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);
        Config::set('session.driver', 'array');
        // Create roles
        Role::firstOrCreate(['name' => 'Super Admin']);
        Role::firstOrCreate(['name' => 'Admin']);
        // Create and authenticate a Super Admin
        $this->admin = User::factory()->create([
            'email' => 'admin@mycopo.test',
            'password' => Hash::make('password'),
        ]);
        $this->admin->assignRole('Super Admin');
        $this->actingAs($this->admin);
    }

    public function test_user_index_page_loads()
    {
        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertSee('Users');
    }

    public function test_user_can_be_created()
    {
        $getResponse = $this->get('/admin/users/create');
        $token = csrf_token();
        $response = $this->post('/admin/users', [
            'name' => 'Test User',
            'email' => 'testuser@mycopo.test',
            'password' => 'password',
            'password_confirmation' => 'password',
            'roles' => ['Admin'],
            '_token' => $token,
        ]);
        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', ['email' => 'testuser@mycopo.test']);
    }

    public function test_user_can_be_edited()
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');
        $getResponse = $this->get('/admin/users/' . $user->id . '/edit');
        $token = csrf_token();
        $response = $this->put('/admin/users/' . $user->id, [
            'name' => 'Updated User',
            'email' => $user->email,
            'roles' => ['Admin'],
            '_token' => $token,
        ]);
        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Updated User']);
    }

    public function test_user_can_be_deleted()
    {
        $user = User::factory()->create();
        $user->assignRole('Admin');
        $getResponse = $this->get('/admin/users');
        $token = csrf_token();
        $response = $this->delete('/admin/users/' . $user->id, [
            '_token' => $token,
        ]);
        $response->assertRedirect('/admin/users');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
