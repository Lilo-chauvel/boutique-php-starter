<pre>
<?php
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

    ?>
</pre>

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
            <?php foreach ($catalog as $key => $product) { ?>
                <tr>
                    <?php foreach ($product as $thead => $info) { ?>
                        <?php if ($key !== 0) {
                            break;
                        } ?>
                        <th scope="col"> <?= $thead ?> </th>
                        <?php
                    } ?>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catalog as $key => $product) { ?>
                <tr>
                    <?php foreach ($product as $thead => $info) { ?>
                        <td> <?= $info ?> </td>
                        <?php
                    } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>