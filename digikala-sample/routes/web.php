<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SuperAdmin\AdminCartController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\AdminPaymentController;
use App\Http\Controllers\SuperAdmin\BrandController;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\ItemController;
use App\Http\Controllers\SuperAdmin\SpecialItemController;
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

Route::get('/special-items', [HomeController::class, 'specials'])
    ->name('special-items');

Route::middleware(['auth', 'can:super-admin'])->group(function () {
    // Admin routes
    Route::view('/super-admin', 'admin.welcome')
        ->name('super.admin');

    // Admin resource controller
    Route::resource('admin', AdminController::class);

    // Item resource controller
    Route::resource('item', ItemController::class)
        ->except(['show']);

    Route::resource('special', SpecialItemController::class)
        ->only(['index', 'store', 'destroy']);

    // Brand resource controller
    Route::resource('brand', BrandController::class);

    // Category resource controller
    Route::resource('category', CategoryController::class);

    // Payments resource controller
    Route::resource('admin-payment', AdminPaymentController::class)
        ->only(['index', 'destroy']);

    // Orders resource controller
    Route::resource('admin-cart', AdminCartController::class)
        ->only(['index', 'update', 'destroy']);
});

// User routes
Route::middleware(['auth'])->group(function () {
    // User dashboard
    Route::view('/dashboard', 'utils.user.index')
        ->name('dashboard');

    // User view of an item
    Route::resource('item', ItemController::class)
        ->only(['show']);

    // User carts
    Route::resource('cart', CartController::class)
        ->except(['create', 'edit']);

    // Cart orders
    Route::resource('order', OrderController::class)
        ->only(['store', 'update', 'destroy']);

    // User addresses
    Route::resource('address', AddressController::class)
        ->except(['show']);

    // Payment controller
    Route::get('/payment/create/{id}', [PaymentController::class, 'create'])
        ->name('payment.create');

    Route::resource('payment', PaymentController::class)
        ->only(['index','store','show']);
});

require __DIR__ . '/auth.php';
