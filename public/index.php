<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/Db/Database.php';

// Récupérer l'URL demandée
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Charger les routes et dispatcher
$router = require __DIR__.'/../config/routes.php';
$router->dispatch($uri, $method);

echo calculateDiscount(10.5, 10);
