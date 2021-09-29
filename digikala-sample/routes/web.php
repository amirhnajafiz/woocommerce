<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TODO: Set Web routes
// Home / Welcome page
// Login
// Register
// Admin panel
// User
// Categories / Brands View

// Item resource controller
Route::resource('item', \App\Http\Controllers\Web\ItemController::class);

// Brand resource controller
Route::resource('brand', \App\Http\Controllers\Web\BrandController::class);

// Admin routes
Route::get('/admin', [\App\Http\Controllers\User\AdminController::class, 'index'])
    ->name('admin.panel');
