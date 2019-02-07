<?php

namespace App\Core;

use App\Controller\Dashboard;
use App\Exception\HttpException;
use App\Response\HtmlResponse;
use App\Router\Router;
use Exception;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class App
{
    public function run()
    {
        try {
            $router = new Router;
            $renderer = new Renderer;
            $whoops = new Run;

            $whoops->pushHandler(new PrettyPageHandler);
            $whoops->register();

            $router->add('/dashboard', Dashboard::class);

            $url = $_SERVER['REQUEST_URI'];
            $controller = $router->resolve($url);
            $response = $controller->process(); // TODO: Implement Request Class and pass here
            $renderer->render($response);
        } catch (Exception $e) {
            $code = $e instanceof HttpException ? $e->getCode() : 500;
            $response = new HtmlResponse('error/error.html.twig', ['title' => $e->getMessage()], $code);

            (new Renderer)->render($response);
        }
    }
}
