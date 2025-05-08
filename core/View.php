<?php


namespace Core;

use Core\Logger;

class View
{
    public static function render(string $view, array $data = [])
    {
        $view_base = dirname(__DIR__);
        $file = "{$view_base}/app/Views/pages/{$view}.php";

        if (!file_exists($file)) {
            http_response_code(500);
            Logger::error("View file not found: {$file}");
            echo "Internal Server Error!";
            return;
        }

        extract($data);

        $content = file_get_contents($file);

        // Handling @title('Page Title...')
        if (preg_match("/@title\(['\"](.+?)['\"]\)/", $content, $match)) {
            $title = $match[1];
            $content = str_replace($match[0], '', $content);
        }

        // Handling @include('partials/xyz or pages/abc')
        $content = preg_replace_callback('/@include\([\'"](.+)[\'"]\)/', function ($m) {
            $map = [
                'partials' => __DIR__ . '/../app/Views/partials/',
                'pages' => __DIR__ . '/../app/Views/pages/',
            ];

            $parts = explode('/', $m[1], 2);
            if (count($parts) !== 2 || !isset($map[$parts[0]])) {
                return "<!-- Invalid include: {$m[1]} -->";
            }

            $file = $map[$parts[0]] . $parts[1] . '.php';
            if (!file_exists($file)) {
                return "<!-- Missing file: {$m[1]} -->";
            }

            $included = file_get_contents($file);

            return $included;
        }, $content);

        // Handling @asset('files...')
        $content = preg_replace_callback('/@asset\([\'"](.+)[\'"]\)/', function ($matches) {
            return '/assets/' . ltrim($matches[1], '/');
        }, $content);


        try {
            eval("?>$content<?php ");
        } catch (\Throwable $e) {
            echo "Template error: " . $e->getMessage();
        }
    }
}
