<?php

namespace Core;

class Request
{
    public $get;
    public $post;
    public $server;
    public $method;
    public $uri;
    public $body;
    public $cookies;
    public $headers;

    public function __construct()
    {
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->server  = $_SERVER;
        $this->method  = $_SERVER['REQUEST_METHOD'];
        $this->uri     = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->body    = file_get_contents('php://input');
        $this->cookies = $_COOKIE;
        $this->headers = function_exists('getallheaders') ? getallheaders() : [];
    }

    public function input($key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function is($method)
    {
        return strtoupper($this->method) === strtoupper($method);
    }
}
