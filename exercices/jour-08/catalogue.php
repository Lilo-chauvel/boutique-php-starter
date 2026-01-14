<?php
require("Product.php");

$catalog = [
    new product(1, "Air max", "Jolie paire pour adolescent", 150.00, 4, "Chaussures"),
    new product(2, "Nike Revolution", "Chaussures de sport confortables", 89.99, 8, "Chaussures"),
    new product(3, "Adidas Ultra Boost", "Baskets premium haute performance", 199.99, 5, "Chaussures"),
    new product(4, "Puma RS-X", "Sneakers rétro design moderne", 120.00, 12, "Chaussures"),
    new product(5, "New Balance 574", "Chaussures casual intemporelles", 110.50, 7, "Chaussures"),
];

$valeurCatalogue;
$totalStock;
foreach ($catalog as $keys => $product) {
    print_r($product);
    echo "<br>";

    $totalStock += $product->stock;
    $valeurCatalogue += $product->stock * $product->price;
}

echo "Il y a " . $totalStock . " produits en stock";
echo "<br>";
echo "La valeur total du catalogue est de " . $valeurCatalogue."€";
?>