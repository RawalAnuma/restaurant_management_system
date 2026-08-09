<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('categories', CategoryController::class);

Route::apiResource('foods', FoodController::class);

Route::apiResource('orders', OrderController::class)
    ->except(['update']);

Route::patch(
    'orders/{order}/status',
    [OrderController::class, 'updateStatus']
);