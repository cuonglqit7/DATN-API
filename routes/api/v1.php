<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\TokenExpiryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::get('/products', [ProductController::class, 'getAll']);
    Route::get('/products/{id}', [ProductController::class, 'getById']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [UserController::class, 'show']);

        Route::post('logout', [AuthController::class, 'logout']);
    });
});
