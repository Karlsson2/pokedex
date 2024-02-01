<?php
require __DIR__ . '/vendor/autoload.php';
$config = require __DIR__ . '/config.php';

use App\Database\Connection;
use App\Database\QueryBuilder;



$database = new QueryBuilder(
    Connection::make($_ENV["DATABASE_DRIVER"], $_ENV["DATABASE_HOST"], $_ENV["DATABASE_NAME"], $_ENV["DATABASE_USER"], $_ENV["DATABASE_PASSWORD"])
);

return $database;
