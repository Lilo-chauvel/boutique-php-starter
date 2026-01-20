<?php
require_once("/var/www/boutique/app/class/autoloader.php");
autoloader::register();

$testCat = new categoryRepository(database::getInstance());
echo "<pre>";
var_dump($testCat->findWithproducts(1));
echo "</pre>";
?>