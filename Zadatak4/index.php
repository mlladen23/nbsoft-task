<?php

use Request\RequestFactory;

spl_autoload_register(function (string $class) {
    $path = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    if (!file_exists($path)) {
        return false;
    }

    require_once $path;
});

header('Access-Control-Allow-Origin: *');

/**
 * Handle incoming request and send response as plain text.
 */
echo RequestFactory::make($_GET['request'] ?? 'scan-directory')
    ->handle()
    ->send();
