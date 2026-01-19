<?php
require_once("/var/www/boutique/public/class/Autoloader.php");
Autoloader::register();

$testCat = new CategoryRepository(Database::getInstance());
echo "<pre>";
var_dump($testCat->findWithProducts(1));
echo "</pre>";
?>