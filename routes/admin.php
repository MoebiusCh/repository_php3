<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])
        ->name('dashboard');
    Route::get('product', [AdminController::class, 'product'])
        ->name('product');
    Route::get('userlist', [AdminController::class, 'userlist'])
        ->name('userlist');
});
