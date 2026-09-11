<?php

// Vercel entrypoint for the public bio page.
// Serve the finished HTML directly; Laravel's view/container runtime is not
// needed for this public static page.

$htmlFile = __DIR__ . '/../resources/views/home.blade.php';

if (!is_file($htmlFile) || !is_readable($htmlFile)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Bio page source file is missing.';
    exit;
}

$html = file_get_contents($htmlFile);
if ($html === false) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo 'Unable to read bio page source.';
    exit;
}

// Use the real repository image instead of the ImgBB landing page URL.
$html = str_replace(
    'https://ibb.co.com/XfNvBssL',
    '/image_a0840b.png?v=5',
    $html
);

// Show the complete avatar without cropping it.
$html = str_replace('object-cover object-center', 'object-contain object-center', $html);
$html = str_replace('onerror="handleAvatarError(this)"', '', $html);

// The sections already have their icons in dedicated black squares.
// Remove the duplicate icons from the headings.
$html = str_replace('🏆 TOP DONATUR KLAN', 'TOP DONATUR KLAN', $html);
$html = str_replace('⚔️ COC ITEM SHOP', 'COC ITEM SHOP', $html);

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

echo $html;
