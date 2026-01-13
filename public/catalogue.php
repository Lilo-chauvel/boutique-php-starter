<?php

require_once('helpers.php');
$catalog = [
    "AIR FORCE 1" =>
        [
            "name" => "AIR FORCE 1",
            "descritption" => "Voici ce qui fait les légendes. La Nike Air Force 1 LE est la réédition du classique du basketball de 1982, qui se distingue par son style quotidien tout en blanc ou tout en noir. La durabilité, le confort et l'amorti Air sont toujours présents dans ce véritable classique.",
            "price" => 75.95,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/f4440c19585041859ab2114f0cd8ec2f/46b9a234226f4766b677b921baa352a3.jpg?imwidth=156&filter=packshot",
                "https://img01.ztat.net/article/spp-media-p1/2cb931124de14f62bfc09bacbacfb762/1841682f1b3940338c9187166debc59c.jpg?imwidth=1800",
                "https://img01.ztat.net/article/spp-media-p1/0d9b9fb0af884bc5ba9666435f321484/af5d33d5cf96410a921f964894f07933.jpg?imwidth=1800"
            ],
            "sizes" => [
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
            "reviews" => [
                [
                    "author" => "Angel96",
                    "rating" => 5,
                    "comment" => "Belles chaussures",
                ],
                [
                    "author" => "Martin56",
                    "rating" => 4,
                    "comment" => "Content de mon achat ça été rapide la livraison",
                ],
                [
                    "author" => "Maxim928",
                    "rating" => 1,
                    "comment" => "Hyper lourdes mais vraiment, le probleme de commander sur internet",
                ],
            ],
            "stock" => 3,
            "new" => false,
            "discount" => 20
        ],
    "Nike Dunk Low" =>
        [
            "name" => "NIKE DUNK LOW",
            "descritption" => "Un modèle iconique revisité avec des matériaux plus légers et une silhouette toujours aussi polyvalente. Parfaite pour un usage quotidien avec un confort durable.",
            "price" => 99.90,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/2acc43c2a6ec3e0695f4f8fccb8818d2/a6d5f7fd0e154ca9be918553f1f4e7a4.jpg?imwidth=762&filter=packshot",
                "https://img01.ztat.net/article/spp-media-p1/72368775eea93eff9ba2cb58670c1dc1/4dd89171ae5e493f87e6c2a130b0b798.jpg?imwidth=1800",
                "https://img01.ztat.net/article/spp-media-p1/10acd647203f3874b0b0719c6ecfe599/890519faa6cd465f9bd58731e33cadb7.jpg?imwidth=1800"
            ],
            "sizes" => [36, 37, 38, 39, 40, 41, 42],
            "reviews" => [
                [
                    "author" => "Lina34",
                    "rating" => 5,
                    "comment" => "Super confortables, je les porte tous les jours."
                ],
                [
                    "author" => "Theo_92",
                    "rating" => 4,
                    "comment" => "Bonne qualité mais taille un peu petit."
                ],
                [
                    "author" => "Roxane77",
                    "rating" => 3,
                    "comment" => "Jolie paire mais livraison un peu lente."
                ],
            ],
            "stock" => 0,
            "new" => true,
            "discount" => 0,

        ],
    "Adidas Ultraboost 22" =>
        [
            "name" => "ADIDAS ULTRABOOST 22",
            "descritption" => "Pensée pour la course, cette Ultraboost offre un amorti exceptionnel et une sensation de rebond unique. Idéale pour les longues distances.",
            "price" => 149.99,
            "image" => [
                "https://photo.i-run.com/adidas-ultraboost-5-chaussures-homme-805201-1-sz.jpg",
                "https://photo.i-run.com/adidas-ultraboost-5-chaussures-homme-805205-1-sz.jpg",
                "https://photo.i-run.com/adidas-ultraboost-5-chaussures-homme-805203-1-sz.jpg"
            ],
            "sizes" => [38, 39, 40, 41, 42, 43, 44],
            "reviews" => [
                [
                    "author" => "RunnerPro",
                    "rating" => 5,
                    "comment" => "Parfaites pour mes entraînements, un vrai plaisir."
                ],
                [
                    "author" => "Mickael21",
                    "rating" => 4,
                    "comment" => "Très bon amorti, mais un peu chères."
                ],
                [
                    "author" => "JulieFit",
                    "rating" => 5,
                    "comment" => "Je revis depuis que je cours avec ces chaussures."
                ],
            ],
            "stock" => 0,
            "new" => true,
            "discount" => 30,

        ],
    "New Balance 550" =>
        [
            "name" => "NEW BALANCE 550",
            "descritption" => "Un style rétro inspiré des modèles basketball des années 80. Confort et look vintage réunis dans une paire incontournable.",
            "price" => 119.00,
            "image" => [
                "https://www.impactshoes.com/sites/default/files/styles/zoom_fiche_produit/public/new-balance-550-premium-blanc-be01.jpg",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQwNBfb0iTPf0gF8RNm7c7jOVteGHl4IAw77A&s",
                "https://www.impactshoes.com/sites/default/files/styles/zoom_fiche_produit/public/new-balance-550-premium-blanc-be02.jpg"
            ],
            "sizes" => [35.5, 36, 37, 38, 39, 40],
            "reviews" => [
                [
                    "author" => "RetroFan",
                    "rating" => 5,
                    "comment" => "Le style old school est incroyable."
                ],
                [
                    "author" => "Nico_38",
                    "rating" => 4,
                    "comment" => "Très belles mais un peu rigides au début."
                ],
                [
                    "author" => "SarahL",
                    "rating" => 5,
                    "comment" => "Elles vont avec tout, j'adore."
                ],
            ],
            "stock" => 15,
            "new" => false,
            "discount" => 0,
        ],
    "Puma RS-X" =>
        [
            "name" => "PUMA RS-X",
            "descritption" => "Une sneaker moderne au design audacieux, mélangeant couleurs vives et confort maximal. Parfaite pour un look streetwear affirmé.",
            "price" => 89.50,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/66430b5ae51e471d9f0dbd437763ece1/51d7cf7f367f4359a2bbe727da17c738.jpg?imwidth=762",
                "https://img01.ztat.net/article/spp-media-p1/6f76455cf60e40c18f45aa56d972ff7a/b02e415c38f64544a2bfbd6492c3ccd6.jpg?imwidth=1800&filter=packshot",
                "https://img01.ztat.net/article/spp-media-p1/68aacdfde9b64d7b951fe73b80a7c675/7291ae8aebb24ee28ab8d67fa9555c27.jpg?imwidth=1800"
            ],
            "sizes" => [37, 38, 39, 40, 41, 42, 43],
            "reviews" => [
                [
                    "author" => "StreetVibe",
                    "rating" => 5,
                    "comment" => "Le design est juste incroyable."
                ],
                [
                    "author" => "Kevin93",
                    "rating" => 3,
                    "comment" => "Confort ok mais couleurs trop flashy pour moi."
                ],
                [
                    "author" => "Mila",
                    "rating" => 4,
                    "comment" => "Très bonne paire pour le prix."
                ],
            ],
            "stock" => 4,
            "new" => true,
            "discount" => 10,

        ],
    "Converse Chuck Taylor Lift" =>
        [
            "name" => "CONVERSE CHUCK TAYLOR LIFT",
            "descritption" => "La légendaire Chuck Taylor revisitée avec une semelle plateforme pour un style plus affirmé. Toujours aussi légère et intemporelle.",
            "price" => 75,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/e99e4c845078353b8ece03174593ff51/30ad8943d9b24dd2bbf7504e9b6bef9a.jpg?imwidth=762",
                "https://img01.ztat.net/article/spp-media-p1/521963b751253eefa0e28b0633254c35/89e356a3b7694dab9e40806fc14c49a6.jpg?imwidth=1800&filter=packshot",
                "https://img01.ztat.net/article/spp-media-p1/7635e1403dae38bc97e76ea92a5493ea/dabe574dcdd54bcba5af58960dd45722.jpg?imwidth=1800"
            ],
            "sizes" => [35, 36, 37, 38, 39, 40, 41],
            "reviews" => [
                [
                    "author" => "Lola",
                    "rating" => 5,
                    "comment" => "Elles sont parfaites avec une jupe ou un jean."
                ],
                [
                    "author" => "Tommy",
                    "rating" => 4,
                    "comment" => "Très stylées mais un peu dures au début."
                ],
                [
                    "author" => "Anais",
                    "rating" => 5,
                    "comment" => "Je les adore, elles me grandissent juste ce qu'il faut."
                ],
            ],
            "stock" => 9,
            "new" => false,
            "discount" => 15,

        ],
    "ASICS GEL-LYTE III" =>
        [
            "name" => "ASICS GEL-LYTE III",
            "descritption" => "Un modèle emblématique des années 90, reconnu pour son confort exceptionnel et sa languette fendue iconique. Une sneaker légère, respirante et parfaite pour un usage quotidien.",
            "price" => 104.99,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/09af9a1438dd4ae78c1050674594f1a4/dc1466f4f9094d518ca5bd3eff8fa07a.jpg?imwidth=156&filter=packshot",
                "https://img01.ztat.net/article/spp-media-p1/2889bcc213b54b57bdd5cc3eb3e92317/3a66b3964377434b821ea802aea91dfb.jpg?imwidth=156",
                "https://img01.ztat.net/article/spp-media-p1/cafadb465d024f9b931fc79e63de5f29/2887f362535845ac95a834abb1a9bed4.jpg?imwidth=156"
            ],
            "sizes" => [36, 37, 38, 39, 40, 41, 42, 43],
            "reviews" => [
                [
                    "author" => "Nath_84",
                    "rating" => 5,
                    "comment" => "Super confortables, j’ai l’impression de marcher sur un nuage."
                ],
                [
                    "author" => "Paulinho",
                    "rating" => 4,
                    "comment" => "Très bonne paire, juste un peu serrée au début."
                ],
                [
                    "author" => "CamilleR",
                    "rating" => 5,
                    "comment" => "Couleurs magnifiques, encore mieux en vrai."
                ],
            ],
            "stock" => 10,
            "new" => true,
            "discount" => 0,

        ],
    "VANS OLD SKOOL PRO" =>
        [
            "name" => "VANS OLD SKOOL PRO",
            "descritption" => "La version améliorée du classique Old Skool, renforcée pour offrir plus de durabilité et un meilleur amorti. Parfaite pour le skate comme pour un look casual.",
            "price" => 79.00,
            "image" => [
                "https://img01.ztat.net/article/spp-media-p1/cecb293f38973416a0cc507109ac0c83/92eccdf35faf45d6aa59f2791c0ab57f.jpg?imwidth=156",
                "https://img01.ztat.net/article/spp-media-p1/e6456be8a34437d28b5cffeade6028ae/41e15c14a69a430cbead77f7fa372f54.jpg?imwidth=156",
                "https://img01.ztat.net/article/spp-media-p1/c3518d7afa003b199a26956595866440/75521bb5c184407ba00f35542b4c009f.jpg?imwidth=156"
            ],
            "sizes" => [35, 36, 37, 38, 39, 40, 41, 42],
            "reviews" => [
                [
                    "author" => "SkateLife",
                    "rating" => 5,
                    "comment" => "Résistantes et stylées, parfaites pour skater."
                ],
                [
                    "author" => "Emma_73",
                    "rating" => 4,
                    "comment" => "Très jolies mais un peu rigides au début."
                ],
                [
                    "author" => "Lucas",
                    "rating" => 5,
                    "comment" => "Un classique indémodable, je recommande."
                ],
            ],
            "stock" => 5,
            "new" => false,
            "discount" => 0,

        ],
];


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogue chaussures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        #carouselExampleAutoplaying {
            width: 400px;
            height: 550px;
            margin-right: 100px;
            /* optionnel : centre le carrousel */
        }

        #carouselExampleAutoplaying .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ou contain selon ton besoin */
        }
    </style>
