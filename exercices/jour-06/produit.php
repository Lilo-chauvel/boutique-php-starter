<?php
$catalog = [
    'T-shirt',
    'Manteau',
    'Jeans',
    'Chaussettes',
    'Pull',
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $index = $_GET['index'] ?? null;
if ($catalog[$index] !== null) {
    echo $catalog[$index];
} else {
    echo 'produit non trouvé';
}
?>
</body>

</html>