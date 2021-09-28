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

Route::get('category', [\App\Http\Controllers\API\CategoryControllerAPI::class, 'index'])
    ->name('all.category');

Route::get('category/{category}', [\App\Http\Controllers\API\CategoryControllerAPI::class, 'show'])
    ->name('show.category');
