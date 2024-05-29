<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])
        ->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])
        ->name('product');
    Route::get('userlist', [AdminController::class, 'userlist'])
        ->name('userlist');

    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
