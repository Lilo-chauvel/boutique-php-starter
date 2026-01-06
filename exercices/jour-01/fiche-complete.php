<?php
$nom = "Air force one";
$Descrition = "Voici ce qui fait les légendes. La Nike Air Force 1 LE est la réédition du classique du basketball de 1982, qui se distingue par son style quotidien tout en blanc ou tout en noir. La durabilité, le confort et l'amorti Air sont toujours présents dans ce véritable classique";
$priceHT = 90.00;
$TauxTaxe = 20;
$promo = 5;
$stock = true;

if($stock == true){
    $colorBtStock = "#008000";
}
    else {
        $colorBtStock = "#800000ff";
    }

$mtTaxe = $priceHT * ($TauxTaxe/100);
$priceTTC = $priceHT + $mtTaxe;
$reduction = $priceTTC * ($promo/100);
$priceReduc = $priceTTC - $reduction;
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
        <h1><?=$nom?></h1>
        <p><?=$Descrition?></p>
        <br>        
        <div class=stock>En stock</div>
        <div class=price>
            <div>
                <p>HT : <?=$priceHT?> €</p>
                <p>Taxe : <?=$mtTaxe?> €</p>
                <p class=strong>TTC : <?=$priceTTC?> €</p>
            </div>
            <div>
                <p>Taux réduction : <?=$promo?>%</p>
                <p>Réduction : <?=$reduction?> €</p>
                <p class=strong>Net à payer : <?=$priceReduc?> €</p>
            </div>
        </div>
    </section>
    <section class=partieDroite>
        <img src="assets/Image/image.png" alt="Air force one">
    </section>
</body>
</html>