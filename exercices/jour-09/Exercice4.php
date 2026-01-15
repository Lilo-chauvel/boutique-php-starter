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

$lilo = new User("Lilo", "lilo.chauvel@gmail.com");

echo (count($lilo->arrayAdress));
$lilo->addNewAdress(44, "rue de la Cécile", "Valence", 26000, "France");
print_r($lilo->arrayAdress);
echo "<br>";
echo $lilo->getDefaultAddress();
?>