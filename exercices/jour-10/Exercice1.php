<?php
require_once("/var/www/boutique/app/class/autoloader.php");
autoloader::register();

$Tshirt = new category(1, "category");
$testproduct = new product(10, "T-shirt", 50, 4, "Vêtements");
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}

$productRepo = new productRepository($pdo);
echo "<br>";
echo "<pre>";
print_r($productRepo->find(7));
echo "</pre>";
echo "<br>";
echo "<pre>";
print_r($productRepo->findAll());
echo "</pre>";
echo "<br>";