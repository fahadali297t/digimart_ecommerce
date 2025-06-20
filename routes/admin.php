<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\CategoryController;
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

        // logout for admin
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
