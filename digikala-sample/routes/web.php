<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\BrandController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

// Home routes
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('specials', [HomeController::class, 'specials'])
    ->name('specials');

Route::middleware(['auth', 'can:admin-panel'])->group(function () {
    // Admin routes
    Route::view('/admin', 'web.admin.route-views.welcome')
        ->name('admin.panel');

    // Item resource controller
    Route::resource('item', ItemController::class);

    Route::resource('special', \App\Http\Resources\SpecialItemCollection::class)
        ->only('index', 'store', 'destroy');

    // Brand resource controller
    Route::resource('brand', BrandController::class);

    // Category resource controller
    Route::resource('category', CategoryController::class);
});

// User routes
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [HomeController::class, 'userPanel'])
        ->name('dashboard');

    Route::get('cart', [HomeController::class, 'userCart'])
        ->name('cart');

    Route::get('view/{item}', [\App\Http\Controllers\UserController::class, 'showItem'])
        ->name('show.item');
});

require __DIR__ . '/auth.php';
