<?php
require '/var/www/boutique/public/helpers.php';
$catalog = [
    'T-shirt' => [
        'Nom' => 'T-shirt coton',
        'Prix' => 19.99,
        'Description' => 'T-shirt 100% coton, coupe classique',
        'Stock' => 120,
    ],
    'Jeans' => [
        'Nom' => 'Jeans slim',
        'Prix' => 49.90,
        'Description' => 'Jeans coupe slim, denim stretch',
        'Stock' => 80,
    ],
    'Sweat' => [
        'Nom' => 'Sweat à capuche',
        'Prix' => 39.90,
        'Description' => 'Sweat molletonné avec capuche',
        'Stock' => 60,
    ],
    'Chaussures' => [
        'Nom' => 'Baskets légères',
        'Prix' => 59.90,
        'Description' => 'Chaussures de sport légères et confortables',
        'Stock' => 45,
    ],
    'Casquette' => [
        'Nom' => 'Casquette noire',
        'Prix' => 14.90,
        'Description' => 'Casquette réglable en coton',
        'Stock' => 150,
    ],
    'Montre' => [
        'Nom' => 'Montre digitale',
        'Prix' => 29.90,
        'Description' => 'Montre étanche avec écran digital',
        'Stock' => 70,
    ],
    'Sac' => [
        'Nom' => 'Sac à dos',
        'Prix' => 34.90,
        'Description' => 'Sac à dos 20L, idéal pour le quotidien',
        'Stock' => 50,
    ],
    'Lunettes' => [
        'Nom' => 'Lunettes de soleil',
        'Prix' => 24.90,
        'Description' => 'Lunettes UV400, monture légère',
        'Stock' => 90,
    ],
    'Pull' => [
        'Nom' => 'Pull en laine',
        'Prix' => 44.90,
        'Description' => 'Pull chaud en laine mérinos',
        'Stock' => 40,
    ],
    'Short' => [
        'Nom' => 'Short de sport',
        'Prix' => 22.90,
        'Description' => "Short respirant pour l'entraînement",
        'Stock' => 110,
    ],
];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $resultat = [];
    $recherche = $_GET['recherche'] ?? null;
    foreach ($catalog as $key => $article) {
        foreach ($article as $info) {
            if (strpos((string) $info, (string) $recherche) !== false) {
                $resultat[$key] = $article;
                break;
            }
        }
    }
    if (empty($resultat)) {
        $resultat[0] = 'Aucun résultat';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        <label for="recherche">Recherche : </label>
        <input type="text" name="recherche" id="recherche">
        <button type="submit">Envoyer</button>
    </form>
    <pre>
        <?= print_r($resultat) ?>
    </pre>
</body>

</html>