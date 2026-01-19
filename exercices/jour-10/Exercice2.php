<?php
require_once("/var/www/boutique/public/class/Autoloader.php");
Autoloader::register();
$Tshirt = new Category(1, "Category");
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
$testProduct = new ProductRepository(10, "T-shirt", 50, 4,"Vêtements",$pdo);
$addProduct = new Product(14,"Chaussettes",12.5,10,"Accessoires");
// $testProduct->saveProduct($addProduct);
// var_dump($testProduct->findAll());
// echo "<br>";
// echo "<br>";
// $testProduct->updateProduct(14,["description" => "Belles chaussettes"]);
// var_dump($testProduct->findAll());
// echo "<br>";
// echo "<br>";
// $testProduct->deleteProduct(14);
// var_dump($testProduct->findAll());
// echo "<br>";