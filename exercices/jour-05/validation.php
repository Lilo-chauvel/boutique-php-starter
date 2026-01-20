<?php

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
function canorder($stock, $quantity): bool
{
    return $stock >= $quantity;
}

var_dump(isInStock(10));
echo "<br>";
var_dump(isInStock(0));
echo "<br>";
echo "<br>";
var_dump(isOnSale(10));
echo "<br>";
var_dump(isOnSale(0));
echo "<br>";
echo "<br>";
var_dump(isNew("31-12-2025"));
echo "<br>";
var_dump(isNew("14-08-2025"));
echo "<br>";
echo "<br>";
var_dump(canorder(5, 10));
echo "<br>";
var_dump(canorder(5, 1));
echo "<br>";
?>