<?php

function formatPrice(float $amount, $currency = "€", $decimals = 2)
{
    return number_format(round($amount, $decimals), $decimals) . $currency;
}

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

function calculateVAT($priceExcludingTax, $rate): float
{
    return $priceExcludingTax * ($rate / 100);
}

function calculateIncludingTax($priceExcludingTax, $rate): float
{
    return $priceExcludingTax * (1 + ($rate / 100));
}

function calculateDiscount($price, $percentage)
{
    return $price * (1 - ($percentage / 100));
}

function isInStock($stock): bool
{
    return $stock > 0;
}

function isOnSale($discount): bool
{
    return $discount > 0;
}

function isNew(string $dateAdded): bool
{
    return strtotime($dateAdded) > strtotime("-30 day");
}

function canOrder($stock, $quantity): bool
{
    return $stock >= $quantity;
}
?>