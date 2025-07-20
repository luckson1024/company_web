<?php

namespace App\Http\Controllers\Modules\Service\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function healthCheck()
    {
        return response()->json(['status' => 'success', 'message' => 'Service module is running']);
    }
}
