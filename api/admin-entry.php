<?php
// Compatibility entrypoint for the Vercel PHP runtime.
// PHP 8.5 deprecates $http_response_header; the existing CMS still uses it
// inside api/admin.php. Suppress that deprecation so it cannot corrupt HTTP
// headers before the CMS sends its response.
set_error_handler(function ($severity) {
    return $severity === E_DEPRECATED || $severity === E_USER_DEPRECATED;
});
require __DIR__.'/admin.php';
restore_error_handler();
