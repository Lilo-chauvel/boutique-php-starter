<?php

echo '<div style="visibility:collapse">
    ';
require_once 'class.php';
echo '
    </div>';

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
// print_r($tabcartItemEx2[0]);
$cart1 = new cart;
foreach ($catalogEx1 as $key => $cartItem) {
    $cart1->addproduct($cartItem, $key);
}
$cart2 = new cart;
$lilo = new user('Lilo', 'lilo.chauvel@gmail.com');
$nico = new user('nico', 'nico@exemple.com');
count($lilo->arrayAdress);
$lilo->addNewAdress(44, 'rue de la Cécile', 'Valence', 26000, 'France');
$lilo->arrayAdress;
$myorder = new order($lilo, $cart1);
$myorder->getDate();
$myorder->getId();
$myorder->getItemCount();
$myorder->getTotalorder();
$nicoorder = new order($nico, $cart2);
$nicoorder->getDate();
$nicoorder->getId();
$nicoorder->getItemCount();
$nicoorder->getTotalorder();

$cart1->removeproduct($catalogEx1[0])
    ->addproduct($catalogEx1[0], 2);
