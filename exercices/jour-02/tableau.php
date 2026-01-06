<!-- <?php
    $fruits = ["Pomme", "Banane", "Orange"];

    echo $fruits[0]; // Pomme
    echo "<br>";
    echo $fruits[1]; // Banane
    echo "<br>";
    echo $fruits[2]; // Orange
    echo "<br>";

    var_dump($fruits);
    echo "<br>";
?>

<?php
    $product = [
        "name" => "iPhone 15",
        "price" => 999.99,
        "stock" => 42,
        "available" => true
    ];

    echo $product["name"];  // iPhone 15
    echo "<br>";
    echo $product["price"]; // 999.99
    echo "<br>";
?> -->

<?php
    $cart = ["T-shirt", "Jean"];
    print_r($cart);
    echo "<br>";
    
    // Ajouter à la fin
    $cart[] = "Casquette";
    // ou
    array_push($cart, "Chaussettes");
        
    foreach($cart as $item) {
        echo $item." ";
    };
    echo "<br>";
    
    // Modifier
    $cart[0] = "Polo";
    foreach($cart as $item) {
        echo $item." ";
    };
    echo "<br>";

    // Supprimer
    unset($cart[1]);
    foreach($cart as $item) {
        echo $item." ";
    };
    echo "<br>";
    
    // Compter
    echo count($cart);
    echo "<br>";
    ?>

<?php
$products = [
    [
        "name" => "T-shirt",
        "price" => 29.99,
        "stock" => 50
    ],
    [
        "name" => "Jean",
        "price" => 79.99,
        "stock" => 30
    ],
    [
        "name" => "Casquette",
        "price" => 19.99,
        "stock" => 100
        ]
    ];
    
    // Accéder au premier produit
    echo $products[0]["name"]; // T-shirt
    echo "<br>";
    
    // Accéder au prix du deuxième produit
    echo $products[1]["price"]; // 79.99
    echo "<br>";
?>