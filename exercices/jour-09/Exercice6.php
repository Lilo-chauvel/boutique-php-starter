<?php
echo "<div style=\"visibility:collapse\">
    ";
require_once "class.php";
echo "
    </div>";

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
// print_r($tabCartItemEx2[0]);
$cart1 = new Cart();
foreach ($catalogEx1 as $key => $cartItem) {
    $cart1->addProduct($cartItem, $key);
}
$cart2 = new Cart();
$lilo = new User("Lilo", "lilo.chauvel@gmail.com");
$nico = new User("nico", "nico@exemple.com");
count($lilo->arrayAdress);
$lilo->addNewAdress(44, "rue de la Cécile", "Valence", 26000, "France");
$lilo->arrayAdress;
$myOrder = new Order($lilo, $cart1);
$myOrder->getDate();
$myOrder->getId();
$myOrder->getItemCount();
$myOrder->getTotalOrder();
$nicoOrder = new Order($nico, $cart2);
$nicoOrder->getDate();
$nicoOrder->getId();
$nicoOrder->getItemCount();
$nicoOrder->getTotalOrder();

$cart1->removeProduct($catalogEx1[0])
    ->addProduct($catalogEx1[0], 2);