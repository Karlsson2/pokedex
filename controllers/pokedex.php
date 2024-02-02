<?php

declare(strict_types=1);

use App\Pokemon;

$unprocessedPokemons = $database->select()->from('pokemon')->get();

$pokemons = array_map(function ($pokemon) use ($database) {
    $pokemon = new Pokemon($pokemon->id, $pokemon->name);
    $types = $database->select([
        'PokemonName' => 'Pokemon.name',
        'TypeName' => 'PokemonTypes.TypeName'
    ])->from('pokemon')->innerJoin('PokemonTypeJoin', "ON", 'Pokemon.id = PokemonTypeJoin.PokemonID')
        ->innerJoin('PokemonTypes', "ON", 'PokemonTypeJoin.TypeID = PokemonTypes.Typeid')
        ->where("id", "=", "$pokemon->id")->get();
    foreach ($types as $type) {
        $pokemon->types[] = $type->TypeName;
    }

    // SELECT PokemonTypes.TypeName AS TypeName
    //  FROM Pokemon 
    //  INNER JOIN PokemonTypeJoin ON Pokemon.id = PokemonTypeJoin.PokemonID 
    //  INNER JOIN PokemonTypes ON PokemonTypeJoin.TypeID = PokemonTypes.Typeid 
    //  WHERE Pokemon.id = '123';
    return $pokemon;
}, $unprocessedPokemons);
$number = count($pokemons);
require view("pokedex");
