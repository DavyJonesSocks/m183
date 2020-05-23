<?php

namespace App\Controller;

use App\Model\Query;
use App\Pokemon\ApiInterface;
use App\Response\Response;
use App\Response\HtmlResponse;
use App\Response\JsonResponse;

class Dashboard
    extends Controller
{
    public function process() : Response
    {
        $dbh = new Query();

        $result = $dbh->get();

        if (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
            return new JsonResponse($result);

        return new HtmlResponse('dashboard.html.twig');
    }
}
