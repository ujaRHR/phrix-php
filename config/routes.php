<?php

use Core\RouteCollection;

$route = new RouteCollection();

// Define Routes Here...
$route->get('/', 'welcome');

$route->get('/about', function ($request, $response, $params) {
    $response->json([
        'name' =>  'ujarhr/phrix-php',
        'description' => 'A simple, no-bloat PHP micro-framework built for small-to-medium web applications.',
        'author' => 'Reajul Hasan Raju',
        'repo' => 'https://github.com/ujarhr/phrix-php',
        'docs' => 'https://docs.rhraju.com/phrix-php',
        'license' => 'MIT',
    ], 200);
});

return $route->all();