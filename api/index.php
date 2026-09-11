<?php

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

const CONFIG_PATH = __DIR__ . '/../data/site-config.json';
const CONFIG_REPO_PATH = 'data/site-config.json';

function h($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function loadConfig(): array {
    if (!is_file(CONFIG_PATH)) return [];
    $raw = file_get_contents(CONFIG_PATH);
    $data = $raw !== false ? json_decode($raw, true) : null;
    return is_array($data) ? $data : [];
}

function githubRequest(string $method, string $url, ?array $payload = null): array {
    $token = getenv('GITHUB_TOKEN') ?: '';
    if ($token === '') throw new RuntimeException('GITHUB_TOKEN belum diatur di Vercel.');

    $headers = [
        'Authorization: Bearer ' . $token,
        'Accept: application/vnd.github+json',
        'X-GitHub-Api-Version: 2022-11-28',
        'User-Agent: Bebanklan-Bio-CMS',
        'Content-Type: application/json'
    ];
    $options = ['http' => [
        'method' => $method,
        'ignore_errors' => true,
        'header' => implode("\r\n", $headers),
        'timeout' => 15
    ]];
    if ($payload !== null) {
        $options['http']['content'] = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
    $body = @file_get_contents($url, false, stream_context_create($options));
    $status = 0;
    if (isset($http_response_header[0]) && preg_match('/\s(\d{3})\s/', $http_response_header[0], $m)) $status = (int)$m[1];
    $json = $body !== false ? json_decode($body, true) : null;
    if ($status < 200 || $status >= 300) {
        $message = is_array($json) ? ($json['message'] ?? 'GitHub API error') : 'GitHub API error';
        throw new RuntimeException($message . ' (HTTP ' . $status . ')');
    }
    return is_array($json) ? $json : [];
}

function saveConfig(array $config): void {
    $repo = getenv('GITHUB_REPO') ?: 'josuavndev/clashofclanbebanklan-bio';
    $url = 'https://api.github.com/repos/' . $repo . '/contents/' . CONFIG_REPO_PATH;
    $current = githubRequest('GET', $url);
    $sha = $current['sha'] ?? null;
    if (!$sha) throw new RuntimeException('Tidak bisa membaca versi konfigurasi saat ini.');
    $json = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($json === false) throw new RuntimeException('Konfigurasi gagal di-encode.');
    githubRequest('PUT', $url, [
        'message' => 'Update bio content from admin CMS',
        'content' => base64_encode($json),
        'sha' => $sha,
        'branch' => 'main'
    ]);
}

/* --------------------------------------------------------------------------
 | Admin authentication + CMS
 |-------------------------------------------------------------------------- */

if ($path === '/admin' || $path === '/admin/' || $path === '/admin/logout') {
    $username = getenv('ADMIN_USERNAME') ?: 'admin';
    $password = getenv('ADMIN_PASSWORD') ?: '';
    $secret = $password !== '' ? hash('sha256', $password . '|' . $username) : '';
    $cookieName = 'bebanklan_admin';
    $cookieValue = $_COOKIE[$cookieName] ?? '';

    $makeToken = static function () use ($username, $secret): string {
        $payload = $username . '|admin';
        return base64_encode($payload . '|' . hash_hmac('sha256', $payload, $secret));
    };
    $isAuthenticated = $secret !== '' && hash_equals($makeToken(), $cookieValue);

    if ($path === '/admin/logout') {
        setcookie($cookieName, '', ['expires'=>time()-3600,'path'=>'/','secure'=>true,'httponly'=>true,'samesite'=>'Lax']);
        header('Location: /admin'); exit;
    }

    $error = '';
    $success = '';

    if ($method === 'POST' && $isAuthenticated && ($_POST['action'] ?? '') === 'save_config') {
        try {
            $config = loadConfig();
            $products = json_decode((string)($_POST['products_json'] ?? '[]'), true, 512, JSON_THROW_ON_ERROR);
            $monthly = json_decode((string)($_POST['monthly_json'] ?? '[]'), true, 512, JSON_THROW_ON_ERROR);
            $allTime = json_decode((string)($_POST['alltime_json'] ?? '[]'), true, 512, JSON_THROW_ON_ERROR);
            if (!is_array($products) || !is_array($monthly) || !is_array($allTime)) throw new RuntimeException('Products atau donatur harus berupa JSON array.');

            $config['config']['creatorName'] = trim((string)($_POST['creatorName'] ?? ''));
            $config['config']['tiktok'] = [
                'username'=>trim((string)($_POST['tiktokUsername'] ?? '')),
                'displayName'=>trim((string)($_POST['tiktokDisplayName'] ?? '')),
                'profileUrl'=>trim((string)($_POST['tiktokProfileUrl'] ?? '')),
                'avatarUrl'=>trim((string)($_POST['avatarUrl'] ?? '')),
                'bio'=>trim((string)($_POST['bio'] ?? '')),
                'stats'=>[
                    'following'=>trim((string)($_POST['following'] ?? '')),
                    'followers'=>trim((string)($_POST['followers'] ?? '')),
                    'likes'=>trim((string)($_POST['likes'] ?? ''))
                ]
            ];
            $config['config']['urls'] = [
                'donateSaweria'=>trim((string)($_POST['donateSaweria'] ?? '')),
                'donateTrakteer'=>trim((string)($_POST['donateTrakteer'] ?? '')),
                'donateKofi'=>trim((string)($_POST['donateKofi'] ?? '')),
                'aiKlipperAffiliate'=>trim((string)($_POST['aiKlipperAffiliate'] ?? '')),
                'whatsappNumber'=>trim((string)($_POST['whatsappNumber'] ?? '')),
                'discordInvite'=>trim((string)($_POST['discordInvite'] ?? '')),
                'socials'=>[
                    'youtube'=>trim((string)($_POST['youtube'] ?? '')),
                    'tiktok'=>trim((string)($_POST['socialTiktok'] ?? '')),
                    'instagram'=>trim((string)($_POST['instagram'] ?? '')),
                    'discord'=>trim((string)($_POST['socialDiscord'] ?? '')),
                    'github'=>trim((string)($_POST['github'] ?? ''))
                ]
            ];
            $config['products'] = array_values($products);
            $config['topDonators'] = ['monthly'=>array_values($monthly),'allTime'=>array_values($allTime)];
            saveConfig($config);
            $success = 'Perubahan tersimpan. Vercel sedang membuat deployment baru dari commit konfigurasi.';
        } catch (Throwable $e) { $error = $e->getMessage(); }
    }

    header('Content-Type: text/html; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

    if (!$isAuthenticated) {
        echo '<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin — Bebanklan</title><style>*{box-sizing:border-box}body{margin:0;min-height:100vh;background:#f8f6ed;color:#090909;font-family:Arial,sans-serif;display:grid;place-items:center;padding:24px;background-image:radial-gradient(#111 1px,transparent 1px);background-size:24px 24px}.card{width:min(440px,100%);background:#fff;border:4px solid #090909;border-radius:24px;box-shadow:9px 9px 0 #090909;padding:30px}.badge{display:inline-block;background:#090909;color:#ffe000;border-radius:999px;padding:8px 13px;font-weight:900;font-size:12px}.logo{font-size:32px;font-weight:1000;margin:18px 0 6px}.sub{color:#555;margin:0 0 24px}label{display:block;font-weight:900;margin:14px 0 7px}input{width:100%;padding:14px 15px;border:3px solid #090909;border-radius:12px;font-size:16px}.btn{width:100%;margin-top:20px;padding:14px;border:3px solid #090909;border-radius:12px;background:#ff275d;color:#fff;font-weight:1000;font-size:16px;cursor:pointer;box-shadow:4px 4px 0 #090909}.error{background:#ffe6eb;border:3px solid #ff275d;padding:12px;border-radius:12px;font-weight:800;margin-bottom:12px}.back{display:block;text-align:center;margin-top:20px;color:#090909;font-weight:800;text-decoration:none}</style></head><body><main class="card"><span class="badge">⚡ BEBANKLAN ADMIN</span><div class="logo">Dashboard Login</div><p class="sub">Kelola halaman bio CLASHOFCLANBEBANKLAN.</p>'.($error!==''?'<div class="error">'.h($error).'</div>':'').'<form method="post"><label>Username</label><input name="username" autocomplete="username" required><label>Password</label><input name="password" type="password" autocomplete="current-password" required><button class="btn" type="submit">MASUK KE ADMIN →</button></form><a class="back" href="/">← Kembali ke halaman utama</a></main></body></html>'; exit;
    }

    $config=loadConfig(); $t=$config['config']['tiktok']??[]; $s=$t['stats']??[]; $u=$config['config']['urls']??[]; $socials=$u['socials']??[];
    $productsJson=json_encode($config['products']??[],JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    $monthlyJson=json_encode($config['topDonators']['monthly']??[],JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    $alltimeJson=json_encode($config['topDonators']['allTime']??[],JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    $errorHtml=$error!==''?'<div class="alert error">⚠️ '.h($error).'</div>':'';
    $successHtml=$success!==''?'<div class="alert success">✅ '.h($success).'</div>':'';

    echo '<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Bebanklan Admin CMS</title><style>*{box-sizing:border-box}body{margin:0;background:#f8f6ed;color:#090909;font-family:Arial,sans-serif;padding:24px;background-image:radial-gradient(#111 1px,transparent 1px);background-size:24px 24px}.wrap{width:min(1100px,100%);margin:auto}.top{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:18px}.brand{font-size:28px;font-weight:1000}.actions{display:flex;gap:8px;flex-wrap:wrap}.pill,.save{display:inline-block;padding:10px 14px;border:3px solid #090909;border-radius:12px;font-weight:1000;text-decoration:none;cursor:pointer}.pill{background:#090909;color:#fff}.save{background:#ffe000;box-shadow:4px 4px 0 #090909}.intro{background:#fff;border:4px solid #090909;border-radius:18px;padding:16px 18px;box-shadow:6px 6px 0 #090909;margin-bottom:20px}.intro b{font-size:18px}.intro p{margin:5px 0 0;color:#555}.alert{border:3px solid #090909;border-radius:14px;padding:12px 14px;margin-bottom:16px;font-weight:800}.success{background:#d8ffe5}.error{background:#ffe3ea;border-color:#ff275d}.section{background:#fff;border:4px solid #090909;border-radius:20px;box-shadow:7px 7px 0 #090909;padding:20px;margin-bottom:20px}.section h2{margin:0 0 14px;font-size:21px}.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.field label{display:block;font-size:11px;font-weight:900;text-transform:uppercase;margin:0 0 6px}.field input,.field textarea{width:100%;padding:11px 12px;border:2px solid #090909;border-radius:10px;font:inherit;outline:none;background:#fff}.field textarea{min-height:110px;font-family:monospace;font-size:12px;line-height:1.45}.field input:focus,.field textarea:focus{box-shadow:3px 3px 0 #00d9ff}.full{grid-column:1/-1}.help{font-size:11px;color:#666;margin-top:6px}.sticky{position:sticky;bottom:12px;display:flex;justify-content:flex-end;z-index:10}@media(max-width:700px){body{padding:14px}.grid{grid-template-columns:1fr}.full{grid-column:auto}.brand{font-size:22px}.top{align-items:flex-start}.section{padding:15px}}</style></head><body><div class="wrap"><div class="top"><div class="brand">⚡ BEBANKLAN ADMIN CMS</div><div class="actions"><a class="pill" href="/" target="_blank">BUKA BIO</a><a class="pill" href="/admin/logout">LOGOUT</a></div></div><div class="intro"><b>Edit website tanpa menyentuh kode.</b><p>Profil, statistik, link, produk, dan leaderboard dikelola dari sini. Saat disimpan, perubahan masuk ke GitHub dan memicu deployment Vercel.</p></div>'.$errorHtml.$successHtml.'<form method="post" onsubmit="return validateBeforeSave()"><input type="hidden" name="action" value="save_config"><section class="section"><h2>👤 Profil TikTok</h2><div class="grid"><div class="field"><label>Creator Name</label><input name="creatorName" value="'.h($config['config']['creatorName']??'').'"></div><div class="field"><label>Display Name</label><input name="tiktokDisplayName" value="'.h($t['displayName']??'').'"></div><div class="field"><label>Username</label><input name="tiktokUsername" value="'.h($t['username']??'').'"></div><div class="field"><label>Profile URL</label><input name="tiktokProfileUrl" value="'.h($t['profileUrl']??'').'"></div><div class="field full"><label>Avatar URL</label><input name="avatarUrl" value="'.h($t['avatarUrl']??'').'"><div class="help">Gunakan URL gambar langsung atau path seperti /image_a0840b.png.</div></div><div class="field full"><label>Bio</label><textarea name="bio">'.h($t['bio']??'').'</textarea></div><div class="field"><label>Following</label><input name="following" value="'.h($s['following']??'').'"></div><div class="field"><label>Followers</label><input name="followers" value="'.h($s['followers']??'').'"></div><div class="field"><label>Likes</label><input name="likes" value="'.h($s['likes']??'').'"></div></div></section><section class="section"><h2>🔗 Link & CTA</h2><div class="grid"><div class="field"><label>Saweria</label><input name="donateSaweria" value="'.h($u['donateSaweria']??'').'"></div><div class="field"><label>Trakteer</label><input name="donateTrakteer" value="'.h($u['donateTrakteer']??'').'"></div><div class="field"><label>Ko-fi</label><input name="donateKofi" value="'.h($u['donateKofi']??'').'"></div><div class="field"><label>AI Klipper Affiliate</label><input name="aiKlipperAffiliate" value="'.h($u['aiKlipperAffiliate']??'').'"></div><div class="field"><label>WhatsApp Number</label><input name="whatsappNumber" value="'.h($u['whatsappNumber']??'').'"></div><div class="field"><label>Discord Invite</label><input name="discordInvite" value="'.h($u['discordInvite']??'').'"></div><div class="field"><label>YouTube</label><input name="youtube" value="'.h($socials['youtube']??'').'"></div><div class="field"><label>TikTok</label><input name="socialTiktok" value="'.h($socials['tiktok']??'').'"></div><div class="field"><label>Instagram</label><input name="instagram" value="'.h($socials['instagram']??'').'"></div><div class="field"><label>Discord</label><input name="socialDiscord" value="'.h($socials['discord']??'').'"></div><div class="field"><label>GitHub</label><input name="github" value="'.h($socials['github']??'').'"></div></div></section><section class="section"><h2>⚔️ COC Item Shop</h2><div class="field full"><label>Products JSON</label><textarea id="products" name="products_json" style="min-height:280px">'.h($productsJson).'</textarea><div class="help">Edit item, harga, rarity, status, featured, dan iconType. JSON harus valid.</div></div></section><section class="section"><h2>🏆 Top Donatur</h2><div class="grid"><div class="field"><label>Monthly JSON</label><textarea id="monthly" name="monthly_json" style="min-height:320px">'.h($monthlyJson).'</textarea></div><div class="field"><label>All Time JSON</label><textarea id="alltime" name="alltime_json" style="min-height:320px">'.h($alltimeJson).'</textarea></div></div><div class="help">Struktur donatur: rank, name, amount, coffee, tier, note, avatarBg, badgeBg.</div></section><div class="sticky"><button class="save" type="submit">💾 SIMPAN SEMUA PERUBAHAN</button></div></form></div><script>function validateJson(id,label){try{JSON.parse(document.getElementById(id).value);return true}catch(e){alert(label+" JSON tidak valid. Perbaiki dulu.");return false}}function validateBeforeSave(){return validateJson("products","Products")&&validateJson("monthly","Monthly Donatur")&&validateJson("alltime","All Time Donatur")}</script></body></html>';
    exit;
}

/* --------------------------------------------------------------------------
 | Public bio page
 |-------------------------------------------------------------------------- */

$htmlFile = __DIR__ . '/../resources/views/home.blade.php';
if (!is_file($htmlFile) || !is_readable($htmlFile)) { http_response_code(500); header('Content-Type:text/plain;charset=utf-8'); echo 'Bio page source file is missing.'; exit; }
$html = file_get_contents($htmlFile);
if ($html === false) { http_response_code(500); header('Content-Type:text/plain;charset=utf-8'); echo 'Unable to read bio page source.'; exit; }

$config = loadConfig();
if ($config) {
    $configJson = json_encode($config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($configJson !== false) {
        $replacement = "const APP_DATA = " . $configJson . ";\n\n    let selectedProduct";
        $html = preg_replace('/const APP_DATA = .*?;\s*let selectedProduct/s', $replacement, $html, 1);
    }
}

$html = str_replace('https://ibb.co.com/XfNvBssL', '/image_a0840b.png?v=5', $html);
$html = str_replace('object-cover object-center', 'object-contain object-center', $html);
$html = str_replace('onerror="handleAvatarError(this)"', '', $html);
$html = str_replace('🏆 TOP DONATUR KLAN', 'TOP DONATUR KLAN', $html);
$html = str_replace('⚔️ COC ITEM SHOP', 'COC ITEM SHOP', $html);

header('Content-Type:text/html;charset=utf-8');
header('Cache-Control:no-store,no-cache,must-revalidate,max-age=0');
header('Pragma:no-cache');
echo $html;
