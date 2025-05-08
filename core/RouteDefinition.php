<?php

namespace Core;

class RouteDefinition
{
    public $method;
    public $uri;
    public $page;
    public $middleware = [];
    public $handler;

    public function __construct($method, $uri, $handler)
    {
        $this->method = strtoupper($method);
        $this->uri = rtrim($uri, '/') ?: '/';
        $this->handler = $handler;
    }

    public function middleware(...$middleware)
    {
        $this->middleware = array_merge($this->middleware, $middleware);
        return $this;
    }
}
