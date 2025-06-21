<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')
    ->prefix('admin')->as('admin.')
    ->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

Route::middleware('auth:admin')
    ->prefix('admin')->as('admin.')->group(function () {

        Route::get('/dashboard', function () {
            return view('Admin.dashboard');
        })->name('dashboard');

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

        Route::get('/subCategory/edit/{id}', [SubCategoryController::class, 'editForm'])->name('subcategory.edit');
        Route::post('/subCategory/edit', [SubCategoryController::class, 'edit'])->name('subcategory.update');
        Route::delete('/subCategory/delete', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/subCategories', [SubCategoryController::class, 'subCatList'])->name('subcategory.list');


        Route::get('/product/new' , [ProductController::class , 'add'])->name('product.add');


        // logout for admin
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
