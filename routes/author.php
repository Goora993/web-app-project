<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Define the routes for the authors resource

Route::get('/authors/add', [AuthorController::class, 'create'])->name('author.create');
Route::post('/authors/store', [AuthorController::class, 'store'])->name('author.store');

require __DIR__.'/auth.php';
