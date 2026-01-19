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

$tabCartItemEx2 = [];

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