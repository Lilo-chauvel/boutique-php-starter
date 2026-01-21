<?php
$name = 'T-shirt';
$price = 35.99;
$stock = 45;
$onSale = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name?></title>
</head>
<body>
    <h1><?= $name?></h1>
    <p><?= $price?></p>
    <span><?= $stock?> </span>
</body>
</html>