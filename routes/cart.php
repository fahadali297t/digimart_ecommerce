<?php

use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::post('update-cart-price', [CartController::class, 'quantity_update'])->name('cart.price.update');
Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
