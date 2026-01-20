<?php
use App\Controlleur\ProduitControlleur;
require_once __DIR__ . '/../vendor/autoload.php';
// 1. Affiche l'URI (le chemin tapé après le nom de domaine)
echo "URI demandée : " . $_SERVER['REQUEST_URI'] . "<br>";
[1, 3];

// 2. Affiche la méthode HTTP (GET pour la lecture, POST pour l'envoi de données)
echo "Méthode HTTP : " . $_SERVER['REQUEST_METHOD']; 
[1, 3];

$router = new router();
echo "<br>";
var_dump($router);
echo "<br>";
$router->get("/produits", [ProduitControlleur::class, 'index']);
echo "<br>";
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
echo "<br>";