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
$testproduct = new productRepository(10, 'T-shirt', 50, 4, 'Vêtements', $pdo);
$addproduct = new product(14, 'Chaussettes', 12.5, 10, 'Accessoires');
// $testproduct->saveproduct($addproduct);
// var_dump($testproduct->findAll());
// echo "<br>";
// echo "<br>";
// $testproduct->updateproduct(14,["description" => "Belles chaussettes"]);
// var_dump($testproduct->findAll());
// echo "<br>";
// echo "<br>";
// $testproduct->deleteproduct(14);
// var_dump($testproduct->findAll());
// echo "<br>";
