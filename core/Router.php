<?php

namespace Core;

class Router
{
    protected $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch($uri, $request, $response)
    {
        $path = rtrim(parse_url($uri, PHP_URL_PATH), '/') ?: '/';
        $method = $request->method;

        foreach ($this->routes as $route) {
            $pattern = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $route->uri);
            $pattern = "#^" . ($route->uri === '/' ? '/' : rtrim($pattern, '/')) . "$#";

            if (preg_match($pattern, $path, $matches) && $route->method === $method) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $handler = is_callable($route->handler)
                    ? fn() => call_user_func($route->handler, $request, $response, $params)
                    : fn() => $response->view($route->handler, ['params' => $params]);

                // Middleware wrapping
                if (!empty($route->middleware)) {
                    foreach (array_reverse($route->middleware) as $middleware) {
                        $middlewareClass = "App\\Middleware\\" . ucfirst($middleware) . "Middleware";
                        if (class_exists($middlewareClass)) {
                            $next = $handler;
                            $handler = fn() => $middlewareClass::handle($request, $response, $next);
                        }
                    }
                }

                return $handler();
            }
        }

        return $response->status(404)->json([
            'code' => '404',
            'error' => 'Not Found',
            'message' => 'The requested resource could not be found.',
        ]);
    }
}
