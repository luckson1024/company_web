<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\Models\User;

class LoginRedirectTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Disable CSRF middleware for this test (framework class)
        $this->withoutMiddleware([
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        ]);
        // Use array session driver for testing
        Config::set('session.driver', 'array');
    }

    /**
     * Test login redirect uses APP_URL and not localhost.
     *
     * @return void
     */
    public function test_login_redirect_uses_app_url()
    {
        // Set APP_URL to the Codespaces URL
        Config::set('app.url', 'https://fluffy-xylophone-5r7r574pqv9hrxx-8000.app.github.dev');

        // Create a user
        $user = User::factory()->create([
            'email' => 'testuser@mycopo.test',
            'password' => bcrypt('password'),
        ]);

        // Get login page to initialize session and get CSRF token
        $getResponse = $this->get('/login');
        $token = csrf_token();

        // Attempt login with CSRF token
        $response = $this->post('/login', [
            'email' => 'testuser@mycopo.test',
            'password' => 'password',
            '_token' => $token,
        ]);

        // Follow redirect
        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');

        // Assert the redirect URL does not contain localhost
        $this->assertStringNotContainsString('localhost', $redirectUrl, 'Redirect URL should not contain localhost');
        // Assert the redirect URL contains the Codespaces domain
        $this->assertStringContainsString('fluffy-xylophone-5r7r574pqv9hrxx-8000.app.github.dev', $redirectUrl, 'Redirect URL should contain Codespaces domain');
    }
}
