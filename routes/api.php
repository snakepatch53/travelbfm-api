<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Route::resource('users', UserController::class)->except(['store', 'update', 'destroy']);

    Route::middleware(['auth:sanctum', 'admin'])->group(function () {
        // users
        Route::resource('users', UserController::class);
        Route::post('users/{id}', [UserController::class, 'update']);

        // businesses
        Route::resource('businesses', BusinessController::class);
        Route::post('businesses/{id}', [BusinessController::class, 'update']);
    });


    Route::middleware(['auth:sanctum', 'seller'])->group(function () {
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

        // carts
        Route::resource('carts', CartController::class);

        // product_carts
        Route::resource('product_carts', ProductCartController::class);

        // combos
        Route::post('create-bulk-cart', [ComboController::class, 'createBulkCart']);
    });

    // PUBLIC ROUTES
    // carts
    Route::get('carts/{id}/pdf', [CartController::class, 'showPdf']);

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
