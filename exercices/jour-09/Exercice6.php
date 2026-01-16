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
foreach ($catalogEx1 as $key=>$cartItem) {
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