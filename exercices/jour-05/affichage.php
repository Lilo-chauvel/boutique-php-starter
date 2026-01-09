<?php

function displayBadge($text, $color)
{
    return "<span class=\"badge\" style=\"background: $color\">$text</span>";
}
function displayPrice($price, $discount = 0)
{
    return "<span" . ($discount > 0 ? ' style="text-decoration:line-through"' : null) . ">$price</span>";
}
function displayStock($quantity)
{
    $style = "";
    match (true) {
        $quantity <= 0 => $style = "style = \"background : red \"",
        $quantity < 5 => $style = "style = \"background : orange \"",
        $quantity > 5 => $style = "style = \"background : green \"",
    };

    return "<span $style>$quantity</span>";
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
    <p><?= displayBadge("Bonjour!", "red"); ?></p>
    <p><?= displayPrice(100, 10); ?></p>
    <p><?= displayPrice(100); ?></p>
    <p><?= displayStock(10); ?></p>
    <p><?= displayStock(4); ?></p>
    <p><?= displayStock(0); ?></p>

</body>

</html>