<?php
$produit = [
    "name"=> "AIR FORCE 1",
    "descritption"=> "Voici ce qui fait les légendes. La Nike Air Force 1 LE est la réédition du classique du basketball de 1982, qui se distingue par son style quotidien tout en blanc ou tout en noir. La durabilité, le confort et l'amorti Air sont toujours présents dans ce véritable classique.",
    "price"=> 75.95,
    "image"=>[
        "https://img01.ztat.net/article/spp-media-p1/f4440c19585041859ab2114f0cd8ec2f/46b9a234226f4766b677b921baa352a3.jpg?imwidth=156&filter=packshot",
        "https://img01.ztat.net/article/spp-media-p1/2cb931124de14f62bfc09bacbacfb762/1841682f1b3940338c9187166debc59c.jpg?imwidth=1800",
        "https://img01.ztat.net/article/spp-media-p1/0d9b9fb0af884bc5ba9666435f321484/af5d33d5cf96410a921f964894f07933.jpg?imwidth=1800"
    ],
    "sizes"=> [
        35.5,
        36,
        36.5,
        37,
        37.5,
        38,
        39,
        40,
        40.5,
        41
    ],
    "reviews"=>[
        [
            "author"=> "Angel96",
            "rating"=> 5,
            "comment"=> "Belle chaussures",
        ],     
        [
            "author"=> "Martin56" ,
            "rating"=> 4,
            "comment"=> "Content de mon achat ça été rapide la livraison",
        ],
        [
            "author"=> "Maxim928" ,
            "rating"=> 1,
            "comment"=> "Hyper lourdes mais vraiment … provoque une légère douleur au niveau du haut du lacet parce que la languette du dessous n’est pas assez épaisse et moelleuse .. le probleme de commander sur internet",
        ],
    ] ,
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$produit["name"]?></title>
</head>
<body>
    <img src=<?=$produit["image"][1]?> alt="">
    <p><?=count($produit["sizes"])?></p>
    <p><?=$produit["reviews"][0]["rating"]?></p>
</body>
</html>