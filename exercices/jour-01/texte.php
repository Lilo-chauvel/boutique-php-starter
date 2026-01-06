<?php
$brand = "Nike";
$model = "Air Max";

$phraseconc = "Chaussures ".$brand." ".$model;
echo $phraseconc;
echo "<br/>";
$phraseinter = "Chaussures $brand $model";
echo $phraseinter;
echo "<br/>";
echo sprintf("Chaussures %s %s",$brand,$model);

echo "<br/>";
$price = 99.99;
echo "Prix : $price €";  // Que s'affiche-t-il ?
echo "<br/>";
echo 'Prix : $price €';  // Et là ?