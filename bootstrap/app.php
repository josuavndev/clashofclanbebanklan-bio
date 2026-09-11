<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

// Vercel does not automatically provide a Laravel .env file at runtime.
// Keep APP_KEY overridable by a real environment variable, but provide a
// stable fallback so the web middleware can boot on the serverless runtime.
if (!getenv('APP_KEY')) {
    $fallbackKey = 'base64:xOrKLtiH4N6H5Tm5Q5meBHQbiS4re66m7C3c0RrxcNs=';
    putenv('APP_KEY='.$fallbackKey);
    $_ENV['APP_KEY'] = $fallbackKey;
    $_SERVER['APP_KEY'] = $fallbackKey;
}

return Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        // Laravel's ViewServiceProvider must be registered during bootstrap
        // so the `view` binding is available before routes are evaluated.
        ViewServiceProvider::class,
    ])
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Keep the bio hub lightweight; add middleware here as the app grows.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })
    ->create();
