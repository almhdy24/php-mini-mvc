<?php
namespace App\Core;

class App
{
    public function run(): void
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        try {
            $router = new Router;

            $routes = require dirname(__DIR__, 2) . '/routes/web.php';
            $routes($router);

            $router->dispatch();
        } catch (\Throwable $e) {
            http_response_code($e->getCode() ?: 500);
            echo "<h1>Error</h1>";
            echo "<pre>{$e->getMessage()}</pre>";
        }
    }
}
