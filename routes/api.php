<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('foods', FoodController::class);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
    return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);


    Route::apiResource('orders', OrderController::class)
    ->except(['update']);

    Route::patch(
    'orders/{order}/status',
    [OrderController::class, 'updateStatus']
    );
});
