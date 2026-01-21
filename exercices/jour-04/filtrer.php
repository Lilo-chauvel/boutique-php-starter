<?php

$products = [
    [
        'name' => 'Chaise ergonomique',
        'price' => 129.99,
        'stock' => 12,
        'category' => 'Mobilier',
    ],
    [
        'name' => 'Bureau en bois massif',
        'price' => 349.00,
        'stock' => 5,
        'category' => 'Mobilier',
    ],
    [
        'name' => 'Lampe LED de bureau',
        'price' => 39.90,
        'stock' => 0,
        'category' => 'Éclairage',
    ],
    [
        'name' => 'Clavier mécanique',
        'price' => 89.99,
        'stock' => 34,
        'category' => 'Informatique',
    ],
    [
        'name' => 'Souris ergonomique',
        'price' => 49.99,
        'stock' => 18,
        'category' => 'Informatique',
    ],
    [
        'name' => 'Casque audio',
        'price' => 79.50,
        'stock' => 0,
        'category' => 'Audio',
    ],
    [
        'name' => 'Webcam HD',
        'price' => 59.00,
        'stock' => 22,
        'category' => 'Informatique',
    ],
    [
        'name' => 'Tapis de souris XL',
        'price' => 19.99,
        'stock' => 50,
        'category' => 'Accessoires',
    ],
    [
        'name' => 'Fauteuil de bureau premium',
        'price' => 249.99,
        'stock' => 3,
        'category' => 'Mobilier',
    ],
    [
        'name' => 'Support écran réglable',
        'price' => 34.90,
        'stock' => 14,
        'category' => 'Accessoires',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $i = 0;
foreach ($products as $product) {
    if ($product['stock'] > 0 && $product['price'] < 50) { ?>
            <h3><?= $product['name'] ?></h3>
            <p>Prix : <?= $product['price'] ?> €</p>
            <p>Stock : <?= $product['stock'] ?></p>

            <?php
        $i++;
    }
} ?>
    <p><?= $i?> Produit trouvé sur <?= count($products)?></p>

</body>

</html>