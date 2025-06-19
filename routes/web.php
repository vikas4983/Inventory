<?php

use App\Http\Controllers\inventory\BrandController;
use App\Http\Controllers\Inventory\CategoryController;
use App\Http\Controllers\Inventory\CustomerController;
use App\Http\Controllers\inventory\ProductController;
use App\Http\Controllers\Inventory\PurchaseController;
use App\Http\Controllers\Inventory\PurchaseItemController;
use App\Http\Controllers\Inventory\SaleController;
use App\Http\Controllers\Inventory\SaleItemController;
use App\Http\Controllers\Inventory\StatusController;
use App\Http\Controllers\inventory\SupplierController;
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
    Route::resource('suppliers', SupplierController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('statuses', StatusController::class);
    Route::resource('purchaseItems', PurchaseItemController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('saleItems', SaleItemController::class);
    Route::post('delete', [CategoryController::class, 'destroy'])->name('delete');
});
