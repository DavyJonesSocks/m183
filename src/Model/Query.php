<?php

namespace App\Model;

use PDO;

class Query
{
    private $dbh = null;

    public function initiate()
    {
        if ($this->dbh === null)
            $this->connect();
    }

    public function get()
    {
        $this->initiate();

        $sql = "SELECT * FROM guest";
        $result = $this->dbh->query($sql);
        return $result;
    }

    private function connect()
    {
        $this->dbh = new PDO('mysql:host=127.0.0.1;dbname=guestbook', "root", 'fs');
    }
}
