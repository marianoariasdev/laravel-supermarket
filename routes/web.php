<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::resource('categories', CategoryController::class)->except('show');
    // Categories routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('can:categories.create');
    Route::get('categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('can:categories.edit');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('can:categories.delete');

    Route::resource('products', ProductController::class)->except('show');
    Route::resource('sales', SaleController::class);

    // Users routes
    Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('can:users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('can:users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('can:users.create');
    Route::get('users/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('can:users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('can:users.edit');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('can:users.delete');
});
