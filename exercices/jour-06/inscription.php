<?php
require("/var/www/boutique/public/helpers.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? null;
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;
    $confirmation = $_POST["confirmation"] ?? null;

    $errorMessage = "<p><strong>Erreur</strong> - ";

    if (strlen($username) > 20 || strlen($username) < 3) {
        $error["username"] = $errorMessage . "L'username est incorrect (min 3 caractère, max 20 caractère)</p>";

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = $errorMessage . "L'email est incorect</p>";

    }
    if (strlen($password) < 8) {
        $error["password"] = $errorMessage . "Le mot de passe doit contenir au moins 8 caractère</p>";

    }
    if ($confirmation !== $password) {
        $error["confirmation"] = $errorMessage . "Le mot de passe et la confiramtion doivent être identiques</p>";

    }

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire gestion erreur</title>
</head>

<body>
    <form action="" method="POST">
        <label for="username">username : </label>
        <input type="text" name="username" id="username"
            value="<?= $error["username"] === null ? e($username) : null; ?>">
        <?= $error["username"] ?></p>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email" value="<?= $error["email"] === null ? e($email) : null; ?>">
        <p><?= $error["email"] ?? null ?></p>
        <br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password"
            value="<?= $error["password"] === null ? e($password) : null; ?>">
        <p><?= $error["password"] ?? null ?></p>
        <label for="confirmation">Confirmation</label>
        <input type="text" name="confirmation" id="confirmation"
            value="<?= $error["confirmation"] === null ? e($confirmation) : null; ?>">
        <p><?= $error["confirmation"] ?? null ?></p>
        <br>
        <br>
        <button type="submit">Envoyer</button>
    </form>
    <br>
    <div>

        <?php
        if ($valide) {
            ?>
            <h2>Message reçu</h2>
            <p>username : <?= $username ?></p>
            <p>Email : <?= $email ?></p>

        <?php } ?>

    </div>
</body>

</html>