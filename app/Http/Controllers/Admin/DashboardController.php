<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $roleCounts = Role::withCount('users')->get();
        $recentLogins = User::orderByDesc('last_login_at')->take(5)->get();
        return view('admin.dashboard', compact('userCount', 'roleCounts', 'recentLogins'));
    }
}
