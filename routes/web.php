<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);

Route::get('/orders/{order}/payment', [OrderController::class, 'payment'])
    ->name('orders.payment');

Route::post('/orders/{order}/payment', [OrderController::class, 'paymentStore'])
    ->name('orders.payment.store');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('products', AdminProductController::class);

    Route::get('/orders', [AdminPageController::class, 'orders'])
        ->name('orders.index');

    Route::get('/orders/{code}', [AdminPageController::class, 'orderDetail'])
        ->name('orders.show');

    Route::post('/orders/action', [AdminPageController::class, 'orderAction'])
        ->name('orders.action');

    Route::get('/designs', [AdminPageController::class, 'designs'])
        ->name('designs.index');

    Route::post('/designs/action', [AdminPageController::class, 'designAction'])
        ->name('designs.action');

    Route::resource('payments', PaymentController::class);

    Route::post('/payments/action', [PaymentController::class, 'action'])
        ->name('payments.action');

    Route::get('/admins', [AdminPageController::class, 'admins'])
        ->name('admins.index');

    Route::get('/admins/create', [AdminPageController::class, 'createAdmin'])
        ->name('admins.create');

    Route::get('/admins/{id}/edit', [AdminPageController::class, 'editAdmin'])
        ->name('admins.edit');

    Route::post('/admins/action', [AdminPageController::class, 'adminAction'])
        ->name('admins.action');
});
