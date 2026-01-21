<?php
require '/var/www/boutique/public/helpers.php';
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8mb4',
        'dev',
        'dev',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}

// Fonction qui pour une colonne donnée affiche soit l'info soit la clé
function afficheDonneeTableauHead(string|int $key): void
{
    echo '<th scope="col">'.$key.'</th>';
};
function afficheDonneeTableau(array $nametableau, string|int $nameColonne, string $name = ''): void
{
    echo '<td name='.$name.'>'.$nametableau[$nameColonne].'</td>';
}

// Tableau avec les colonnes que je souhaite afficher
$tableHeadAffiche = [
    'name',
    'description',
    'price',
    'stock',
    'category',
];

// Remplacez 'products' par le nom réel de votre table
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$catalog = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Modifier
$numberArticle = e($_GET['numberArticle']) ?? null;

// Envoie du formulaire
// Ajouter
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] !== null) {
    if ($_POST['action'] === 'ajouter') {                 // ajouter
        $stmt = $pdo->prepare('INSERT INTO products (name,description, price, stock,category) VALUES (?,?,?,?,?)');
        $stmt->execute([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock'], $_POST['category']]);
        header('Location: admin-produits.php');
        exit;
    }
    if ($_POST['action'] === 'supprimer') {         // supprimer
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$numberArticle]);
        header('Location: admin-produits.php');
        exit;
    }
    if ($_POST['action'] === 'modifier') {          // modifier
        $stmt = $pdo->prepare('UPDATE products SET name=?,description=?, price=?, stock=?,category=? WHERE id=?');
        $stmt->execute([$_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock'], $_POST['category'], $numberArticle]);
        header('Location: admin-produits.php');
        exit;
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
    <table>
        <thead>
            <tr>
                <?php
                afficheDonneeTableauHead('Modifier');
foreach ($tableHeadAffiche as $head) {
    afficheDonneeTableauHead($head);
}
?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalog as $key => $product) {
                ?>
                <tr>
                    <td>
                        <form action="" method="GET" style="margin:0;">
                            <input type="hidden" name="numberArticle" value="<?= $product['id'] ?>">
                            <input type="checkbox" name="selection" onchange="this.form.submit()" <?= isset($_GET['numberArticle']) && $_GET['numberArticle'] == $product['id'] ? 'checked' : '' ?>>
                        </form>
                    </td>
                    <?php
                    foreach ($tableHeadAffiche as $info) {
                        afficheDonneeTableau($product, $info, $info);
                    }
                ?>
                </tr>
                <?php
            } ?>
        </tbody>
    </table>


    <form action="" method="POST">
        <table>
            <tbody>
                <?php
                $stmt = $pdo->prepare('SELECT * FROM products WHERE id=?');
$stmt->execute([$numberArticle]);
$produit = $stmt->fetch(PDO::FETCH_ASSOC);
foreach ($tableHeadAffiche as $head) {
    ?>
                    <tr>
                        <th scope="row"><label for="<?= $head ?>"><?= $head ?></label></th>
                        <td><input type="text" name="<?= $head ?>" value="<?= $produit[$head] ?>"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="submit" name="action" value="modifier">Modifier</button>
        <button type="submit" name="action" value="supprimer">Supprimer</button>
        <button type="submit" name="action" value="ajouter">Ajouter</button>
    </form>
</body>

</html>