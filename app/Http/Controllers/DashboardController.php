<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Assignment;
use App\Models\MaintenanceLog;

class DashboardController extends Controller
{
    /**
     * Show the dashboard depending on user role
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            // Admin dashboard data
            $totalAssets = Asset::count();
            $totalUsers = \App\Models\User::count();
            $pendingMaintenance = MaintenanceLog::where('status', 'Pending')->count();
            $recentAssignments = Assignment::with('asset', 'user')
                                    ->latest()
                                    ->limit(10)
                                    ->get();

            return view('dashboard.admin', compact(
                'totalAssets',
                'totalUsers',
                'pendingMaintenance',
                'recentAssignments'
            ));
        }

        // Normal user dashboard data
        $myAssignments = $user->assignments()->with('asset.category')->get();
        $pendingMaintenance = MaintenanceLog::where('user_id', $user->id)
                                ->where('status', 'Pending')
                                ->count();

        return view('dashboard.user', compact(
            'myAssignments',
            'pendingMaintenance'
        ));
    }
}
