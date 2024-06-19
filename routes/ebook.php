<?php

use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/ebook', [EbookController::class, 'ebook']);

Route::get('/ebooks', [EbookController::class, 'ebooks']);

Route::get('/ebook/add', [EbookController::class, 'create'])->name('ebook.create');

Route::post('/ebook', [EbookController::class, 'store'])->name('ebook.store');
Route::get('/ebook/{id}', [EbookController::class, 'details'])->name('ebook.details');
Route::patch('/ebook/{id}', [EbookController::class, 'update'])->name('ebook.update');
Route::delete('/ebook/{id}', [EbookController::class, 'delete'])->name('ebook.delete');

require __DIR__.'/auth.php';
