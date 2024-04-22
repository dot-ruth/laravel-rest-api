<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::apiResource('cart', CartController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('customers', CustomersController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('payment', PaymentController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('review', ReviewController::class);
