<?php
namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get(string $path, array $action, ?string $name = null): void
    {
        $this->add('GET', $path, $action, $name);
    }

    public function post(string $path, array $action, ?string $name = null): void
    {
        $this->add('POST', $path, $action, $name);
    }

    protected function add(string $method, string $path, array $action, ?string $name): void
    {
        $this->routes[] = [
            'method' => $method,
            'path'   => trim($path, '/'),
            'action' => $action,
            'name'   => $name
        ];
    }

    public function dispatch(): void
    {
        $uri    = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route['path']);

            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                array_shift($matches);

                [$controller, $action] = $route['action'];
                $class = 'App\\Controllers\\' . $controller;

                if (!class_exists($class)) {
                    throw new \Exception("Controller {$class} not found", 404);
                }

                $instance = new $class;

                if (!method_exists($instance, $action)) {
                    throw new \Exception("Method {$action} not found", 404);
                }

                call_user_func_array([$instance, $action], $matches);
                return;
            }
        }

        throw new \Exception('Route not found', 404);
    }
}