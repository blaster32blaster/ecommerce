<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

/**
 * handle showing the user dashboard
 */
class DashboardService
{
    public function __construct()
    {
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $userProducts = $user->products;
        return view('dashboard')
            ->with('products', $userProducts);
    }
}
