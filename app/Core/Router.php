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
        // Save the raw route (may include query string) passed from index.php
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

        // Extract path (without query) and ensure it starts with '/'
        $uri = parse_url($this->rawRoute, PHP_URL_PATH) ?? '';
        if ($uri === '' || $uri[0] !== '/') {
            $uri = '/' . ltrim($uri, '/');
        }

        // Parse query string and merge into $_GET without overwriting existing keys
        $query = parse_url($this->rawRoute, PHP_URL_QUERY);
        if ($query) {
            parse_str($query, $params);
            foreach ($params as $k => $v) {
                if (!array_key_exists($k, $_GET)) {
                    $_GET[$k] = $v;
                }
            }
        }

        if (!array_key_exists($uri, $this->routes[$method])) {
            http_response_code(404);
            echo "404: route not found for $uri";
            return;
        }

        $handler = $this->routes[$method][$uri];
        $params = $_GET;

        // If handler is a class name string, instantiate it
        if (is_string($handler) && class_exists($handler)) {
            $handler = new $handler;
        }

        // If handler is an object with __invoke, call it
        if (is_object($handler) && method_exists($handler, '__invoke')) {
            $ref = new \ReflectionMethod($handler, '__invoke');
            if ($ref->getNumberOfParameters() > 0) {
                return $handler($params);
            }
            return $handler();
        }

        // If handler is a callable function/closure
        if (is_callable($handler)) {
            $ref = new \ReflectionFunction(\Closure::fromCallable($handler));
            if ($ref->getNumberOfParameters() > 0) {
                return $handler($params);
            }
            return $handler();
        }

        // Not callable
        http_response_code(500);
        echo "500: route handler not callable for $uri";
        return;
    }
}
