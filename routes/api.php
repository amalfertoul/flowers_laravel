<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FlowersDiskController;


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'store']);
Route::get('flowersdisk', [FlowersDiskController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('events/export', [EventController::class, 'exportEvents']);
    Route::get('orders/{id}/invoice', [OrderController::class, 'downloadInvoice']);
    Route::put('flowersdisk/{id}', [FlowersDiskController::class, 'update']);
    Route::apiResource('users', UserController::class); 
    Route::apiResource('products', ProductController::class);
    Route::apiResource('cart', CartController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('events', EventController::class);
});
