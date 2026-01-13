<?php
require("/var/www/boutique/public/helpers.php");
session_start();


if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
} else {
    echo "Bonjour " . $_SESSION["user"];
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
    <a href="logout.php">Deconnexion</a>
</body>
</html>