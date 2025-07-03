<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::post('update-cart-price', [CartController::class, 'quantity_update'])->name('cart.price.update');
Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('order', [OrderController::class, 'payout'])->name('order.pay');
Route::get('/order_fullfil', [OrderController::class, 'order_fullfil'])->name('order.success');
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
