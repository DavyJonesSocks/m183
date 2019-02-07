<?php

namespace App\Response;

use Twig_Environment;
use Twig_Loader_Filesystem;

class HtmlResponse
    extends Response
{
    public function __construct($template, $data = [], $status = 200)
    {
        $loader = new Twig_Loader_Filesystem(BASEDIR . '/template');
        $twig = new Twig_Environment($loader, [
            'cache' => BASEDIR . '/var/cache/template',
            'auto_reload' => true,
        ]);

        $this->setStatus($status);
        $this->setBody($twig->render($template, $data));
    }
}
