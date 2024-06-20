<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::middleware('web')
                ->group(base_path('routes/author.php'));

            Route::middleware('web')
                ->group(base_path('routes/ebook.php'));

            Route::middleware('web')
                ->group(base_path('routes/cart.php'));

            Route::middleware('web')
                ->group(base_path('routes/user.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('routes/auth.php');
        },
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
