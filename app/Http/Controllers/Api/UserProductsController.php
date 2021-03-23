<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserProductsService;
use Illuminate\Http\Request;

class UserProductsController extends Controller
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user_product)
    {
        return $this->userProductsService->fetch($user_product);
    }
}
