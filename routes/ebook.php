<?php

use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/ebook', [EbookController::class, 'ebook']);

Route::get('/ebooks', [EbookController::class, 'ebooks']);

Route::get('/ebook/add', [EbookController::class, 'create'])->name('ebook.create');
Route::post('/ebook/store', [EbookController::class, 'store'])->name('ebook.store');
Route::get('/ebook/details/{id}', [EbookController::class, 'details'])->name('ebook.details');

require __DIR__.'/auth.php';
