<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index']);
});
