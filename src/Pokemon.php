<?php

declare(strict_types=1);

namespace App;

class Pokemon
{
    public array $abilities;
    public array $types;
    public function __construct(
        public int $id,
        public string $name,

    ) {
        // $jsonData = file_get_contents("https://pokeapi.co/api/v2/pokemon/" . strtolower($this->name));
        // $pokemonInfo = json_decode($jsonData);

        // foreach ($pokemonInfo->types as $type) {
        //     $this->types[] = $type->type->name;
        // }
        // foreach ($pokemonInfo->abilities as $ability) {
        //     $this->abilities[] = $ability->ability->name;
        // }
    }
    public function getImageUrl()
    {
        if ($this->name == "Nidoran♀") {
            return "https://img.pokemondb.net/sprites/bank/normal/nidoran-f.png";
        } else if ($this->name == "Nidoran♂") {
            return "https://img.pokemondb.net/sprites/bank/normal/nidoran-m.png";
        } else if ($this->name == "Farfetch’d") {
            return "https://img.pokemondb.net/sprites/bank/normal/farfetchd.png";
        } else if ($this->name == "Mr. Mime") {
            return "https://img.pokemondb.net/sprites/bank/normal/mr-mime.png";
        }
        return "https://img.pokemondb.net/sprites/bank/normal/" . strtolower($this->name) . ".png";
    }
}
