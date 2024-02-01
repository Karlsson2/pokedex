<?php

require __DIR__ . '/vendor/autoload.php';

use App\Http\Router;
use App\Http\Request;
use App\Exceptions\NotFoundException;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$database = require __DIR__ . "/bootstrap.php";

$router = new Router(["/" => __DIR__ . "/controllers/pokedex.php", "/pokemon" => __DIR__ . "/controllers/pokemon.php"]);

$currentUri = Request::uri();
$parsedUri = parse_url($currentUri, PHP_URL_PATH);
try {
    require($router->direct($parsedUri));
} catch (NotFoundException $excep) {
    require(view("404"));
}
