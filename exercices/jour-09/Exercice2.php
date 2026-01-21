<?php

require_once 'class.php';

// Création des catégories
$electroniccategory = new categoryJ9(1, 'Électronique');
$clothingcategory = new categoryJ9(2, 'Vêtements');
$foodcategory = new categoryJ9(3, 'Alimentation');

$catalogEx1 = [
    // Création des produits
    $product1 = new productJ9(1, 'Laptop', 799.99, $electroniccategory),
    $product2 = new productJ9(2, 'T-shirt', 19.99, $clothingcategory),
    $product3 = new productJ9(3, 'Café', 12.50, $foodcategory),
    $product4 = new productJ9(4, 'Smartphone', 599.99, $electroniccategory),
    $product5 = new productJ9(5, 'Jeans', 49.99, $clothingcategory),
];

$tabcartItemEx2 = [];

foreach ($catalogEx1 as $key => $product) {
    $tabcartItemEx2[$key] = new cartItem($product, random_int(1, 10));
}

foreach ($tabcartItemEx2 as $cartItem) {
    echo $cartItem->getproduct()->getName();
    echo '<br>';
    echo 'Total : '.$cartItem->getTotal().' €';
    echo '<br>';
    echo 'Decremente : '.$cartItem->decremente(5).'5';
    echo '<br>';
    echo 'Increment : '.$cartItem->incremente(1).'1';
    echo '<br>';
    echo 'Decremente : '.$cartItem->decremente(5).'5';
    echo '<br>';
    echo 'Total : '.$cartItem->getTotal().' €';
    echo '<br>';
    echo '<p>------------------------------</p>';
    echo '<br>';
}

print_r($tabcartItemEx2[0]);
