<?php

// Vercel entrypoint for the public bio page.
// Serve the static Blade HTML directly so the public page does not depend on
// Laravel view/runtime bindings inside the Vercel serverless environment.

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

// Use the repository image directly. The previous ImgBB page URL was not a
// direct image URL, so the browser could fall back to the wrong asset.
$html = str_replace(
    'src="https://ibb.co.com/XfNvBssL"',
    'src="/image_a0840b.png"',
    $html
);

// Keep the complete avatar visible inside the square; never crop it.
$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*class=["\'])([^"\']*)(["\'])/i',
    '$1$2 object-contain object-center$3',
    $html,
    1
);

$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*)(>)/i',
    '$1 style="object-fit:contain!important;object-position:center!important;width:100%;height:100%;display:block;"$2',
    $html,
    1
);

// The COC ITEM SHOP header had the crossed-swords icon both before the title
// and inside the H2. Keep the dedicated icon and remove the duplicate from H2.
$html = str_replace(
    '>⚔️ COC ITEM SHOP</h2>',
    '>COC ITEM SHOP</h2>',
    $html
);

echo $html;
