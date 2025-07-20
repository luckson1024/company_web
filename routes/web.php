<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HealthCheckController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Modules\User\UserController;
use App\Http\Controllers\Modules\Service\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Module Health Check
Route::get('/admin/health', [HealthCheckController::class, 'isRunning']);

// Service Module Health Check
Route::get('/admin/services/health', [ServiceController::class, 'healthCheck']);

// Admin Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Admin User Management
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\Modules\User\UserController::class, [
        'as' => 'admin'
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
