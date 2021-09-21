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

// Admin middleware routes
Route::middleware(['admin'])->group(function () {
    Route::resource('items', \App\Http\Controllers\ItemController::class);

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);

    Route::resource('brands', \App\Http\Controllers\BrandController::class);
});
