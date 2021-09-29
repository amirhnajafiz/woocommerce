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
// Items / Categories / Brands View

// Admin panels
Route::resource('item', \App\Http\Controllers\Web\ItemController::class);
