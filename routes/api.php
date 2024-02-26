<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Route::resource('users', UserController::class)->except(['store', 'update', 'destroy']);

    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        // users
        Route::resource('users', UserController::class);
        Route::post('users/{id}', [UserController::class, 'update']);

        // businesses
        Route::resource('businesses', BusinessController::class)->except(['index']);
        Route::post('businesses/{id}', [BusinessController::class, 'update']);
    });

    Route::middleware(['auth:sanctum', 'seller'])->group(function () {
        // businesses
        Route::get('businesses', [BusinessController::class, 'index']);

        // categories
        Route::resource('categories', CategoryController::class);

        // products
        Route::resource('products', ProductController::class);
        Route::post('products/{id}', [ProductController::class, 'update']);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        // users
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('update-logued', [UserController::class, 'updateLogued']);
        Route::post('exist-session', [UserController::class, 'existSession']);

        // carts
        Route::resource('carts', CartController::class);
        Route::put('carts/{id}/update-state', [CartController::class, 'updateState']);

        // product_carts
        Route::resource('product_carts', ProductCartController::class);

        // combos
        Route::post('create-bulk-cart', [ComboController::class, 'createBulkCart']);
    });

    // PUBLIC ROUTES
    // Users

    // carts
    Route::get('carts/{id}/pdf', [CartController::class, 'showPdf']);
    Route::get('carts/{cart_id}/seller_id/{id}', [CartController::class, 'showPdfSeller']);

    // combos
    Route::get('str-to-qr-img/{text}', [ComboController::class, 'getStrToQr']);

    // users
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    // combos
    Route::get('info-web', [ComboController::class, 'getInfoWeb']);
});


// Not Found
Route::fallback(function () {
    return response()->json(['Not Found!'], 404);
});
