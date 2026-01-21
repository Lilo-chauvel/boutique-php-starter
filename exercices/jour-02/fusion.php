<?php

$clothes = ['T-shirt', 'Jean', 'Pull'];
$accessories = ['Ceinture', 'Montre', 'Lunettes'];
$catalog = array_merge($clothes, $accessories);
var_dump($catalog);
echo '<br>';
echo count($catalog);
array_splice($catalog, 0, 0, 'Veste');
echo '<br>';
print_r($catalog);
