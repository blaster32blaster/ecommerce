<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserInventoriesService;
use Illuminate\Http\Request;

class UserInventoriesController extends Controller
{

    /**
     * a uis instance
     *
     * @var UserInventoriesService $userInventoriesService
     */
    private $userInventoriesService;

    public function __construct(UserInventoriesService $uis)
    {
        $this->userInventoriesService = $uis;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_inventory)
    {
        return $this->userInventoriesService->fetch($user_inventory);
    }
}
