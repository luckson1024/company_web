<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    public function isRunning(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Admin module is running'
        ]);
    }
}
