<?php

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Router;
require_once __DIR__ . '/../vendor/autoload.php';

// Création de mon routeur
$router = new Router();

//--------------------------
// Exo 1
// // 1. Affiche l'URI (le chemin tapé après le nom de domaine)
// echo "URI demandée : " . $_SERVER['REQUEST_URI'] . "<br>";
// [1, 3];

// // 2. Affiche la méthode HTTP (GET pour la lecture, POST pour l'envoi de données)
// echo "Méthode HTTP : " . $_SERVER['REQUEST_METHOD'];
// [1, 3];

//--------------------------
// Exo 2
// echo "<br>";
// var_dump($router);
// echo "<br>";
// $router->get("/produits", [ProductController::class, 'index']);
// echo "<br>";
// $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
// echo "<br>";

//--------------------------
// Exo 3
$router->get("/", [HomeController::class, 'show']);

$router->get("/produits", [HomeController::class, 'index']);