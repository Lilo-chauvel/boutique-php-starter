<?php
session_start();
require("/var/www/boutique/public/helpers.php");

if (session_status() === PHP_SESSION_ACTIVE) {
    $_SESSION["visits"]++;
} else {
    $_SESSION["visits"] = 1;
}


$reset = e($_GET["reset"]) ?? false;

echo "Vous avez visité cette page " . e($_SESSION["visits"]) . " fois";
if ((bool) $reset === true) {
    session_destroy();
    header("Location: compteur.php");

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
    <a href="compteur.php?reset=true">Reinitialiser</a>
</body>

</html>



<!-- Que se passe-t-il si tu ouvres la page dans un autre navigateur ?
 Le compteur reste à jour
    Que se passe-t-il si tu fermes et rouvres ton navigateur ? 
 Le compteur reste à jour
Cela est dû au fait que les données soient stocké dans le BDD et non par le navigateur
    -->