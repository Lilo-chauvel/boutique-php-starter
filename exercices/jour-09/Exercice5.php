<?php

echo '<div style="visibility:collapse">
    ';
require_once 'class.php';
echo '
    </div>';

$electroniccategory = new category(1, 'Électronique');
$clothingcategory = new category(2, 'Vêtements');
$foodcategory = new category(3, 'Alimentation');

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
// print_r($tabcartItemEx2[0]);

$cart1 = new cart;
foreach ($catalogEx1 as $cartItem) {
    $cart1->addproduct($cartItem, 2);
}

$cart2 = new cart;

$lilo = new user('Lilo', 'lilo.chauvel@gmail.com');
$nico = new user('nico', 'nico@exemple.com');

count($lilo->arrayAdress);
$lilo->addNewAdress(44, 'rue de la Cécile', 'Valence', 26000, 'France');
$lilo->arrayAdress;

$myorder = new order($lilo, $cart1);
echo $myorder->getDate();
echo '<br>';
echo $myorder->getId();
echo '<br>';
echo $myorder->getItemCount();
echo '<br>';
echo $myorder->getTotalorder();
echo ' €<br>';
var_dump(order::$TabIdorder);
echo ' <br>';
echo ' <br>';

$nicoorder = new order($nico, $cart2);
echo $nicoorder->getDate();
echo '<br>';
echo $nicoorder->getId();
echo '<br>';
echo $nicoorder->getItemCount();
echo '<br>';
echo $nicoorder->getTotalorder();
echo ' €<br>';

var_dump(order::$TabIdorder);
