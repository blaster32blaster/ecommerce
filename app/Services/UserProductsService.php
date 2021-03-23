<?php

namespace App\Services;

use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Collection;

/**
 * handle user products
 */
class UserProductsService
{

    /**
     * return a collection of all users products
     *
     * @param User $user
     * @return Collection
     */
    public function fetch(User $user) : Collection
    {
        return Products::where('admin_id', '=', $user->id)
            ->with('inventories')
            ->get();
    }
}
