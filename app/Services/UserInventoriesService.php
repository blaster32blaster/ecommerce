<?php

namespace App\Services;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Response;

/**
 * handle user inventory operations
 */
class UserInventoriesService
{

    /**
     * fetch user inventories
     *
     * @param User $user
     * @return Response
     */
    public function fetch(User $user) : Response
    {
        return response(
            Products::where('admin_id', '=', $user->id)
            ->with('inventories.product')
            ->get()
            ->pluck('inventories')
            ->flatten()
        );
    }
}
