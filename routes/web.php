<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost']);
});

// auth path
Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('profile')->group(function () {
            Route::get('/', [UserProfileController::class, 'index'])->name('profile.index');
            Route::post('/', [UserProfileController::class, 'update']);
        });
    });

    Route::get('/order', [CartController::class, 'index']);
    Route::post('/order', [CartController::class, 'add']);
    Route::get('/order/delete/{id}', [CartController::class, 'delete']);

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('master.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('master.product.create');
        Route::post('/create', [ProductController::class, 'createPost']);

        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('master.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'editPost']);

        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('master.product.delete');
    });
});