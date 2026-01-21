<?php

$products = [];

for ($i = 1; $i <= 10; $i++) {
    $products['Produit'.$i] =
     [
         'name' => 'Produit'.$i,
         'price' => rand(10, 100),
         'stock' => rand(0, 50),
     ];
}

print_r($products);
