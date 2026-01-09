<?php
function calculatePriceIncludingTax($priceExcludingTax, $vat)
{
    return $priceExcludingTax * (1 + $vat / 100);
}

echo "Le prix est de " . calculatePriceIncludingTax(100, 20) . "€"; // Le prix est de 120 €

// On peut utiliser directement dans une expression
$total = calculatePriceIncludingTax(50, 20) + calculatePriceIncludingTax(30, 5.5);


// Valeur par défaut
function calculatePriceIncludingTax2($priceExcludingTax, $vat = 20)
{
    return $priceExcludingTax * (1 + $vat / 100);
}

calculatePriceIncludingTax2(100);      // 120 (utilise TVA par défaut = 20)
calculatePriceIncludingTax2(100, 5.5); // 105.5 (utilise TVA fournie)


//Typage des variables
function calculatePriceIncludingTax3(float $priceExcludingTax, float $vat = 20): float
{
    return $priceExcludingTax * (1 + $vat / 100);
}


//Portée des variables
$message = "Hello"; // Variable globale

function test()
{
    $local = "Je suis locale"; // N'existe que dans test()
    //echo $message;  ERREUR ! $message n'existe pas ici
}

test();
echo $local; // ERREUR ! $local n'existe pas ici


// Fonction fléchée
$double = fn($n) => $n * 2;

echo $double(5); // 10