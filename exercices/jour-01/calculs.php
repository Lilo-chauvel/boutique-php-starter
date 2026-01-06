<?php
$priceExcludingTax = 100;
$vat = 20;
$quantity = 3;

echo $priceExcludingTax*(1+($vat/100));
echo "<br/>";
echo $priceExcludingTax*($vat/100);
echo "<br/>";
echo $priceExcludingTax*(1+($vat/100))*$quantity;
echo "<br/>";