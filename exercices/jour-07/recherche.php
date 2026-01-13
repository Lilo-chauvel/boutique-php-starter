<?php
require("/var/www/boutique/public/helpers.php");
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

$search = e($_GET["search"]) ?? null;

// 1. Récupérer automatiquement les colonnes de la table
$stmtCols = $pdo->query("SHOW COLUMNS FROM products");
$colonnes = $stmtCols->fetchAll(PDO::FETCH_COLUMN);

// 2. Construire dynamiquement la condition WHERE
$conditions = [];
foreach ($colonnes as $col) {
    $conditions[] = "LOWER($col) LIKE ?";
}

$sql = "SELECT * FROM products WHERE " . implode(" OR ", $conditions);

// 3. Préparer la requête
$stmt = $pdo->prepare($sql);

// 4. Préparer les paramètres (valeur répétée pour chaque colonne)
$searchParam = "%" . strtolower($search) . "%";
$params = array_fill(0, count($colonnes), $searchParam);

// 5. Exécuter
$stmt->execute($params);

// 6. Récupérer tous les résultats
$tabResultat = $stmt->fetchAll(PDO::FETCH_ASSOC) ?? null;
$resultat = empty($tabResultat) || $tabResultat===null ? "Aucun produit trouvé" : $tabResultat ;

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
        <input type="search" name="search" id="search">
        <button type="sumbit">s</button>
    </form>

    <pre><?php
    var_dump($resultat);
    ?></pre>
</body>

</html>


<!-- Pourquoi utiliser une requête préparée plutôt que concaténer directement ? 
    Cela permet l'injection de code, si l'on fessait
     $sql = "SELECT * FROM products WHERE " . $_GET["search"]; On prend a un risque d'injection de code et en passant par execute() evite les injections de code -->