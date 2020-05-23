<?php


namespace App\Controller;


use App\Response\HtmlResponse;

class Login implements IController
{

    private $name = null;
    private $password = null;
    private $isLoggedIn = false;

    public function process()
    {
        $this->isLoggedIn = $this->isLoggedIn || $this->checkUser();

        if ($this->isLoggedIn)
            return new HtmlResponse('dashboard.html.twig');
        else
            return new HtmlResponse('login.html.twig');
    }

    public function reset()
    {
        $this->isLoggedIn = false;
        $this->password = null;
        $this->name = null;
    }

    public function checkUser()
    {
        $postData = $_POST;

        //@TODO check with real data
        if (isset($postData['password']) && $postData['password'] === "pw" && isset($postData['username']) && $postData['username'] === "user" )
            return $this->isLoggedIn = true;
        return false;
    }

    public function logout()
    {
        $this->reset();
        // @TODO redirect logout
    }

    public function login()
    {
        
    }

}
