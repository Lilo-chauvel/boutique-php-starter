<?php

require_once '/var/www/boutique/app/class/autoloader.php';
autoloader::register();
$Tshirt = new category(1, 'category');
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8mb4',
        'dev',
        'dev',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}
$testproduct = new productRepository($pdo);
$addproduct = new product(14, 'Chaussettes', 12.5, 10, 'Accessoires');
echo '<pre>';
print_r($testproduct->findBycategory(1));
echo '</pre>';
echo '<pre>';
print_r($testproduct->findByPriceRange(50, 100));
echo '</pre>';
echo '<pre>';
print_r($testproduct->findInStock());
echo '</pre>';
