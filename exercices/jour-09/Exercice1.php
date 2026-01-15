<?php

require_once "class.php";

// Création des catégories
$electronicCategory = new Category(1, 'Électronique');
$clothingCategory = new Category(2, 'Vêtements');
$foodCategory = new Category(3, 'Alimentation');

$catalogEx1 = [
    // Création des produits
    $product1 = new Product(1, 'Laptop', 799.99, $electronicCategory),
    $product2 = new Product(2, 'T-shirt', 19.99, $clothingCategory),
    $product3 = new Product(3, 'Café', 12.50, $foodCategory),
    $product4 = new Product(4, 'Smartphone', 599.99, $electronicCategory),
    $product5 = new Product(5, 'Jeans', 49.99, $clothingCategory),
];


foreach ($catalogEx1 as $key => $product) {
    echo $product->getName() . " - ";
    echo $product->getCategory()->getName();
    echo "<br>";
}