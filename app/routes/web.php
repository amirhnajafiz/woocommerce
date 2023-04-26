<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SuperAdmin\AdminCartController;
use App\Http\Controllers\SuperAdmin\SaleController;
use App\Http\Controllers\SuperAdmin\UserController;
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

Route::middleware(['auth'])->group(function () {
    // Super admin
    Route::middleware(['can:super-admin'])->group(function () {
        // User resource controller
        Route::resource('user', UserController::class)
            ->only('index', 'update', 'destroy');
    });

    // Admin panel
    Route::view('/super-admin', 'admin.welcome')
        ->middleware(['role'])
        ->name('super.admin');

    // Admin
    Route::middleware(['admin'])->group(function () {
        // Payments resource controller
        Route::resource('admin-payment', AdminPaymentController::class)
            ->only(['index', 'destroy']);

        // Orders resource controller
        Route::resource('admin-cart', AdminCartController::class)
            ->only(['index', 'update', 'destroy']);

        // Sales resource controller
        Route::resource('sale', SaleController::class)
            ->only(['index', 'store', 'update', 'destroy']);

        // Comment controller
        Route::resource('comment', CommentController::class)
            ->only('destroy');
    });

    // Writer
    Route::middleware(['role'])->group(function () {
        // Item resource controller
        Route::resource('item', ItemController::class)
            ->except(['show']);

        // Special items
        Route::resource('special', SpecialItemController::class)
            ->only(['index', 'store', 'destroy']);

        // Brand resource controller
        Route::resource('brand', BrandController::class)
            ->except(['show']);

        // Category resource controller
        Route::resource('category', CategoryController::class)
            ->except(['show']);
    });

    // User routes
    // User dashboard
    Route::view('/dashboard', 'utils.user.index')
        ->name('dashboard');

    // User view of an item
    Route::resource('item', ItemController::class)
        ->only(['show']);

    // Brand resource controller
    Route::resource('brand', BrandController::class)
        ->only(['show']);

    // Category resource controller
    Route::resource('category', CategoryController::class)
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
        ->only(['index', 'store', 'show']);

    // Comment controller
    Route::resource('comment', CommentController::class)
        ->only(['store']);

    Route::resource('message', MessageController::class)
        ->only(['destroy']);
});

require __DIR__ . '/auth.php';
