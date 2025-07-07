<?php

use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductsController;
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
Route::get('/shop', [ProductsController::class, 'shop'])->name('shop');
Route::get('/shop/category/{name}', [ProductController::class, 'shop_by_category'])->name('shop.category');
Route::get('/shop/{name}', [ProductController::class, 'shop_by_subcategory'])->name('shop.subcategory');

Route::post('/shopFilter', [ProductController::class, 'filter'])->name('filter');

Route::get('/send', [MailController::class, 'send']);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/cart.php';
