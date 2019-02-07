<?php

namespace App\Core;

use App\Response\Response;

class Renderer
{
    public function render(Response $response)
    {
        http_response_code($response->getStatus());

        foreach ($response->getHeaders() as $k => $v)
            header("$k: $v");

        echo $response->getBody();
    }
}
