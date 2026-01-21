<?php

$email = $_POST['email'] ?? '';

// Vérifier que ce n'est pas vide
if (empty($email)) {
    $error = "L'email est requis";
}

// Vérifier le format
if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Email invalide';
}

// Vérifier un nombre
$price = $_POST['price'] ?? 0;
if (! is_numeric($price) || $price < 0) {
    $error = 'Prix invalide';
}
