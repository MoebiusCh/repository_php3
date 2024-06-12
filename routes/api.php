<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\UserApiController;

Route::apiResource('products', ProductApiController::class);
Route::apiResource('user', UserApiController::class);
