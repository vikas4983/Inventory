<?php

use App\Http\Controllers\inventory\BrandController;
use App\Http\Controllers\Inventory\CategoryController;
use App\Http\Controllers\inventory\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::post('delete', [CategoryController::class, 'destroy'])->name('delete');
});
