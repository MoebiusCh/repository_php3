<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\tinTucController;

/* Admin */

require __DIR__ . "/admin.php";
require __DIR__ . "/test.php";
/* Client */
Route::get('/', function () {
    return view('home');
});


Route::prefix('product')->name('product.')->group(function () {
    Route::resources(['list' => ProductController::class]);
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserController::class, 'login_page'])->name('login');
    Route::resources(['list' => UserController::class]);
});

Route::get('tintuc', [tinTucController::class, 'index'])->name('tintuc');
Route::get('tintrongloai/{id}', [tinTucController::class, 'tintrongloai']);
Route::get('tindetail/{id}', [tinTucController::class, 'tindetail']);
