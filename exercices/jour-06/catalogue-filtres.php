<?php
require '/var/www/boutique/public/helpers.php';
$produitsSimplifies = [
    ['name' => 'T-shirt coton', 'price' => 19.99, 'category' => 'Summer', 'inStock' => false],
    ['name' => 'Jeans slim', 'price' => 49.90, 'category' => 'Autumn', 'inStock' => true],
    ['name' => 'Sweat à capuche', 'price' => 39.90, 'category' => 'Winter', 'inStock' => true],
    ['name' => 'Baskets légères', 'price' => 59.90, 'category' => 'Spring', 'inStock' => true],
    ['name' => 'Casquette noire', 'price' => 14.90, 'category' => 'Summer', 'inStock' => true],
    ['name' => 'Montre digitale', 'price' => 29.90, 'category' => 'Spring', 'inStock' => false],
    ['name' => 'Sac à dos', 'price' => 34.90, 'category' => 'Autumn', 'inStock' => true],
    ['name' => 'Lunettes de soleil', 'price' => 24.90, 'category' => 'Summer', 'inStock' => true],
    ['name' => 'Pull en laine', 'price' => 44.90, 'category' => 'Winter', 'inStock' => false],
    ['name' => 'Short de sport', 'price' => 22.90, 'category' => 'Summer', 'inStock' => true],
    ['name' => 'Veste imperméable', 'price' => 69.90, 'category' => 'Autumn', 'inStock' => true],
    ['name' => 'Gants en cuir', 'price' => 29.50, 'category' => 'Winter', 'inStock' => false],
    ['name' => 'Écharpe en laine', 'price' => 19.90, 'category' => 'Winter', 'inStock' => true],
    ['name' => 'Pantalon de jogging', 'price' => 32.90, 'category' => 'Spring', 'inStock' => true],
    ['name' => 'Chaussures de randonnée', 'price' => 89.90, 'category' => 'Autumn', 'inStock' => false],
];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $resultat = [];
    $recherche = $_GET['recherche'] ?? null;
    $categorie = $_GET['categorie'] === '0' ? null : $_GET['categorie'];
    $prixMax = empty($_GET['prixMax']) ? null : $_GET['prixMax'];
    $enStock = isset($_GET['enStock']) === true ? true : null;
    $i = 1;
    foreach ($produitsSimplifies as $key => $article) {
        if (strpos((string) $article['name'], (string) $recherche) !== false || $recherche === null) {
            if (strpos($article['category'], (string) $categorie) !== false || $categorie === null) {
                if ($article['price'] < $prixMax || $prixMax === null) {
                    if ($article['inStock'] === $enStock || $enStock === null) {
                        $resultat[$key] = $article;
                    } else {
                        echo "$i stock $enStock <br>";
                    }
                } else {
                    echo "$i price $price <br>";
                }

            } else {
                echo "$i cat $categorie <br>";
            }
        } else {
            echo "$i recherche $recherche<br>";
        }

        $i++;
    }
}

if (empty($resultat)) {
    $resultat[0] = 'Aucun résultat';
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
        <input type="text" name="recherche" id="recherche" value="<?= $recherche ?? null ?>"></input><br>
        <label for="categorie">Categorie : </label>
        <select name="categorie" id="categorie">
            <option value="0" <?= ($_GET['categorie'] ?? '0') === '0' ? 'selected' : '' ?>>- selectionner -</option>
            <option value="Spring" <?= ($categorie ?? null) === 'Spring' ? 'selected' : '' ?>>Spring</option>
            <option value="Summer" <?= ($categorie ?? null) === 'Summer' ? 'selected' : '' ?>>Summer</option>
            <option value="Autumn" <?= ($categorie ?? null) === 'Autumn' ? 'selected' : '' ?>>Autumn</option>
            <option value="Winter" <?= ($categorie ?? null) === 'Winter' ? 'selected' : '' ?>>Winter</option>
        </select><br>
        <label for="prixMax">Prix max : </label>
        <input type="number" name="prixMax" id="prixMax" value="<?= $prixMax ?? null ?>"><br>
        <label for="enStock">En stock : </label>
        <input type="checkbox" name="enStock" id="enStock" <?= isset($_GET['enStock']) ? 'checked' : '' ?>><br>
        <button type="submit">Envoyer</button>
    </form>
    <pre>
        <?= print_r($resultat) ?>
    </pre>
</body>

</html>