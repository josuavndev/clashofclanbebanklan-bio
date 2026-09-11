<?php

// Vercel serverless entrypoint.
// Hand the request to Laravel's normal public front controller.
require __DIR__.'/../public/index.php';
