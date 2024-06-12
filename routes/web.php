<?php

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\tinTucController;
use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;

use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\ForgetPass;
use App\Livewire\GetPass;

use App\Livewire\ShoppingCart;
/* Admin */

require __DIR__ . "/admin.php";
require __DIR__ . "/test.php";

Route::get('/mail', function () {
    Mail::to('phatthanthanh@gmail.com')->send(new GuiEmail());
});


/* Client */
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('shop', [shopController::class, 'index'])
    ->name('shop');

// Product
Route::prefix('product')->name('product.')->group(function () {
    Route::resources(['list' => ProductController::class]);
});

// User
Route::prefix('user')->name('user.')->group(function () {
    // Route::get('login', [UserController::class, 'login_page'])->name('login');
    Route::resources(['list' => UserController::class]);

    Route::get('/forget-password', ForgetPass::class)->name('forgetPass');
    Route::post('/forget-password', [UserController::class, 'postForgetPass']);
    // Route::get('/get-password/{user}/{token}', [UserController::class, 'getPass'])->name('getPass');
    Route::get('/get-password/{user}/{token}', GetPass::class)->name('getPass');
    Route::post('/get-password/{user}/{token}', [UserController::class, 'postGetPass']);
});

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('logout', function (Request $request) {
    Auth::logout();
    $request->session()->forget('user_info');
    return redirect()->route('home');
})->name('logout');


Route::get('tintuc', [tinTucController::class, 'index'])->name('tintuc');
Route::get('tintrongloai/{id}', [tinTucController::class, 'tintrongloai']);
Route::get('tindetail/{id}', [tinTucController::class, 'detail'])->name('tindetail');

// Route::get('cart', [shopController::class, 'cart'])->name('cart');
Route::get('cart', ShoppingCart::class)->name('cart');
// Route::post('cart/add/{product}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::get('checkout', [shopController::class, 'checkout'])->name('checkout');
Route::get('contact', [shopController::class, 'contact'])->name('contact');
Route::get('about', [shopController::class, 'about'])->name('about');
