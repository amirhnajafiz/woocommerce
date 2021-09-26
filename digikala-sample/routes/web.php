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

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('admin', [\App\Http\Controllers\AdminController::class, 'index'])
    ->name('admin.main');

Route::get('admin/categories', [\App\Http\Controllers\AdminController::class, 'categories'])
    ->name('admin.category');

Route::get('admin/brands', [\App\Http\Controllers\AdminController::class, 'brands'])
    ->name('admin.brand');

Route::get('admin/items', [\App\Http\Controllers\AdminController::class, 'items'])
    ->name('admin.item');

Route::get('admin/specials', [\App\Http\Controllers\AdminController::class, 'specials'])
    ->name('admin.special');

Route::get('admin/users', [\App\Http\Controllers\AdminController::class, 'users'])
    ->name('admin.user');

Route::get('admin/orders', [\App\Http\Controllers\AdminController::class, 'orders'])
    ->name('admin.order');

Route::get('admin/payments', [\App\Http\Controllers\AdminController::class, 'payments'])
    ->name('admin.payment');

Route::get('admin/sales', [\App\Http\Controllers\AdminController::class, 'sales'])
    ->name('admin.sale');

// Admin middleware routes
Route::middleware(['admin'])->group(function () {
    // Items --> TODO: Item
    Route::resource('items', \App\Http\Controllers\ItemController::class);

    Route::post('items/special/{id}', [\App\Http\Controllers\ItemController::class, 'makeSpecial'])
        ->name('make.item.special');

    Route::delete('items/special/{id}', [\App\Http\Controllers\ItemController::class, 'removeSpecial'])
        ->name('delete.item.special');

    // Categories
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);

    // Brands
    Route::resource('brands', \App\Http\Controllers\BrandController::class);
});
