<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')
    ->prefix('admin')->as('admin.')
    ->group(function () {

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

Route::middleware('auth:admin')
    ->prefix('admin')->as('admin.')->group(function () {

        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('dashboard');


        // for registering
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('users', [RegisteredUserController::class, 'users_list'])->name('users.list');
        Route::get('admins', [RegisteredUserController::class, 'admins_list'])->name('admins.list');
        Route::post('admins/remove', [RegisteredUserController::class, 'admins_remove'])->name('admins.remove');

        // routes for categories
        Route::get('/categories', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/categories/new', [CategoryController::class, 'add'])->name('category.add');
        Route::post('/categories/new', [CategoryController::class, 'create']);
        Route::get('/categories/edit/{id}', [CategoryController::class, 'editForm'])->name('category.edit');
        Route::post('/categories/edit', [CategoryController::class, 'edit'])->name('category.update');
        Route::delete('/categories/delete', [CategoryController::class, 'delete'])->name('category.delete');

        Route::get('/subcategories/all', [SubCategoryController::class, 'subCatList']);
        Route::get('/categories/{id}', [CategoryController::class, 'view'])->name('category.view');
        Route::get('/subCategory/new', [SubCategoryController::class, 'addSub'])->name('subcategory.add');
        Route::post('/subCategory/new', [SubCategoryController::class, 'createSub']);
        // for ajax
        Route::get('/subcategories/{category_id}', [ProductController::class, 'getSubCategories']);

        Route::get('/subCategory/edit/{id}', [SubCategoryController::class, 'editForm'])->name('subcategory.edit');
        Route::post('/subCategory/edit', [SubCategoryController::class, 'edit'])->name('subcategory.update');
        Route::delete('/subCategory/delete', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/subCategories', [SubCategoryController::class, 'subCatList'])->name('subcategory.list');

        Route::get('/products', [ProductController::class, 'list'])->name('product.list');
        Route::get('/product/new', [ProductController::class, 'add'])->name('product.add');
        Route::post('/product/new', [ProductController::class, 'submit_add']);
        Route::get('/product/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/edit', [ProductController::class, 'submit_edit'])->name('product.update');
        Route::delete('/product/delete', [ProductController::class, 'delete'])->name('product.delete');

        // Routes for order handling
        Route::get('/orders', [OrderController::class, 'list'])->name('order.list');
        Route::get('/paid-orders', [OrderController::class, 'paid_list'])->name('order.paid-list');
        Route::get('/unpaid-orders', [OrderController::class, 'unpaid_list'])->name('order.unpaid-list');
        Route::get('/shipped-list', [OrderController::class, 'shipped_list'])->name('order.shipped-list');
        Route::get('/cancelled-list', [OrderController::class, 'cancelled_list'])->name('order.cancelled-list');


        Route::get('/orders/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::post('/orders/update', [OrderController::class, 'update_store'])->name('order.update.store');





        // logout for admin
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
