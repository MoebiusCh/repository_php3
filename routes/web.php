<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/* Admin */
require __DIR__ . "/admin.php";

/* Client */
Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    $contributors = [
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/1?v=4',
            'handle' => 'johndoe',
            'email' => 'johndoe@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/2?v=4',
            'handle' => 'alice',
            'email' => 'alice@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/3?v=4',
            'handle' => 'bob',
            'email' => 'bob@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/4?v=4',
            'handle' => 'charlie',
            'email' => 'charlie@me.com',
        ],
        [
            'avatarUrl' => 'https://avatars.githubusercontent.com/u/5?v=5',
            'handle' => 'dave',
            'email' => 'dave@me.com',
        ],
    ];
    return view('test', compact('contributors'));
});

Route::prefix('product')->name('product.')->group(function () {
    Route::resources(['list' => ProductController::class]);
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserController::class, 'login_page'])->name('login');
    Route::resources(['list' => UserController::class]);
});
