<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
Route::get('/trashed', [ProductController::class, 'trashed'])->name('products.trashed');
Route::patch('/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('/{id}/forceDelete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
