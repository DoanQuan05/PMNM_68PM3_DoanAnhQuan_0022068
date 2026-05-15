<?php
// Router cho PHP built-in server: php -S localhost:8000 -t public router.php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files trực tiếp
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Chuyển URL thành query string như .htaccess làm
if ($uri !== '/') {
    $_GET['url'] = ltrim($uri, '/');
}

require_once __DIR__ . '/index.php';
