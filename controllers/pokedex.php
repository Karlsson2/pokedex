<?php

declare(strict_types=1);

use App\Pokemon;

$unprocessedPokemons = $database->select()->from('pokemon')->get();
$pokemons = array_map(function ($pokemon) {
    return new Pokemon($pokemon->id, $pokemon->name);
}, $unprocessedPokemons);
$number = count($pokemons);
require view("pokedex");
