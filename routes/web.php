<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('users/{id}', function ($id) {
    
});