<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'v1'], function () {
    // Route::middleware(['auth:sanctum', 'admin'])->group(function () {});
    // Route::resource('users', UserController::class)->except(['store', 'update', 'destroy']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('users/logout', [UserController::class, 'logout']);
    });

    Route::resource('users', UserController::class);
    Route::post('users/{id}', [UserController::class, 'update']);
    Route::post('users/login', [UserController::class, 'login']);
    // Route::post('users/{id}', [UserController::class, 'updateWithImages']);
    Route::resource('businesses', BusinessController::class);
    Route::post('businesses/{id}', [BusinessController::class, 'update']);

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::post('products/{id}', [ProductController::class, 'update']);
    Route::resource('carts', CartController::class);
    Route::resource('product_carts', ProductCartController::class);
});

// Not Found
Route::fallback(function () {
    return response()->json(['Not Found!'], 404);
});
