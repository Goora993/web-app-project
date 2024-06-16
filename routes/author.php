<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Define the routes for the authors resource

Route::get('/authors/add', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');

require __DIR__.'/auth.php';
