<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\ViewServiceProvider;

Route::get('/', function () {
    // Explicitly register the view provider for the Vercel serverless runtime.
    // This keeps the Blade rendering path reliable even if the provider manifest
    // is stale or incomplete between deployments.
    app()->register(ViewServiceProvider::class);

    return view('home');
})->name('home');
