<?php

use Illuminate\Support\ServiceProvider;

return [
    'name' => env('APP_NAME', 'CLASHOFCLANBEBANKLAN'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost:8000'),
    'timezone' => 'Asia/Jakarta',
    'locale' => 'id',
    'fallback_locale' => 'en',
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'previous_keys' => array_filter(explode(',', (string) env('APP_PREVIOUS_KEYS', ''))),
    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'array'),
    ],
    'providers' => ServiceProvider::defaultProviders()->merge([
        // Application service providers can be added here later.
    ])->toArray(),
];
