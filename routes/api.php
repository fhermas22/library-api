<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User Authentication Routes
Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Book Routes
    Route::apiResource('/books', BookController::class);
    Route::get('/books/{book}/categories', [BookController::class, 'showCategories']);
    Route::post('/books/{book}/categories', [BookController::class, 'attachCategory']);
    Route::delete('/books/{book}/categories', [BookController::class, 'detachCategory']);

    // Category Routes
    Route::apiResource('/categories', CategoryController::class);
});
