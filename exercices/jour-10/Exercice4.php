<?php
require_once("/var/www/boutique/public/class/Autoloader.php");
Autoloader::register();
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
$testCat = new CategoryRepository($pdo);
echo "<pre>";
var_dump($testCat->findWithProducts(1));
echo "</pre>";