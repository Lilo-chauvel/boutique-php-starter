<?php
$fruits = ["Pomme", "Banane", "Orange"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
// Pomme
// Banane
// Orange

$products = [
    ["nom" => "T-shirt", "prix" => 29.99],
    ["nom" => "Jean", "prix" => 79.99],
    ["nom" => "Casquette", "prix" => 19.99]
];

foreach ($products as $product) {
    echo $product["nom"] . " : " . $product["prix"] . "€<br>";
}

for ($i = 0; $i < 5; $i++) {
    echo "Tour numéro $i<br>";
}
// Tour numéro 0
// Tour numéro 1
// Tour numéro 2
// Tour numéro 3
// Tour numéro 4

$counter = 0;

while ($counter < 3) {
    echo "Compteur : $counter<br>";
    $counter++;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

foreach ($numbers as $n) {
    if ($n === 5) {
        continue; // Saute le 5, passe au suivant
    }
    if ($n === 8) {
        break; // Arrête complètement la boucle
    }
    echo "$n ";
}
// Affiche : 1 2 3 4 6 7
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php foreach ($products as $product): ?>
        <div class="produit">
            <h2><?= $product["nom"] ?></h2>
            <p><?= $product["prix"] ?> €</p>
        </div>

    <?php endforeach; ?>


    <ul>
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <li> Liste <?= $i ?></li>
        <?php } ?>
    </ul>
</body>

</html>