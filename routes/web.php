<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;

Route::resource('home', HomeController::class)
    ->only(['index']);

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.dashboard');

Route::resource('admin/orders', AdminOrderController::class)
    ->only(['index']);
Route::redirect('/', '/home');
