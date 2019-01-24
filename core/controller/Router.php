<?php

namespace Controller;

use http\Exception\BadUrlException;

class Router
{
    private $request;
    private $routes;
    private $supportedHttpMethods = [
        "GET",
        "POST"
    ];

    function __construct(IRequest $request)
    {
        $this->request = $request;
    }

   /* function __call($name, $args)
    {
        list($route, $method) = $args;
        if(!in_array(strtoupper($name), $this->supportedHttpMethods))
        {
            $this->invalidMethodHandler();
        }
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }*/

    public function add($route, $class, $allowedMethods = ['GET'])
    {
        $this->routes[$route] = [
            'route' => $route,
            'allowedMethods' => $allowedMethods,
            'class' => $class
        ];
    }

    public function route($name, $httpMethods, $class)
    {

    }
    /**
     * Removes trailing forward slashes from the right of the route.
     * @param route (string)
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }
        return $result;
    }
    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }
    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }
    /**
     * Resolves a route
     */
    public function run()
    {
        $request = $_SERVER['REQUEST_URI'];

        $request = str_replace('jsonMashup/public/', '', $request);
        if (array_key_exists($request, $this->routes))
            $class = $this->routes[$request]['class'];

        $ref = new \ReflectionClass($class);
        if (! $ref->implementsInterface(IProcess::class))
            throw new BadUrlException();

        $instance = new $class();
        return $instance->process();



       /* $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formatedRoute];
        if(is_null($method))
        {
            $this->defaultRequestHandler();
            return;
        }
        echo call_user_func_array($method, array($this->request));*/
    }
}