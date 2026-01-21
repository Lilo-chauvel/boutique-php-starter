<?php
$firstName = [
    'Georges',
    'Jean',
    'Laure',
    'Anne',
    'Mick',
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

    <?php for ($i = 0; $i <= (count($firstName) - 1); $i++) { ?>
        <li><?= ($i + 1).'.'.$firstName[$i]?></li>
    <?php } ?>
    </ul>
</body>

</html>
<ul>