<?php

namespace Controller;

class ApiInterface
{
    const ALL_POKEMON = "https://pokeapi.co/api/v2/pokemon/";

    public static function getPokemon($url)
    {
        $data = file_get_contents($url);
        $data = json_decode($data);

        $result = [];
        foreach ($data->results as $entry) {
            $pokemon = file_get_contents($entry->url);
            $pokemon = json_decode($pokemon);

            $result[$entry->name] = $pokemon;
        }

        return json_encode($result);
    }
}