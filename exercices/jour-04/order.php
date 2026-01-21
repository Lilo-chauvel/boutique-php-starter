<?php
$status = 'validated';
$standby = 'standby';
$shipped = 'shipped';
function clas($color)
{
    switch ($color) {
        case 'standby':
            echo 'class="jaune"';
            break;
        case 'validated':
            echo 'class="vert"';
            break;
        case 'shipped':
            echo 'class="bleu"';
            break;
        case 'delivered':
            echo 'class="rose"';
            break;
        case 'canceled':
            echo 'class="rouge"';
            break;
    }
}

function matchClas($color)
{
    match ($color) {
        'standby' => $color = 'class="jaune"',

        'validated' => $color = 'class="vert"',

        'shipped' => $color = 'class="bleu"',

        'delivered' => $color = 'class="rose"',

        'canceled' => $color = 'class="rouge"',

    };
    echo $color;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .jaune {
            background-color: #F1C40F;
        }

        .vert {
            background-color: #2ECC71;
        }

        .bleu {
            background-color: #3498DB;
        }

        .rose {
            background-color: #ae2797ff;
        }

        .rouge {
            background-color: #E74C3C;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2 <?= clas($status) ?>> <?= $status ?></h2>
    <h2 <?= clas($standby) ?>> <?= $standby ?></h2>
    <h2 <?= matchClas($shipped) ?>> <?= $shipped ?></h2>

</body>

</html>