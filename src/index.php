<?php

require '../vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable('config');
$dotenv->load();

require 'config/database.php';

$router = new AltoRouter();
$router->map( 'GET', '/src/', 'home.php');
$match = $router->match();
dump($match);
