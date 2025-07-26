<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

class LoginThrottlingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush();
    }

    /** @test */
    public function it_allows_a_limited_number_of_login_attempts()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Attempt to login with wrong password multiple times
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => 'wrong-password',
            ]);

            $response->assertSessionHasErrors('email');
        }

        // The 6th attempt should be throttled
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertStringContainsString('Too many login attempts', 
            collect($response->baseResponse->getSession()->get('errors')->getBag('default')->get('email'))->first()
        );
    }

    /** @test */
    public function it_allows_login_after_throttle_expires()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('correct-password'),
        ]);

        // Make 5 failed attempts
        for ($i = 0; $i < 5; $i++) {
            $this->post('/login', [
                'email' => $user->email,
                'password' => 'wrong-password',
            ]);
        }

        // Fast-forward time by 1 minute
        $this->travel(1)->minutes();

        // Should now be able to login with correct credentials
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'correct-password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    /** @test */
    public function it_remembers_user_when_remember_me_is_checked()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'remember' => 'on',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user->fresh()->remember_token);
    }
}
