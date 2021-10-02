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

// Home routes
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

// Item resource controller
Route::resource('item', \App\Http\Controllers\Web\ItemController::class);

// Special item routes
Route::get('special', [\App\Http\Controllers\Web\ItemController::class, 'special'])
    ->name('all.special');

Route::post('special', [\App\Http\Controllers\Web\ItemController::class, 'makeSpecial'])
    ->name('create.special');

Route::delete('special', [\App\Http\Controllers\Web\ItemController::class, 'removeSpecial'])
    ->name('remove.special');

// Brand resource controller
Route::resource('brand', \App\Http\Controllers\Web\BrandController::class);

// Category resource controller
Route::resource('category', \App\Http\Controllers\Web\CategoryController::class);

// Admin routes
Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
    ->name('admin');

// User routes
Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'userPanel'])
    ->name('dashboard');

require __DIR__.'/auth.php';
