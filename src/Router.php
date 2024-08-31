<?php

namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        $cleanedUri = str_replace('//', '/', $uri);

        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($cleanedUri, $this->routes[$method])) {
            $controller = $this->routes[$method][$cleanedUri]['controller'];
            $action = $this->routes[$method][$cleanedUri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new \Exception("No route found for URI: $cleanedUri");
        }
    }
}
