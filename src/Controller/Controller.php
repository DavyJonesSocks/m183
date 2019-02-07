<?php

namespace App\Controller;

use App\Response\Response;

class Controller
	implements IController
{
    public function process() : Response
    {
        return new Response;
    }
}
