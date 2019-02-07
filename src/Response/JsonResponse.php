<?php

namespace App\Response;

class JsonResponse
    extends Response
{
    public function __construct($data, $status = 200)
    {
        $this->setStatus($status);
        $this->setHeaders(['Content-Type' => 'application/json']);

        $data = json_encode($data);
        $this->setBody($data);
    }
}
