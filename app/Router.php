<?php

namespace App;

class Router
{
    private array $routes = [];

    /**
     * Register a GET route
     *
     * @param  array  $action  [controllerClass, methodName]
     */
    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    /**
     * Register a POST route
     *
     * @param  array  $action  [controllerClass, methodName]
     */
    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    /**
     * Dispatch the request to the correct controller
     */
    public function dispatch(string $uri, string $method): void
    {
        // Parse URL to get the path without query parameters
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            [$controllerClass, $methodName] = $this->routes[$method][$path];
            $controllerInstance = new $controllerClass;
            $controllerInstance->$methodName();
        } else {
            http_response_code(404);
            echo 'Page non trouvée';
        }
    }
}
