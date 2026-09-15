<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::resource('home', HomeController::class)
    ->only(['index']);

Route::resource('products', ProductController::class)
    ->only(['index', 'show']);

Route::redirect('/', '/home');
