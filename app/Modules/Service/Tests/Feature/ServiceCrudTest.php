<?php

namespace Tests\Feature\Modules\Service;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Modules\Service\Models\Service;
use App\Models\User;

class ServiceCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_health_check()
    {
        $response = $this->get('/service/health');
        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'success',
                     'message' => 'Service module is running',
                 ]);
    }
}
