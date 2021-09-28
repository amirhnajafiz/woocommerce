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

// TODO: API routes set
// Brands => GET - SHOW
// Categories => GET - SHOW

// Item API routes
Route::get('item', [\App\Http\Controllers\API\ItemControllerAPI::class, 'index'])
    ->name('all.item');

Route::get('item/{item}', [\App\Http\Controllers\API\ItemControllerAPI::class, 'show'])
    ->name('show.item');

// Brand API routes
Route::get('brand', [\App\Http\Controllers\API\BrandControllerAPI::class, 'index'])
    ->name('all.brand');

Route::get('brand/{brand}', [\App\Http\Controllers\API\BrandControllerAPI::class, 'show'])
    ->name('show.brand');
