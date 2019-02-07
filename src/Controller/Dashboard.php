<?php

namespace App\Controller;

use App\Pokemon\ApiInterface;
use App\Response\Response;
use App\Response\HtmlResponse;
use App\Response\JsonResponse;

class Dashboard
    extends Controller
{
    public function process() : Response
    {
        $result = ApiInterface::getPokemon(ApiInterface::ALL_POKEMON);

        if (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
            return new JsonResponse($result);

        return new HtmlResponse('dashboard.html.twig');
    }
}
