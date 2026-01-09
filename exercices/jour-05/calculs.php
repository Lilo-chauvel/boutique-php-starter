<?php
function calculateVAT($priceExcludingTax, $rate): float
{
    return $priceExcludingTax*($rate/100);
}
function calculateIncludingTax($priceExcludingTax, $rate):float{
    return $priceExcludingTax * (1 + ($rate / 100));
}
function calculateDiscount($price, $percentage){
    return $price * (1 - ($percentage / 100));
}

echo $price = 100;
echo "<br>";
echo calculateVAT($price, 20);
echo "<br>";
echo calculateIncludingTax($price, 20);
echo "<br>";
echo $percentage = 10;
echo "<br>";
echo calculateDiscount(calculateIncludingTax($price, 20), $percentage);
?>
