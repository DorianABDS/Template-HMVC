<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function get($uri, $callback)
    {
        $this->routes['GET'][$uri] = $callback;
    }

    public function post($uri, $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function put($uri, $callback)
    {
        $this->routes['PUT'][$uri] = $callback;
    }

    public function delete($uri, $callback)
    {
        $this->routes['DELETE'][$uri] = $callback;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Nettoyer l'URI
        $uri = rtrim($uri, '/');
        if ($uri === '') {
            $uri = '/';
        }

        $callback = $this->routes[$method][$uri] ?? null;

        if (!$callback) {
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(['error' => '404 Not Found']);
            return;
        }

        if (is_callable($callback)) {
            return call_user_func($callback);
        }

        if (is_string($callback)) {
            [$controller, $method] = explode('@', $callback);
            $controllerPath = __DIR__ . "/../Modules/Home/Controllers/{$controller}.php";

            if (file_exists($controllerPath)) {
                require_once $controllerPath;
                $controllerNamespace = "\\App\\Modules\\Home\\Controllers\\$controller";

                if (class_exists($controllerNamespace)) {
                $instance = new $controllerNamespace();
                    if (method_exists($instance, $method)) {
                        return call_user_func([$instance, $method]);
                    }
                }
            }

            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Controller or method not found']);
        }
    }
}
