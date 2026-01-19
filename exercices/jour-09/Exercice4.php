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

$lilo = new User("Lilo", "lilo.chauvel@gmail.com");

echo (count($lilo->arrayAdress));
$lilo->addNewAdress(44, "rue de la Cécile", "Valence", 26000, "France");
print_r($lilo->arrayAdress);
echo "<br>";
echo $lilo->getDefaultAddress();
?>