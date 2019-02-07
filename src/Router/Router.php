<?php

namespace App\Router;

use App\Exception\NotFoundException;
use App\Controller\IController;
use ReflectionClass;
use RuntimeException;

class Router
{
    private $routes;

    public function add($route, $class, $allowedMethods = ['GET'])
    {
        $this->routes[$route] = [
            'route' => $route,
            'allowedMethods' => $allowedMethods,
            'class' => $class
        ];
    }

    public function resolve($url)
    {
        if (!array_key_exists($url, $this->routes))
            throw new NotFoundException("404 - Not found");

        $class = $this->routes[$url]['class'];
        $ref = new ReflectionClass($class);

        if (! $ref->implementsInterface(IController::class))
            throw new RuntimeException('Controller class must implement IController');

        $result = new $class();

        return $result;
    }
}
