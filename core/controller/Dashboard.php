<?php

namespace Controller;

class Dashboard
implements IProcess
{
    public function process()
    {
        $api = new ApiInterface();

        $result = $api::getPokemon($api::ALL_POKEMON);

        header('Content-type: application/json');
        return $result;
    }
}