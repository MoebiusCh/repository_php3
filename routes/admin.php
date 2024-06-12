<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Livewire\Admin\Product\addProduct;
use App\Livewire\Admin\Product\updateProduct;

use App\Livewire\Admin\Category\CategoryFilter;
use App\Livewire\Admin\Category\CategoryEdit;
use App\Livewire\Admin\Category\CategoryCreate;

Route::prefix('admin')->name('admin.')->middleware(['role.check','auth','auth.check'])->group(function () {
    Route::get('', [AdminController::class, 'index'])
        ->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])
        ->name('product');
    Route::get('userlist', [AdminController::class, 'userlist'])
        ->name('userlist');

    Route::get('categories', CategoryFilter::class)
        ->name('categories.index');
    Route::get('categories/create', CategoryCreate::class)->name('categories.create');
    Route::get('categories/{category}/edit', CategoryEdit::class)->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{category}/confirm-delete', [CategoryController::class, 'confirmDelete'])->name('categories.confirm-delete');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])
        ->name('category.edit');

    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('products/create', addProduct::class)->name('products.create');
    Route::get('products/update/{product}', updateProduct::class)->name('products.update');
    // Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
});
