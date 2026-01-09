<pre>
<?php
require_once("ecommerce-helpers.php");
$cartss = [];
for ($i = 0; $i < 10;$i++){
    $carts[$i] = calculateDiscount(calculateIncludingTax(rand(50,100), rand(5,20)), rand(0,30));
}

echo $price = calculateDiscount(calculateIncludingTax(100, 10), 30.00);
echo "</br>";
print_r($carts);
echo "</br>";
echo "Prix du panier : ".formatPrice(calculateTotal($carts));
echo "</br>";
echo "Nous sommes le " . formatDate("09/01/2026");
echo "</br>";
echo displayStockStatus(5);
echo "</br>";
var_dump(validateEmail("Lilo.chauvel@gmail.com"));
echo "</br>";
var_dump(validatePrice(-10));
echo "</br>";
dump_and_die(50);
echo "</br>";   //Code non exécuté
var_dump(validateEmail("Lilo.chauvel@gmail.com"));
echo "</br>";


?>
</pre>