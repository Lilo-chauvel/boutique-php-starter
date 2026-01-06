<?php
$product = [
  "name" => "Air Max", 
  "description" => "Voici ce qui fait les légendes. La Nike Air Force 1 LE est la réédition du classique du basketball de 1982, qui se distingue par son style quotidien tout en blanc ou tout en noir. La durabilité, le confort et l'amorti Air sont toujours présents dans ce véritable classique",
  "price" => 90.00,
  "remise" => 10,
  "stock" => true,
  "category" => "Chaussures",
  "brand" => "Nike",
  "dateAdded" => 06/01/2026,
];  //Création d'un tableau avec les infos d'un article 

$reducePrice = $product["price"] *(1-($product["remise"]/100));     //Calcule du prix remisé
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title><?=$nom?></title>
</head>
<body>
    <style>
        body{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding-top: 50px;
            background-color: black;
            color: white;
        }
        section{
            width: 600px;
        }
        .price{
            display: flex;
            flex-direction: row;
        }
        .price div{
            padding: 30px;
        }
        .strong{
            font-weight: bold;
        }
        .partieDroite{
            display: flex;
            justify-content: center;

        }
        .stock{
            background-color: <?=$colorBtStock?>;
            border-radius: 4px;
            width: fit-content;
            padding-left : 7px;
            padding-right : 7px;
        }
    </style>
    <section>
        <h1><?=$product["name"]?></h1>
        <p><?=$product["brand"]?></p>
        <p><?=$product["category"]?></p>
        <p><?=$product["description"]?></p>
        <br>        
        <div class=stock>En stock</div>
        <div class=price>
            <div>
                <p>Prix : <?=$product["price"]?> €</p>
                <p>Prix remisé de 10% : <?=$reducePrice?> €</p>
        </div>
    </section>
    <section class=partieDroite>
        <img src="assets/Image/image.png" alt="Air force one">
    </section>
</body>
</html>