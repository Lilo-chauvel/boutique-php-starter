<?php

require_once "class.php";

// Création des catégories
$electronicCategory = new CategoryJ9(1, 'Électronique');
$clothingCategory = new CategoryJ9(2, 'Vêtements');
$foodCategory = new CategoryJ9(3, 'Alimentation');

$catalogEx1 = [
    // Création des produits
    $product1 = new ProductJ9(1, 'Laptop', 799.99, $electronicCategory),
    $product2 = new ProductJ9(2, 'T-shirt', 19.99, $clothingCategory),
    $product3 = new ProductJ9(3, 'Café', 12.50, $foodCategory),
    $product4 = new ProductJ9(4, 'Smartphone', 599.99, $electronicCategory),
    $product5 = new ProductJ9(5, 'Jeans', 49.99, $clothingCategory),
];


foreach ($catalogEx1 as $key => $product) {
    echo $product->getName() . " - ";
    echo $product->getCategory()->getName();
    echo "<br>";
}