</head>

<body class="d-flex flex-column gap-5">

    <?php foreach ($catalog as $keys => $article):
        ?>

        <section class="d-flex flex-row justify-content-center align-items-center p-5 gap-5">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($article as $key => $info):
                        if ($key === "image") {
                            foreach ($info as $index => $image) {
                                if ($index === 0) {
                                    $class = "carousel-item active";
                                } else {
                                    $class = "carousel-item";
                                }
                                ?>
                                <div class="<?= $class ?>">
                                    <img src=<?= $image ?> class="d-block w-100 rounded-3" alt="...">
                                </div>
                                <?php
                            }
                        }
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="w-50 d-flex flex-column  gap-5">
                <h1><?= $article["name"] ?> 
                <?= IsNew($article["new"])?>
                </h1>
                <p><?= $article["descritption"] ?></p>
                <div class="d-flex flex-column align-items-end">
                    <div class="d-flex justify-content-end align-items-start pt-5 gap-5">
                        <select name="taille" id="choix-taille">
                            <?php foreach ($article as $key => $info):
                                if ($key === "sizes") {
                                    foreach ($info as $index => $size) { ?>
                                        <option value="<?php ($index + 1) ?>"><?= $size ?></option>
                                        <?php
                                    }
                                }
                            endforeach ?>
                        </select>
                        <?= afficheStock($catalog,$keys)?>
                    </div>
                    <div class="d-flex justify-content-end align-items-start gap-5">
                    <?= IsInPromo(Afficheprice($article["price"], validatePrice($article["price"])), $article["discount"])?>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-secondary d-flex flex-row justify-content-center align-items-center p-3 gap-4">
            <?php foreach ($article as $key => $info):
                if ($key === "reviews") {
                    foreach ($info as $key2 => $message):
                        ?>

                        <section class="comment bg-dark rounded d-flex flex-column p-3 gap-4">
                            <div class="d-flex flex-row gap-5 h-auto">
                                <p class="text-light fs-5"><?= $message["author"] ?></p>
                                <p class="text-light fs-5"><?= $message["rating"] ?>/5</p>
                            </div>
                            <p class="text-light fs-6">"<?= $message["comment"] ?>"</p>
                        </section>
                    <?php endforeach;
                }
            endforeach ?>
        </section>
    <?php endforeach;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>