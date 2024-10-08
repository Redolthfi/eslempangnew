<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserProfileController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/faq', function () {
    return view('pages/faq');
});

Route::get('/contact', function () {
    return view('pages/contact');
});
Route::get('/orderdetail', function () {
    return view('pages/orderdetail');
});

Route::get('/productdetail/{id}', function ($id) {

    $product = Product::findOrFail($id);
    return view('pages/productdetail', [
        'product' => $product
    ]);
})->name('product.detail');

Route::get('/products', function () {
    $products = Product::get();

    return view('pages/product', [
        'products' => $products
    ]);
})->name('product');


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

    Route::get('myCart', [UserCartController::class, 'index'])->name('cart.user');

    Route::get('/createOrder', [OrderController::class, 'createPost'])->name('order.post');

    // Route::get('/order', [CartController::class, 'index']);
    Route::post('/cartAdd', [CartController::class, 'add'])->name('cart.add');

    Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    // Route::get('/order', [CartController::class, 'index']);
    // Route::post('/order', [CartController::class, 'add']);
    // Route::get('/order/delete/{id}', [CartController::class, 'delete']);


    Route::prefix('master')->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('master.orderlist.index');
            Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('master.orderlist.detail');
            Route::post('/detail/{id}', [OrderController::class, 'detailPost']);
        });
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('master.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('master.product.create');
            Route::post('/create', [ProductController::class, 'createPost']);

            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('master.product.edit');
            Route::post('/edit/{id}', [ProductController::class, 'editPost']);

            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('master.product.delete');
        });
    });
});