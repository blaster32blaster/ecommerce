<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('product', App\Http\Controllers\Api\ProductController::class)
    ->only('update', 'destroy');

Route::resource('user-products', App\Http\Controllers\Api\UserProductsController::class)
    ->only('show');

Route::resource('user-inventories', App\Http\Controllers\Api\UserInventoriesController::class)
    ->only('show');
