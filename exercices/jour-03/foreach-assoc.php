<?php
$infoPersonnelle = [
    'name' => 'mark',
    'age' => '44',
    'city' => 'Paris',
    'job' => 'Ingenieur',
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
    <section>
        <?php foreach ($infoPersonnelle as $key => $info) { ?>
            <p><strong><?= $key?></strong> : <?= $info?></p>
        <?php } ?>
    </section>
</body>

</html>