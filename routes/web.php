<?php

use App\Http\Controllers\CentralPurchaseController;
use App\Http\Controllers\CentralSaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    // Route Product
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/show/{id}', [ProductController::class, 'show']);
        Route::get('/create', [ProductController::class, 'create']);
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/', [ProductController::class, 'store']);
        Route::patch('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });

    //Route Product Category
    Route::prefix('/product-category')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('/show/{id}', [ProductCategoryController::class, 'show']);
        Route::get('/create', [ProductCategoryController::class, 'create']);
        Route::get('/edit/{id}', [ProductCategoryController::class, 'edit']);
        Route::post('/', [ProductCategoryController::class, 'store']);
        Route::patch('/{id}', [ProductCategoryController::class, 'update']);
        Route::delete('/{id}', [ProductCategoryController::class, 'destroy']);
    });

    //Route Central Sale
    Route::prefix('/central-sale')->group(function () {
        Route::get('/', [CentralSaleController::class, 'index']);
        Route::get('/show/{id}', [CentralSaleController::class, 'show']);
        Route::get('/create', [CentralSaleController::class, 'create']);
        Route::get('/edit/{id}', [CentralSaleController::class, 'edit']);
        Route::post('/', [CentralSaleController::class, 'store']);
        Route::patch('/{id}', [CentralSaleController::class, 'update']);
        Route::delete('/{id}', [CentralSaleController::class, 'destroy']);
    });

    //Route Central Purchase
    Route::prefix('/central-purchase')->group(function () {
        Route::get('/', [CentralPurchaseController::class, 'index']);
        Route::get('/show/{id}', [CentralPurchaseController::class, 'show']);
        Route::get('/create', [CentralPurchaseController::class, 'create']);
        Route::get('/edit/{id}', [CentralPurchaseController::class, 'edit']);
        Route::post('/', [CentralPurchaseController::class, 'store']);
        Route::patch('/{id}', [CentralPurchaseController::class, 'update']);
        Route::delete('/{id}', [CentralPurchaseController::class, 'destroy']);
    });
});

// login

Route::prefix('/')->group(function () {
    Route::get('/', [PagesController::class, 'index'])->middleware('guest')->name('login');
    // Route::post('/action/authenticate', [LoginController::class, 'authenticate']);
    // Route::get('/action/logout', [LoginController::class, 'logout']);
});
