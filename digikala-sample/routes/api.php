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

// User
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Items
Route::resource('items', \App\Http\Controllers\API\ItemController::class);

Route::get('items/special', [\App\Http\Controllers\API\ItemController::class, 'getSpecialItems'])
    ->name('items.special');

// Brands
Route::resource('brands', \App\Http\Controllers\API\ItemController::class);
