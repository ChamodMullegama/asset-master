<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, "index"])->name('dashboard');

Route::prefix('type')->group(function () {
    Route::get('/', [TypeController::class, "index"])->name('type.index');
    Route::get('/all', [TypeController::class, "all"])->name('type.all');
    Route::post('/store', [TypeController::class, "store"])->name('type.store');
    Route::get('/{type_id}/get', [TypeController::class, "get"])->name('type.get');
    Route::post('/{type_id}/update', [TypeController::class, "update"])->name('type.update');
    Route::delete('/{type_id}/delete', [TypeController::class, "delete"])->name('type.delete');
    Route::get('/status/{student_id}', [TypeController::class, 'status'])->name('type.status');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, "index"])->name('category.index');
    Route::get('/all', [CategoryController::class, "all"])->name('category.all');
    Route::post('/store', [CategoryController::class, "store"])->name('category.store');
    Route::get('/{category_id}/get', [CategoryController::class, "get"])->name('category.get');
    Route::post('/{category_id}/update', [CategoryController::class, "update"])->name('category.update');
    Route::delete('/{category_id}/delete', [CategoryController::class, "delete"])->name('category.delete');
    Route::get('/status/{student_id}', [CategoryController::class, 'status'])->name('category.status');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, "index"])->name('product.index');
    Route::get('/all', [ProductController::class, "all"])->name('product.all');
    Route::post('/store', [ProductController::class, "store"])->name('product.store');
    Route::get('/{product_id}/get', [ProductController::class, "get"])->name('product.get');
    Route::get('/{product_id}/edit', [ProductController::class, "edit"])->name('product.edit');
    Route::post('/{product_id}/update', [ProductController::class, "update"])->name('product.update');
    Route::delete('/{product_id}/delete', [ProductController::class, "delete"])->name('product.delete');
    // Route::get('/status/{product_id}', [ProductController::class, 'status'])->name('product.status');
    Route::post('/{product_id}/upload-images', [ProductController::class, 'uploadImages'])->name('product.upload_images');
    Route::get('/{product_id}/images', [ProductController::class, 'getImages'])->name('product.images.get');
    Route::get('/imageStatus/{image_id}', [ProductController::class, 'imageStatus'])->name('product.images.status');
    Route::delete('/product/{image_id}/delete', [ProductController::class, "imageDelete"])->name('product.images.delete');



});
