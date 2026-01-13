<?php
session_start();
require("/var/www/boutique/public/helpers.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (e($_POST["user"]) === e("1") && e($_POST["MDP"]) === e("2")) {
        $_SESSION["user"] = e($_POST["user"]);
        // var_dump($_SESSION["user"]);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "identifiant incorrects";
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

    <form action="" method="POST">
        <label for="user">USERNAME : </label>
        <input type="text" name="user" id="user">
        <label for="MDP">MDP : </label>
        <input type="text" name="MDP" id="MDP">
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>