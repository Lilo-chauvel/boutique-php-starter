<?php

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Router;

require_once __DIR__.'/../vendor/autoload.php';

// Création de mon routeur
$router = new Router;

// --------------------------
// Exo 1
// // 1. Affiche l'URI (le chemin tapé après le nom de domaine)
// echo "URI demandée : " . $_SERVER['REQUEST_URI'] . "<br>";

// // 2. Affiche la méthode HTTP (GET pour la lecture, POST pour l'envoi de données)
// echo "Méthode HTTP : " . $_SERVER['REQUEST_METHOD'];

// Ex2
$router->get('/bonjour', [HomeController::class, 'bonjour']);

// Ex3
// Configure your routes here
$router->get('/', [HomeController::class, 'index']);

// Ex4
$router->get('/produits', [ProductController::class, 'index']);
// $router->get("/produit", [ProductController::class, 'show']);

// Ex5
// $router->get('/produit/{id}', [ProductController::class, 'show']);

// Ex6
$router->get('/panier', [CartController::class, 'index']);
$router->post('/panier/ajouter', [CartController::class, 'add']);
$router->post('/panier/supprimer', [CartController::class, 'remove']);
$router->post('/panier/modifier', [CartController::class, 'update']);

return $router;
