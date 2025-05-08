<?php

/*
  PhriX, A Lightweight PHP Micro Framework
  (c) 2025 Reajul Hasan Raju — https://rhraju.com
  MIT Licensed
*/

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Kernel;
use Core\Request;
use Core\Response;

$app = new Kernel();
$request = new Request();

try {
    $app->run(new Request(), new Response());
} catch (Throwable $e) {
    http_response_code(500);
    echo "<pre>Uncaught Exception: {$e->getMessage()}\n" . $e->getTraceAsString() . "</pre>";
}
