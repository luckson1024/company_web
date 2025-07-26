<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /** @test */
    public function guest_cannot_logout()
    {
        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /** @test */
    public function logout_requires_csrf_token()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Disable CSRF middleware for this specific test
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->post('/logout');

        $response->assertStatus(419); // CSRF token mismatch status
    }
}
