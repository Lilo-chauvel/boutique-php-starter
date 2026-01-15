<?php
echo "<div style=\"visibility:collapse\">
    ";
require_once "class.php";
echo "
    </div>";

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

$tabCartItemEx2 = [];

foreach ($catalogEx1 as $key => $product) {
    $tabCartItemEx2[$key] = new CartItem($product, random_int(1, 10));
}
// print_r($tabCartItemEx2[0]);

$cart1 = new Cart();
$cart1->addProduct($tabCartItemEx2[0]->getProduct(), $tabCartItemEx2[0]->getQuantity());
var_dump($cart1);
echo "<br>";


var_dump($cart1->addProduct($catalogEx1[0],4));
echo "<br>";
var_dump($cart1->removeProduct($catalogEx1[0]));
echo "<br>";
var_dump($cart1->addProduct($catalogEx1[1],4));
echo "<br>";
var_dump($cart1->uptdateProduct($catalogEx1[1],6));
echo "<br>";
var_dump($cart1->getTotalCart());
echo "<br>";
var_dump($cart1->count());
echo "<br>";
var_dump($cart1->clear());
echo "<br>";
var_dump($cart1->getItems());
echo "<br>";