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
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

$html = file_get_contents($htmlFile);

if ($html === false) {
    http_response_code(500);
    echo 'Unable to read bio page source.';
    exit;
}

// Force the TikTok avatar to fit inside its box without cropping.
$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*class=["\'])([^"\']*)(["\'])/i',
    '$1$2 object-contain object-center$3',
    $html,
    1
);

// Add an explicit inline rule as a final safeguard against Tailwind/browser CSS
// overriding object-fit. This keeps the entire image visible within the avatar.
$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*)(>)/i',
    '$1 style="object-fit:contain!important;object-position:center!important;width:100%;height:100%;display:block;"$2',
    $html,
    1
);

echo $html;
