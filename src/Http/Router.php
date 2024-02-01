<?php

declare(strict_types=1);

namespace App\Http;

use App\Exceptions\NotFoundException;

class Router
{
    private array $routeArray;
    public function __construct(
        array $routeArray
    ) {
        $this->routeArray = $routeArray;
    }

    public function direct(String $uri): String
    {
        if (array_key_exists($uri, $this->routeArray)) {
            return $this->routeArray[$uri];
        } else {
            throw new NotFoundException("No Route Available");
        }
    }
}
