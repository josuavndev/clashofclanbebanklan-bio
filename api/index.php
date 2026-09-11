<?php

// Vercel entrypoint for the public bio page.
// This endpoint intentionally serves the finished HTML directly. The public
// page is static and does not need Laravel's view/container runtime.

$htmlFile = __DIR__ . '/../resources/views/home.blade.php';

if (!is_file($htmlFile) || !is_readable($htmlFile)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bio page source file is missing.';
    exit;
}

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

readfile($htmlFile);
