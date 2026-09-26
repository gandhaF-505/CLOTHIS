<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.process');
});

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');

    Route::get('/products', [AdminPageController::class, 'products'])->name('products.index');
    Route::get('/products/create', [AdminPageController::class, 'createProduct'])->name('products.create');
    Route::get('/products/{id}/edit', [AdminPageController::class, 'editProduct'])->name('products.edit');
    Route::post('/products/action', [AdminPageController::class, 'placeholder'])->name('products.action');

    Route::get('/orders', [AdminPageController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{code}', [AdminPageController::class, 'orderDetail'])->name('orders.show');
    Route::post('/orders/action', [AdminPageController::class, 'placeholder'])->name('orders.action');

    Route::get('/designs', [AdminPageController::class, 'designs'])->name('designs.index');
    Route::post('/designs/action', [AdminPageController::class, 'placeholder'])->name('designs.action');

    Route::get('/payments', [AdminPageController::class, 'payments'])->name('payments.index');
    Route::post('/payments/action', [AdminPageController::class, 'placeholder'])->name('payments.action');

    Route::get('/admins', [AdminPageController::class, 'admins'])->name('admins.index');
    Route::get('/admins/create', [AdminPageController::class, 'createAdmin'])->name('admins.create');
    Route::get('/admins/{id}/edit', [AdminPageController::class, 'editAdmin'])->name('admins.edit');
    Route::post('/admins/action', [AdminPageController::class, 'placeholder'])->name('admins.action');
});
