<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/shopping-cart', [CartController::class, 'ebookCart'])->name('cart.details');
Route::get('/shopping-cart/ebook/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/shopping-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::patch('/shopping-cart/pay', [CartController::class, 'closeCart'])->name('cart.pay');
Route::delete('/shopping-cart', [CartController::class, 'deleteFromCart'])->name('cart.delete');

require __DIR__.'/auth.php';
