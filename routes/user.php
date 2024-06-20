<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');

require __DIR__.'/auth.php';
