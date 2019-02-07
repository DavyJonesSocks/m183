<?php

namespace App\Response;

class Response
{
    protected $headers = [];
    protected $body;
    protected $status;

    public function __construct()
    {
        //$this->headers = getallheaders();
        $this->status = 200;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
