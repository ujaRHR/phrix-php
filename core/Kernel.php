<?php

namespace Core;

class Kernel
{
    public function run(Request $request, Response $response)
    {
        $routes = require_once __DIR__ . '/../config/routes.php';
        $router = new Router($routes);
        $router->dispatch($request->uri, $request, $response);
    }
}
