<?php

namespace Core;

use Core\View;

class Response
{
    public function header($key, $value)
    {
        header("$key: $value");
        return $this;
    }

    public function status($code)
    {
        http_response_code($code);
        return $this;
    }

    public function json($data, int $status = 200, array $headers = [])
    {
        http_response_code($status);

        header('Content-Type: application/json');

        foreach ($headers as $key => $value) {
            header("{$key}: {$value}");
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        return $this;
    }

    public function view($page, $data = [])
    {
        extract($data);
        View::render($page, $data);
        return $this;
    }

    public function text($content)
    {
        header('Content-Type: text/plain');
        echo $content;
        return $this;
    }
    
    public function redirect($url, $code = 302)
    {
        http_response_code($code);
        header("Location: $url");
        exit;
    }
}
