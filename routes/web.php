<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HealthCheckController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Modules\User\UserController;
use App\Modules\Service\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Module Health Check
Route::get('/admin/health', [HealthCheckController::class, 'isRunning']);

// Service Module Health Check
Route::get('/admin/services/health', [ServiceController::class, 'healthCheck']);

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Users
    Route::resource('users', 'UserController')->names([
        'index' => 'admin.users',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);

    // Services
    Route::resource('services', 'ServiceController')->names([
        'index' => 'admin.services',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    // Settings
    Route::get('settings', 'SettingsController@index')->name('settings.index');

    // Notifications
    Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Admin User Management & Services
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class, [
        'as' => 'admin'
    ]);
    
    Route::resource('services', ServiceController::class, [
        'as' => 'admin'
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Modular: Include Service module routes
require base_path('app/Modules/Service/routes.php');
