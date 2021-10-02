<?php

use App\Http\Controllers\API\BrandControllerAPI;
use App\Http\Controllers\API\CategoryControllerAPI;
use App\Http\Controllers\API\ItemControllerAPI;
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


// Item API routes
Route::get('item', [ItemControllerAPI::class, 'index'])
    ->name('all.item');

Route::get('item/{item}', [ItemControllerAPI::class, 'show'])
    ->name('show.item');

Route::get('special', [ItemControllerAPI::class, 'special'])
    ->name('all.special');

// Brand API routes
Route::get('brand', [BrandControllerAPI::class, 'index'])
    ->name('all.brand');

Route::get('brand/{brand}', [BrandControllerAPI::class, 'show'])
    ->name('show.brand');

Route::get('category', [CategoryControllerAPI::class, 'index'])
    ->name('all.category');

Route::get('category/{category}', [CategoryControllerAPI::class, 'show'])
    ->name('show.category');
