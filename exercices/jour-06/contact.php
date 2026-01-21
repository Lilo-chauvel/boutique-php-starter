<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire POST</title>
</head>

<body>
    <form action="" method="POST">
        <label for="nom">Nom (*): </label>
        <input type="text" name="nom" id="nom">
        <label for="email">Email (*): </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="message">Message (*): </label>
        <textarea type="text" name="message" id="message" size=""></textarea>
        <button type="submit">Envoyer</button>
    </form>
    <br>
    <div>

        <?php
        $nom = htmlspecialchars($_POST['nom']) ?? null;
        $email = htmlspecialchars($_POST['email']) ?? null;
        $message = htmlspecialchars($_POST['message']) ?? null;

        $valide = true;

        if ($nom !== null && $nom !== '' && $email != null && $email != '' && $message != null && $message != '') {
            echo 'Tous les champs requis ont était rempli';

        } else {
            echo "<p><strong>Erreur</strong> - Vous n'avez pas remplie tous les champs</p>";
            $valide = false;
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<p>Email valide</p>';

        } else {
            echo "<p><strong>Erreur</strong> - L'email est incorect</p>";
            $valide = false;
        }
        if (strlen($message) >= 10) {
            echo '<p>le message contient plus 10 caractères</p>';

        } else {
            echo '<p><strong>Erreur</strong> - Votre message ne contient pas 10 caractère</p>';
            $valide = false;
        }

        if ($valide) {
            ?>
            <h2>Message reçu</h2>
            <p>Nom : <?= $nom?></p>
            <p>Email : <?= $email ?></p>
            <p>Message : <?= $message?></p>
        <?php } ?>
    </div>
</body>

</html>