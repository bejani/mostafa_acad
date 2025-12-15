<?php

namespace App\Core;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    private string $rawRoute;

    public function __construct(string $rawRoute)
    {
        // مسیر نهایی (ممکن است شامل query string باشد) که index.php آن را ارسال کرده
        $this->rawRoute = $rawRoute;
    }

    public function get(string $path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        // مسیر فقط باید PATH باشد، بدون Query String
        $uri = parse_url($this->rawRoute, PHP_URL_PATH);

        // اگر query string وجود دارد، آن را به صورت پارامترها استخراج و در $_GET قرار می‌دهیم
        $query = parse_url($this->rawRoute, PHP_URL_QUERY);
        if ($query) {
            parse_str($query, $params);
            // فقط مقادیر جدید را اضافه کن، مقادیر قبلی $_GET را بازنویسی نکن
            foreach ($params as $k => $v) {
                if (!array_key_exists($k, $_GET)) {
                    $_GET[$k] = $v;
                }
            }
        }

        // اگر مسیر پیدا نشد
        if (!array_key_exists($uri, $this->routes[$method])) {
            http_response_code(404);
            echo "404: route not found → $uri";
            return;
        }

        $handler = $this->routes[$method][$uri];

        // Prepare parameters to pass to handler: take from $_GET only
        $params = $_GET;

        // If handler is a class name string, instantiate it
        if (is_string($handler) && class_exists($handler)) {
            $handler = new $handler;
        }

        // If handler is an object with __invoke, call it; if it's a callable function/closure, call it.
        if (is_object($handler) && method_exists($handler, '__invoke')) {
            $ref = new \ReflectionMethod($handler, '__invoke');
            if ($ref->getNumberOfParameters() > 0) {
                return $handler($params);
            }
            return $handler();
        }

        if (is_callable($handler)) {
            $ref = new \ReflectionFunction(\Closure::fromCallable($handler));
            if ($ref->getNumberOfParameters() > 0) {
                return $handler($params);
            }
            return $handler();
        }

        // Fallback: try to call as callable without params
        if (is_callable($handler)) {
            return $handler();
        }

        // Not callable
        http_response_code(500);
        echo "500: route handler not callable for → $uri";
        return;
    }
}
