<?php

namespace Core;

class RouteCollection
{
    protected $routes = [];

    public function get($uri, $page)
    {
        $route = new RouteDefinition('GET', $uri, $page);
        $this->routes[] = $route;
        return $route;
    }

    public function post($uri, $page)
    {
        $route = new RouteDefinition('POST', $uri, $page);
        $this->routes[] = $route;
        return $route;
    }

    public function all()
    {
        return $this->routes;
    }
}
