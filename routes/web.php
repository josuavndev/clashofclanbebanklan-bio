<?php

use Illuminate\Support\Facades\Route;

// This page is static HTML. Avoid Route::view() because this deployment
// intentionally does not register Laravel's view service provider.
Route::get('/', function () {
    return file_get_contents(resource_path('views/home.blade.php'));
})->name('home');
