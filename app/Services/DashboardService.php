<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * handle showing the user dashboard
 */
class DashboardService
{

    /**
     * a ups instance
     *
     * @var UserProductsService $ups
     */
    private $userProductsService;

    public function __construct(UserProductsService $ups)
    {
        $this->userProductsService = $ups;
    }

    /**
     * handle fetching init user and view data
     *
     * @return View
     */
    public function userDashboard() : View
    {
        $user = Auth::user();

        $userProducts = $this->userProductsService->fetch($user);

        return view('dashboard')
            ->with('products', $userProducts)
            ->with('user', $user);
    }
}
