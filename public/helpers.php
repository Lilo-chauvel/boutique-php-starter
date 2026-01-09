<?php
// Fonctions de calcul :

function calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float
{
    return $priceExcludingTax * (1 + ($vat / 100));
}
;
function calculateDiscount(float $price, float $percentage): float
{
    return $price * (1 - ($percentage / 100));
}
;
function calculateTotal(array $cart): float
{
    $total = 0;
    foreach ($cart as $article) {
        $total = $total + $article;
    }
    return $total;
}
; // (cart = tableau de prix);

// Fonctions de formatage :

function formatPrice(float $amount): string
{
    return number_format(round($amount, 2), 2) . "€";
}
// → "1 234,50 €"
function formatDate(string $date): string
{
    $jour = substr($date, 0, 2);
    $mois = substr($date, 3, 2);
    $annee = substr($date, 6, 4);
    $moisAn = [
        "janvier",
        "février",
        "mars",
        "avril",
        "mai",
        "juin",
        "juillet",
        "août",
        "septembre",
        "octobre",
        "novembre",
        "décembre",
    ];

    return $jour . " " . $moisAn[($mois - 1)] . " " . $annee;

} // → "15 janvier 2024";

// Fonctions d'affichage :

function displayStockStatus(int $stock): string
{
    $style = "";
    match (true) {
        $stock <= 0 => $style = "style = \"background : red \"",
        $stock < 5 => $style = "style = \"background : orange \"",
        $stock >= 5 => $style = "style = \"background : green \"",
    };

    return "<span $style>$stock</span>";
} // → HTML coloré
function afficheStock($catalog, $key): string
{
    if ($catalog[$key]["stock"] === 0) {
        $catalog[$key]["afficheStock"] = "Rupture";
    } elseif ($catalog[$key]["stock"] < 5) {
        $catalog[$key]["afficheStock"] = "Derniers";
    } else {
        $catalog[$key]["afficheStock"] = "En stock";
    }
    $bgColor = "";
    if ($catalog[$key]["afficheStock"] === "En stock") {
        $bgColor = "bg-success";
    } elseif ($catalog[$key]["afficheStock"] === "Rupture") {
        $bgColor = "bg-danger";
    } else {
        $bgColor = "bg-warning";
    }

    return '<p class="' . $bgColor . ' text-light p-1 rounded-2">' .
        htmlspecialchars($catalog[$key]["afficheStock"], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') .
        '</p>';
}

function IsNew(bool $article)
{
    if ($article === true) {
        return "<span style =\" background-color: blue;
            color: white;
            border-radius: 5px;
            padding: 5px;
            \">New</span>";
    }
    ;
}
;
function IsInPromo($price, $discount)
{
    if ($discount > 0) {
        return "<p>Promo " . $discount . "%</p>
                        <p>" . round($price * (1 - ($discount / 100)), 2) . " €</p>";
    } else {
        return "<p>" . $price . " €</p>";
    }
}
;

// Fonctions de validation :

function validateEmail(string $email): bool
{
    $positionArobase = strpos($email, "@");
    $nbCar = stripos($email, ".") - ($positionArobase + 1);
    if ($positionArobase !== false && $nbCar !== false) {
        if (strrchr($email, ".") !== "" && strpos(strrchr($email, ".", true), "@") !== false) {
            if (substr($email, $nbCar, ($positionArobase + 1)) !== "") {
                if (strrchr($email, "@", true) !== "") {
                    return true;
                } else {
                    echo "Rien avant @<br>";
                    return false;
                }
            } else {
                echo "Rien entre @ et .<br>";
                return false;
            }
        } else {
            echo "Rien après . ou pas de . après @<br>";
            return false;
        }
    } else {
        echo "Pas de @ ou de .<br>";
        return false;
    }
}

function validatePrice(mixed $price): bool
{
    if ($price >= 0) {
        return true;
    } else {
        return false;
    }
} //→ true si nombre positif

function dump_and_die(mixed $var, string $message): void
{
    $type = get_debug_type($var);
    echo "<pre style=\"background: #1e1e1e; color: #4ec9b0; padding: 20px; border-radius: 5px;\">
    $message
    Type : $type
    Value : $var
    </pre>";
    die();
}
function Afficheprice(float $price, bool $Isvalide): string
{
    if ($Isvalide === true) {
        return $price;
    } else {
        dump_and_die($price, "Prix invalide");
    }
}

// Fonction de debug :


?>