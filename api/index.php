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

// Use the repository image directly. The old ImgBB URL pointed to an HTML
// page, not the image itself, and the old onerror handler could replace it.
$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*\s+src=["\'])[^"\']*(["\'])/i',
    '$1/image_a0840b.png?v=4$2',
    $html,
    1
);

// The avatar must show the complete image rather than cropping it.
$html = preg_replace(
    '/(<img[^>]*id=["\']tiktokAvatarImg["\'][^>]*\s+class=["\'])[^"\']*(["\'])/i',
    '$1w-full h-full object-contain object-center rounded-xl bg-transparent border border-black\/40$2',
    $html,
    1
);

// Remove the old fallback handler from the avatar.
$html = preg_replace(
    '/\s+onerror=["\']handleAvatarError\(this\)["\']/i',
    '',
    $html,
    1
);

// Each section already has its icon in a dedicated black square. Remove the
// repeated icon from the H2 so it cannot appear twice.
$html = preg_replace(
    '/(<h2[^>]*>\s*)🏆\s*(TOP DONATUR KLAN)/u',
    '$1$2',
    $html,
    1
);

$html = preg_replace(
    '/(<h2[^>]*>\s*)⚔️\s*(COC ITEM SHOP)/u',
    '$1$2',
    $html,
    1
);

// Defensive client-side cleanup prevents stale/cached Blade fragments from
// reintroducing the duplicate icons and enforces the avatar fit mode.
$html = str_replace('</body>', <<<'HTML'
<style id="final-ui-fixes">
  #tiktokAvatarImg {
    object-fit: contain !important;
    object-position: center center !important;
    width: 100% !important;
    height: 100% !important;
    display: block !important;
    background: transparent !important;
  }
</style>
<script>
(function () {
  function cleanSectionIcon(sectionId, icon, title) {
    var section = document.getElementById(sectionId);
    if (!section) return;
    section.querySelectorAll('h2').forEach(function (heading) {
      var text = (heading.textContent || '').trim();
      if (text.indexOf(icon) === 0 && text.indexOf(title) !== -1) {
        heading.textContent = text.replace(icon, '').trim();
      }
    });
  }

  function applyFinalFixes() {
    var img = document.getElementById('tiktokAvatarImg');
    if (img) {
      img.onerror = null;
      img.style.objectFit = 'contain';
      img.style.objectPosition = 'center center';
      img.style.width = '100%';
      img.style.height = '100%';
      img.style.display = 'block';
    }
    cleanSectionIcon('topDonaturSection', '🏆', 'TOP DONATUR KLAN');
    cleanSectionIcon('cocShopSection', '⚔️', 'COC ITEM SHOP');
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', applyFinalFixes);
  } else {
    applyFinalFixes();
  }
})();
</script>
</body>
HTML, 1);

echo $html;
