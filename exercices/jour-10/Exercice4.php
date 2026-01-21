<?php

require_once '/var/www/boutique/app/class/autoloader.php';
autoloader::register();
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8mb4',
        'dev',
        'dev',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo 'Erreur : '.$e->getMessage();
    exit;
}
$testCat = new categoryRepository($pdo);
echo '<pre>';
var_dump($testCat->findWithproducts(1));
echo '</pre>';
