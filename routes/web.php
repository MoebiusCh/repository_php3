<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\tinTucController;
use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;
// use App\Http\Livewire\Auth\Register;
// use App\Http\Livewire\Auth\Login;
/* Admin */

require __DIR__ . "/admin.php";
require __DIR__ . "/test.php";

Route::get('/mail', function () {
    Mail::to('phatthanthanh@gmail.com')->send(new GuiEmail());
});

// Route::get('register', [Register::class, 'render'])->name('register');
// Route::get('login', [Login::class, 'render'])->name('login');

/* Client */
Route::get('/', function () {
    return view('home');
});

Route::get('shop', [shopController::class, 'index'])
    ->name('shop');

Route::prefix('product')->name('product.')->group(function () {
    Route::resources(['list' => ProductController::class]);
});

Route::get('login', [UserController::class, 'login_page'])->name('login');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserController::class, 'login_page'])->name('login');
    Route::resources(['list' => UserController::class]);
});

Route::get('tintuc', [tinTucController::class, 'index'])->name('tintuc');
Route::get('tintrongloai/{id}', [tinTucController::class, 'tintrongloai']);
Route::get('tindetail/{id}', [tinTucController::class, 'detail'])->name('tindetail');

Route::get('cart', [shopController::class, 'cart'])->name('cart');
Route::get('checkout', [shopController::class, 'checkout'])->name('checkout');
Route::get('contact', [shopController::class, 'contact'])->name('contact');
Route::get('about', [shopController::class, 'about'])->name('about');
