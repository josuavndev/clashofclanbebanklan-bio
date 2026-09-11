<?php

// Vercel entrypoint for the public bio page.
// The page is static HTML even though the source file uses a .blade.php extension.
// Serve it directly so the deployment does not depend on Laravel's view/runtime
// bindings inside the Vercel serverless environment.

$htmlFile = __DIR__ . '/../resources/views/home.blade.php';

if (!is_file($htmlFile) || !is_readable($htmlFile)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bio page source file is missing.';
    exit;
}

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: public, max-age=0, must-revalidate');

$html = file_get_contents($htmlFile);

if ($html === false) {
    http_response_code(500);
    echo 'Unable to read bio page source.';
    exit;
}

// Keep the complete TikTok avatar visible instead of cropping it inside the square.
$html = str_replace(
    'object-cover object-center rounded-xl bg-neutral-900 border border-black/40',
    'object-contain object-center rounded-xl bg-neutral-900 border border-black/40',
    $html
);

echo $html;
