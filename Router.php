<?php

declare(strict_types=1);

class Router
{

    private array $routes = [];
    private array $middlewares = [];

    public function add(string $path, Closure $handler, array $middlewares = []): void
    {
        $this->routes[$path] = [
            'handler' => $handler,
            'middlewares' => $middlewares,
        ];
    }

    public function middleware(string $name, Closure $middleware): void
    {
        $this->middlewares[$name] = $middleware;
    }

    public function dispatch(string $path): void
    {
        foreach ($this->routes as $route => $routeData) {

            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route);

            if (preg_match("#^$pattern$#", $path, $matches)) {

                array_shift($matches);

                foreach ($routeData['middlewares'] as $middlewareName) {
                    if (!isset($this->middlewares[$middlewareName])) {
                        throw new Exception("Middleware '$middlewareName' no encontrado.");
                    }

                    if (!$this->middlewares[$middlewareName]()) {
                        // fallo del middleware --> SALIDA
                        // header("Location: /login");
                        include "utilidades/401.php";
                        exit;
                    }
                }

                call_user_func_array($routeData['handler'], $matches);

                return;
            }
        }

        // Se responde correctamente con código de error 404
        http_response_code(404);
        include "utilidades/404.php";
    }
}