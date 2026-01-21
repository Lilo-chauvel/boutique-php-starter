<?php

$products = [
    ['name' => 'Stan Smith', 'price' => 90.00, 'stock' => 2],
    ['name' => 'Jordan one', 'price' => 150.00, 'stock' => 4],
    ['name' => 'Geox STRADA', 'price' => 30.00, 'stock' => 8],
    ['name' => 'Air force one', 'price' => 110.00, 'stock' => 7],
    ['name' => 'New Balance 740', 'price' => 86.00, 'stock' => 5],
];
var_dump($products[2]['name']); // afficher le nom du troisième article
echo '<br>';
var_dump($products[0]['price']); // afficher le prix du premier article
echo '<br>';
var_dump($products[count($products[0]) - 1]['stock']); // afficher le dernier stock du dernier article
$products[1]['stock'] = 10;
echo $products[1]['stock'];
