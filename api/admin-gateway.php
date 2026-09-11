<?php

// Login gateway for the existing admin CMS in api/index.php.
// POST /admin authenticates with Vercel Environment Variables, then redirects
// back to /admin. GET requests are handed to the existing CMS unchanged.

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'POST') {
    $username = getenv('ADMIN_USERNAME') ?: 'admin';
    $password = getenv('ADMIN_PASSWORD') ?: '';

    $postedUsername = (string)($_POST['username'] ?? '');
    $postedPassword = (string)($_POST['password'] ?? '');

    if ($password === '' || !hash_equals($username, $postedUsername) || !hash_equals($password, $postedPassword)) {
        header('Location: /admin?error=1', true, 303);
        exit;
    }

    $secret = hash('sha256', $password . '|' . $username);
    $payload = $username . '|admin';
    $token = base64_encode($payload . '|' . hash_hmac('sha256', $payload, $secret));

    setcookie('bebanklan_admin', $token, [
        'expires' => time() + 86400,
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    header('Location: /admin', true, 303);
    exit;
}

// Keep the existing CMS UI and save logic in one place.
require __DIR__ . '/index.php';
