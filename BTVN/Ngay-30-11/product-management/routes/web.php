<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);  // class, method
Route::resource('products', ProductController::class);

Route::get('/shop', function() {
    $products = Product::all();
    return view('products.shop', compact('products'));
})->name('shop');