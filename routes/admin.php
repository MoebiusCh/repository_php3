<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Livewire\Admin\Product\addProduct;
use App\Livewire\Admin\Product\updateProduct;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])
        ->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])
        ->name('product');
    Route::get('userlist', [AdminController::class, 'userlist'])
        ->name('userlist');
    Route::get('category', [AdminController::class, 'category'])
        ->name('category');


    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])
        ->name('category.edit');

    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('products/create', addProduct::class)->name('products.create');
    Route::get('products/testupdate/{product}', updateProduct::class)->name('products.testupdate');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
});
