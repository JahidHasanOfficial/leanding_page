<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ShopController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Direct checkout routes (Dual route names for test & frontend compatibility)
Route::post('/orders/direct', [CheckoutController::class, 'storeDirect'])->name('orders.storeDirect');
Route::post('/checkout/direct', [CheckoutController::class, 'storeDirect'])->name('checkout.storeDirect');

Route::get('/orders/success', [CheckoutController::class, 'success'])->name('orders.success');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::middleware('auth')->group(function () {
    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Cart checkout routes (Dual route names for test & frontend compatibility)
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('orders.checkout');
    Route::get('/checkout/cart', [CheckoutController::class, 'checkout'])->name('checkout.index');

    Route::post('/orders', [CheckoutController::class, 'store'])->name('orders.store');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/orders', [CheckoutController::class, 'orders'])->name('orders.index');
    Route::get('/checkout/orders', [CheckoutController::class, 'orders'])->name('checkout.orders');

    Route::get('/orders/{order}', [CheckoutController::class, 'orderDetail'])->name('orders.show');
    Route::get('/checkout/orders/{order}', [CheckoutController::class, 'orderDetail'])->name('checkout.orders.show');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductManagementController::class);
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderManagementController::class, 'show'])->name('orders.show');
    Route::put('/orders/{order}/status', [\App\Http\Controllers\Admin\OrderManagementController::class, 'updateStatus'])->name('orders.updateStatus');
});

// Static Pages Routes
Route::view('/about', 'frontend.pages.about')->name('about');
Route::view('/contact', 'frontend.pages.contact')->name('contact');
Route::view('/faq', 'frontend.pages.faq')->name('faq');
Route::view('/terms', 'frontend.pages.terms')->name('terms');

require __DIR__.'/auth.php';
