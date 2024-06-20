<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

// Define the routes for the authors resource

Route::get('/authors/add', [AuthorController::class, 'create'])->name('author.create');
Route::post('/authors/store', [AuthorController::class, 'store'])->name('author.store');
Route::delete('/author/{id}', [AuthorController::class, 'delete'])->name('author.delete');
Route::patch('/author/{id}', [AuthorController::class, 'update'])->name('author.update');

require __DIR__.'/auth.php';
