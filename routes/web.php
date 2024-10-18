<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::get('products/trashed', [ProductController::class, 'trashed'])->name('products.trashed');
