<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('/product')->group(function () {
//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('/show/{id}', [ProductController::class, 'show']);
//     Route::get('/create', [ProductController::class, 'create']);
//     Route::get('/edit/{id}', [ProductController::class, 'edit']);
//     Route::post('/', [ProductController::class, 'store']);
//     Route::patch('/{id}', [ProductController::class, 'update']);
//     Route::delete('/{id}', [ProductController::class, 'destroy']);
// });

// //Route Product Category
// Route::prefix('/product-category')->group(function () {
//     Route::get('/', [ProductCategoryController::class, 'index']);
//     Route::get('/show/{id}', [ProductCategoryController::class, 'show']);
//     Route::get('/create', [ProductCategoryController::class, 'create']);
//     Route::get('/edit/{id}', [ProductCategoryController::class, 'edit']);
//     Route::post('/', [ProductCategoryController::class, 'store']);
//     Route::patch('/{id}', [ProductCategoryController::class, 'update']);
//     Route::delete('/{id}', [ProductCategoryController::class, 'destroy']);
// });

// //Route Central Sale
// Route::prefix('/central-sale')->group(function () {
//     Route::get('/', [CentralSaleController::class, 'index']);
//     Route::get('/show/{id}', [CentralSaleController::class, 'show']);
//     Route::get('/create', [CentralSaleController::class, 'create']);
//     Route::get('/edit/{id}', [CentralSaleController::class, 'edit']);
//     Route::post('/', [CentralSaleController::class, 'store']);
//     Route::patch('/{id}', [CentralSaleController::class, 'update']);
//     Route::delete('/{id}', [CentralSaleController::class, 'destroy']);
// });
