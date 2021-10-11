<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::middleware(['auth', 'can:admin-panel'])->group(function () {
    // Admin routes
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin');

    // Item resource controller
    Route::resource('item', ItemController::class);

    // Special item routes
    Route::get('special', [ItemController::class, 'special'])
        ->name('all.special');

    Route::post('special', [ItemController::class, 'makeSpecial'])
        ->name('create.special');

    Route::delete('special', [ItemController::class, 'removeSpecial'])
        ->name('remove.special');

    // Brand resource controller
    Route::resource('brand', BrandController::class);

    // Category resource controller
    Route::resource('category', CategoryController::class);
});

// User routes
Route::get('dashboard', [HomeController::class, 'userPanel'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('cart', [HomeController::class, 'userCart'])
    ->middleware(['auth'])
    ->name('cart');

require __DIR__ . '/auth.php';
