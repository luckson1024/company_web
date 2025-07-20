<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Service\Controllers\ServiceController;

Route::get('/service/health', [ServiceController::class, 'healthCheck']);
