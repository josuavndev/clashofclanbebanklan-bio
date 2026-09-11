<?php

// Vercel entrypoint.
// The public bio is served as static HTML, while /admin provides a small
// password-protected admin entry point without depending on Laravel's view
// service provider or session middleware.

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

/* --------------------------------------------------------------------------
 | Admin authentication
 |-------------------------------------------------------------------------- */

if ($path === '/admin' || $path === '/admin/' || $path === '/admin/logout') {
    $username = getenv('ADMIN_USERNAME') ?: 'admin';
    $password = getenv('ADMIN_PASSWORD') ?: '';

    // The password lives only in Vercel Environment Variables. It is never
    // committed to GitHub. The same secret signs the short-lived auth cookie.
    $secret = $password !== '' ? hash('sha256', $password . '|' . $username) : '';

    $cookieName = 'bebanklan_admin';
    $cookieValue = $_COOKIE[$cookieName] ?? '';

    $makeToken = static function () use ($username, $secret): string {
        $payload = $username . '|admin';
        $signature = hash_hmac('sha256', $payload, $secret);
        return base64_encode($payload . '|' . $signature);
    };

    $isAuthenticated = $secret !== '' && hash_equals($makeToken(), $cookieValue);

    if ($path === '/admin/logout') {
        setcookie($cookieName, '', [
            'expires' => time() - 3600,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        header('Location: /admin');
        exit;
    }

    $error = '';

    if ($method === 'POST') {
        $submittedUsername = trim((string) ($_POST['username'] ?? ''));
        $submittedPassword = (string) ($_POST['password'] ?? '');

        if ($secret === '') {
            $error = 'Admin belum dikonfigurasi. Tambahkan ADMIN_USERNAME dan ADMIN_PASSWORD di Vercel Environment Variables.';
        } elseif (hash_equals($username, $submittedUsername) && hash_equals($password, $submittedPassword)) {
            setcookie($cookieName, $makeToken(), [
                'expires' => time() + 86400,
                'path' => '/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Lax',
            ]);
            header('Location: /admin');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    }

    header('Content-Type: text/html; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

    if (!$isAuthenticated) {
        $safeError = htmlspecialchars($error, ENT_QUOTES, 'UTF-8');
        echo '<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin — Bebanklan</title><style>
        *{box-sizing:border-box}body{margin:0;min-height:100vh;background:#f8f6ed;color:#090909;font-family:Arial,Helvetica,sans-serif;display:grid;place-items:center;padding:24px;background-image:radial-gradient(#111 1px,transparent 1px);background-size:24px 24px}.card{width:min(440px,100%);background:#fff;border:4px solid #090909;border-radius:24px;box-shadow:9px 9px 0 #090909;padding:30px}.badge{display:inline-block;background:#090909;color:#ffe000;border:3px solid #090909;border-radius:999px;padding:8px 13px;font-weight:900;font-size:12px}.logo{font-size:32px;font-weight:1000;margin:18px 0 6px}.sub{color:#555;margin:0 0 24px}label{display:block;font-weight:900;margin:14px 0 7px}input{width:100%;padding:14px 15px;border:3px solid #090909;border-radius:12px;font-size:16px;outline:none}input:focus{box-shadow:4px 4px 0 #19d3ff}.btn{width:100%;margin-top:20px;padding:14px;border:3px solid #090909;border-radius:12px;background:#ff275d;color:#fff;font-weight:1000;font-size:16px;cursor:pointer;box-shadow:4px 4px 0 #090909}.error{background:#ffe6eb;border:3px solid #ff275d;padding:12px;border-radius:12px;font-weight:800;margin-bottom:12px}.back{display:block;text-align:center;margin-top:20px;color:#090909;font-weight:800;text-decoration:none}.hint{font-size:12px;color:#666;margin-top:18px;line-height:1.5}</style></head><body><main class="card"><span class="badge">⚡ BEBANKLAN ADMIN</span><div class="logo">Dashboard Login</div><p class="sub">Kelola halaman bio CLASHOFCLANBEBANKLAN.</p>' . ($safeError !== '' ? '<div class="error">' . $safeError . '</div>' : '') . '<form method="post" action="/admin"><label>Username</label><input name="username" autocomplete="username" required><label>Password</label><input name="password" type="password" autocomplete="current-password" required><button class="btn" type="submit">MASUK KE ADMIN →</button></form><a class="back" href="/">← Kembali ke halaman utama</a><p class="hint">Akses admin memakai Environment Variables Vercel. Password tidak disimpan di repository.</p></main></body></html>';
        exit;
    }

    echo '<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin Dashboard — Bebanklan</title><style>
    *{box-sizing:border-box}body{margin:0;background:#f8f6ed;color:#090909;font-family:Arial,Helvetica,sans-serif;padding:30px;background-image:radial-gradient(#111 1px,transparent 1px);background-size:24px 24px}.wrap{width:min(1000px,100%);margin:auto}.top{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:24px}.brand{font-size:28px;font-weight:1000}.pill{background:#090909;color:#fff;padding:10px 14px;border-radius:999px;font-weight:900;text-decoration:none}.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.box{background:#fff;border:4px solid #090909;border-radius:20px;box-shadow:7px 7px 0 #090909;padding:22px}.box h2{margin:0 0 8px;font-size:21px}.box p{margin:0;color:#555;line-height:1.5}.status{display:inline-block;margin-top:14px;background:#d8ffe5;border:2px solid #111;border-radius:999px;padding:7px 10px;font-weight:900;font-size:12px}.link{display:inline-block;margin-top:16px;background:#ffe000;color:#090909;border:3px solid #090909;border-radius:11px;padding:11px 14px;font-weight:1000;text-decoration:none;box-shadow:3px 3px 0 #090909}@media(max-width:700px){body{padding:18px}.top{align-items:flex-start}.grid{grid-template-columns:1fr}.brand{font-size:23px}}
    </style></head><body><div class="wrap"><div class="top"><div class="brand">⚡ BEBANKLAN ADMIN</div><a class="pill" href="/admin/logout">LOGOUT</a></div><div class="grid"><section class="box"><h2>Dashboard aktif</h2><p>Login admin berhasil. Endpoint admin sudah berjalan terpisah dari halaman publik.</p><span class="status">● AUTHENTICATED</span></section><section class="box"><h2>Halaman publik</h2><p>Lihat versi live bio CLASHOFCLANBEBANKLAN tanpa keluar dari dashboard.</p><a class="link" href="/" target="_blank" rel="noopener">BUKA BIO →</a></section><section class="box"><h2>Profil</h2><p>Struktur admin sudah siap untuk tahap berikutnya: edit profile, bio, statistik, tombol, shop, donatur, dan section lainnya.</p></section><section class="box"><h2>Keamanan</h2><p>Password disimpan sebagai Vercel Environment Variable dan cookie admin menggunakan HttpOnly + Secure.</p></section></div></div></body></html>';
    exit;
}

/* --------------------------------------------------------------------------
 | Public bio page
 |-------------------------------------------------------------------------- */

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
// Remove duplicate icons from the headings.
$html = str_replace('🏆 TOP DONATUR KLAN', 'TOP DONATUR KLAN', $html);
$html = str_replace('⚔️ COC ITEM SHOP', 'COC ITEM SHOP', $html);

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

echo $html;
