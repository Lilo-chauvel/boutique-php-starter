<pre>
<?php

$products = [
    [
        "name" => "Produit 1",
        "price" => 42,
        "stock" => 0
    ],
    [
        "name" => "Produit 2",
        "price" => 57,
        "stock" => 12
    ],
    [
        "name" => "Produit 3",
        "price" => 15,
        "stock" => 0
    ],
    [
        "name" => "Produit 4",
        "price" => 98,
        "stock" => 34
    ],
    [
        "name" => "Produit 5",
        "price" => 23,
        "stock" => 5
    ],
    [
        "name" => "Produit 6",
        "price" => 78,
        "stock" => 0
    ],
    [
        "name" => "Produit 7",
        "price" => 64,
        "stock" => 27
    ],
    [
        "name" => "Produit 8",
        "price" => 112,
        "stock" => 3
    ],
    [
        "name" => "Produit 9",
        "price" => 100,
        "stock" => 0
    ],
    [
        "name" => "Produit 10",
        "price" => 90,
        "stock" => 18
    ]
];


foreach ($products as $product) {

    if ($product["stock"] === 0) {
        continue;
    }
    if ($product["price"] > 100) {
        break;
    }

    echo "Nom : " . $product["name"] . "<br/>";
    echo "Prix : " . $product["price"] . "<br/>";
    echo "Stock : " . $product["stock"] . "<br/>";
}
echo "<br/>";

foreach ($products as $product) {
    if ($product["price"] >= 100) {
        continue;
    }
    echo "Nom : " . $product["name"] . "<br/>";
    echo "Prix : " . $product["price"] . "<br/>";
    echo "Stock : " . $product["stock"] . "<br/>";

}

?>
</pre>