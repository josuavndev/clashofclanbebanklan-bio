<?php

return [
    'driver' => env('SESSION_DRIVER', 'array'),
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/tmp/laravel/sessions',
    'connection' => null,
    'table' => 'sessions',
    'store' => null,
    'lottery' => [2, 100],
    'cookie' => 'bebanklan_session',
    'path' => '/',
    'domain' => null,
    'secure' => true,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
];
