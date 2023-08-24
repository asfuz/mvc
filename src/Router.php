<?php

namespace Asfuz\Mvc;

class Router
{
    protected array $routes = [];

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            echo "Not found";
            exit;
        }

        if(is_string($callback))
        {
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    public function renderView($view): void
    {
        include_once __DIR__ . "/views/$view.php";
    }

}