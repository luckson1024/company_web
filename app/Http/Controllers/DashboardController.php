<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers' => User::count(),
            'activeServices' => Service::where('status', 'active')->count(),
            'newMessages' => DB::table('contact_messages')
                             ->whereNull('read_at')
                             ->count(),
            'totalVisits' => DB::table('page_visits')
                             ->whereDate('created_at', '>=', now()->subDays(30))
                             ->count(),
            'recentActivity' => DB::table('activity_log')
                                ->orderBy('created_at', 'desc')
                                ->limit(5)
                                ->get()
                                ->map(function($activity) {
                                    return [
                                        'description' => $activity->description,
                                        'created_at' => $activity->created_at
                                    ];
                                })
        ];

        return view('admin.dashboard', $data);
    }
}
