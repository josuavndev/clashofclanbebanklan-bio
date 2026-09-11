<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// Vercel does not provide a .env file unless one is configured in the project.
// Keep APP_KEY overridable by a real environment variable while providing a
// stable fallback so Laravel can boot in the serverless runtime.
if (! getenv('APP_KEY')) {
    $fallbackKey = 'base64:xOrKLtiH4N6H5Tm5Q5meBHQbiS4re66m7C3c0RrxcNs=';
    putenv('APP_KEY='.$fallbackKey);
    $_ENV['APP_KEY'] = $fallbackKey;
    $_SERVER['APP_KEY'] = $fallbackKey;
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // No custom middleware required for the public bio page.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })
    ->create();
