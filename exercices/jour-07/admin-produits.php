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
    echo "Erreur : " . $e->getMessage();
    exit;
}

// Remplacez 'products' par le nom réel de votre table
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$catalog = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Modifier
$numberArticle = e($_GET["numberArticle"]) ?? null;

//Envoie du formulaire
// Ajouter
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["action"] !== null) {
    if ($_POST["action"] === "ajouter") {                 //ajouter
        $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?,?,?,?)");
        $stmt->execute([$_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock"]]);
        header("Location: admin-produits.php");
        exit;
    }
    if ($_POST["action"] === "supprimer") {         //supprimer
        $stmt = $pdo->prepare(query: "DELETE FROM products WHERE id = ?");
        $stmt->execute([$numberArticle + 1]);
        header("Location: admin-produits.php");
        exit;
    }
    if ($_POST["action"] === "modifier") {          //modifier
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$_GET["modifier"]]);
        header("Location: admin-produits.php");
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
                <th>Modifier</th>
                <?php foreach ($catalog as $key => $product) {
                    foreach ($product as $thead => $info) {
                        if ($key !== 0) {
                            break;
                        } elseif ($thead === "id" || $thead === "created_at") {
                            continue;

                        } ?>
                        <th scope="col"> <?= $thead ?> </th>
                        <?php
                    } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalog as $key => $product) {
                ?>
                <tr>
                    <td>
                        <form action="" method="GET" style="margin:0;">
                            <input type="hidden" name="numberArticle" value="<?= $key ?>">
                            <input type="checkbox" name="selection" onchange="this.form.submit()">
                        </form>
                    </td>
                    <?php foreach ($product as $thead => $info) {
                        if ($thead === "id" || $thead === "created_at") {
                            continue;
                        } ?>
                        <td> <?= $info ?> </td>
                    <?php } ?>
                </tr>
                <?php
            } ?>
        </tbody>
    </table>


    <form action="" method="POST">
        <?php foreach ($catalog as $key1 => $product) {
            foreach ($product as $key2 => $info) {
                if ($key1 !== 0) {
                    break;
                } elseif ($key2 === "id" || $key2 === "created_at") {
                    continue;
                }
                $type = gettype($info) !== "integer" ? gettype($info) : "number"; ?>
                <label for="<?= $key2 ?>"><?= $key2 ?> &nbsp;</label>
                <input type="<?= $type ?>" name="<?= $key2 ?>" id="<?= $key2 ?>" value="<?= $catalog[$numberArticle][$key2] ?>">
                <br>
            <?php }
        } ?>
        <button type="submit" name="action" value="modifier">Modifier</button>
        <button type="submit" name="action" value="supprimer">Supprimer</button>
        <button type="submit" name="action" value="ajouter">Ajouter</button>
    </form>
</body>

</html>