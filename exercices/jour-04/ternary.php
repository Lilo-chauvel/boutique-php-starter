<pre>
<?php

$products = [
    [
        'name' => 'Chaise ergonomique',
        'price' => 129.99,
        'stock' => 0,
        'onSale' => true
    ],
    [
        'name' => 'Bureau en bois',
        'price' => 249.50,
        'stock' => 10,
        'onSale' => false
    ],
    [
        'name' => 'Lampe LED',
        'price' => 39.90,
        'stock' => 120,
        'onSale' => true
    ]
];

foreach ($products as $keys => $product) {
    if ($product["stock"] === 0) {
        $products[$keys]["classStock"] = "rupture";
    } else {
        $products[$keys]["classStock"] = "disponible";
    }

    if ($product["onSale"]) {
        $products[$keys]["afficheOnSale"] = "🔥 PROMO";
        $products[$keys]["newPrice"] = $product["price"] * 0.8;
        $products[$keys]["saleStyle"] = "strike";
    }
}
// var_dump($products)

?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .rupture {
            background-color: red;
        }

        .disponible {
            background-color: green;
        }

        .strike {
            text-decoration: line-through;
        }
    </style>
</head>

<body>

    <?php foreach ($products as $product): ?>
        <div class="product <?= $product ?>">
            <h3><?= $product["name"] ?> </h3>
            <p><?= $product["afficheOnSale"] ?></p>
            <p class="<?= $product["saleStyle"] ?>">Prix : <?= $product["price"] ?> €</p>
            <p><?= $product["newPrice"] ?></p>
            <p class="<?= $product["classStock"] ?>">Stock : <?= $product["stock"] ?></p>
        </div>
    <?php endforeach ?>
</body>

</html>