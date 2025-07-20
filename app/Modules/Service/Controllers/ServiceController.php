<?php

namespace App\Modules\Service\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function healthCheck(): JsonResponse
    {
        return response()->json(['status' => 'success', 'message' => 'Service module is running']);
    }
}
