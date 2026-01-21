<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET">
        <input type="text" name="name" value="<?= $name ?>">
        <input type="number" name="age" value="<?= $age ?>">

        <button type="submit">Envoyer</button>

    </form>
    <div>
    <p>Bonjour <?= $name = $_GET['name'] ?? 'visiteur'; ?> vous avez <?= $age = $_GET['age'] ?? 'pas encore remplie le formulaire' ?> ans</p>
    </div>
</body>

</html>