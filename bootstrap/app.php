<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckRole; // Include your CheckRole middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
      //  $middleware->routeMiddleware([
        //    'role' => CheckRole::class, // Register your 'role' middleware
      // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // You can handle exceptions here if needed
    })->create();
