<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

try {
    $autoload = __DIR__.'/../vendor/autoload.php';
    if (!is_file($autoload)) {
        throw new RuntimeException('Composer autoload not found: '.$autoload);
    }

    require $autoload;

    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $app->handleRequest(Request::capture());
} catch (Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Laravel boot error\n\n";
    echo get_class($e).": ".$e->getMessage()."\n";
    echo "File: ".$e->getFile().":".$e->getLine()."\n\n";
    echo $e->getTraceAsString();
}
