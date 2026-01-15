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

$tabCartItemEx2= [];

foreach ($catalogEx1 as $key => $product) {
    $tabCartItemEx2[$key] = new CartItem($product, random_int(1, 10));
}

foreach ($tabCartItemEx2 as $cartItem) {
    echo $cartItem->getProduct()->getName();
    echo "<br>";
    echo "Total : " . $cartItem->getTotal() . " €";
    echo "<br>";
    echo "Decremente : " . $cartItem->decremente(5) . "5";
    echo "<br>";
    echo "Increment : " . $cartItem->incremente(1) . "1";
    echo "<br>";
    echo "Decremente : " . $cartItem->decremente(5) . "5";
    echo "<br>";
    echo "Total : " . $cartItem->getTotal() . " €";
    echo "<br>";
    echo "<p>------------------------------</p>";
    echo "<br>";
}

print_r($tabCartItemEx2[0]);