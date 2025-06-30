<?php

use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product/{slug}', [ProductController::class, 'singleProduct'])->name('product.view');

Route::get('/products', [ProductController::class, 'jsonlist']);
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/addTocart', [ProductController::class, 'addCart'])->name('addcart');
Route::post('/update-cart', [ProductController::class, 'updateCart'])->name('cart.update');
Route::post('/delete-item', [ProductController::class, 'deleteItem'])->name('cart.update');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/cart.php';
