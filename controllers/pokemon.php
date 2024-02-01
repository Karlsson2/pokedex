<?php

declare(strict_types=1);

use App\Pokemon;

$url = $_SERVER["REQUEST_URI"];
$parsedUri = parse_url($url, PHP_URL_QUERY);
$splitString = explode("=", $parsedUri);
$id = $splitString[1];
$selectedPokemon = $database->select()->from('pokemon')->where("id", "=", $id)->get();


if (empty($selectedPokemon)) {
    require view("404");
} else {
    $pokemon = new Pokemon($selectedPokemon[0]->id, $selectedPokemon[0]->name);
    require view("pokemon");
}
