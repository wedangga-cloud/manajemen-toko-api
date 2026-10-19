<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public Routes (Bisa diakses tanpa login/token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Wajib menyertakan Bearer Token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth & User Profile
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Management Toko (CRUD Kategori & Produk)
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);

});