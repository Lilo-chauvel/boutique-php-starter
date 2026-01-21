<?php

// Fonctions de calcul :
function calculateIncludingTax(float $priceExcludingTax, float $vat = 20): float
{
    return $priceExcludingTax * (1 + ($vat / 100));
};
function calculateDiscount(float $price, float $percentage): float
{
    return $price * (1 - ($percentage / 100));
};
function calculateTotal(array $cart): float
{
    $total = 0;
    foreach ($cart as $article) {
        $total += $article;
    }

    return $total;
}; // (cart = tableau de prix);

// Fonctions de formatage :

function formatPrice(float $amount): string
{
    return number_format(round($amount, 2), 2).'€';
}
// → "1 234,50 €"
function formatDate(string $date): string
{
    $jour = substr($date, 0, 2);
    $mois = substr($date, 3, 2);
    $annee = substr($date, 6, 4);
    $moisAn = [
        'janvier',
        'février',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'août',
        'septembre',
        'octobre',
        'novembre',
        'décembre',
    ];

    return $jour.' '.$moisAn[((int) $mois - 1)].' '.$annee;

} // → "15 janvier 2024";

// Fonctions d'affichage :

function displayStockStatus(int $stock): string
{
    $style = '';
    match (true) {
        $stock <= 0 => $style = 'style = "background : red "',
        $stock < 5 => $style = 'style = "background : orange "',
        default => $style = 'style = "background : green "',
    };

    return "<span $style>$stock</span>";
} // → HTML coloré
function afficheStock($catalog, $key): string
{
    if ($catalog[$key]['stock'] === 0) {
        $catalog[$key]['afficheStock'] = 'Rupture';
    } elseif ($catalog[$key]['stock'] < 5) {
        $catalog[$key]['afficheStock'] = 'Derniers';
    } else {
        $catalog[$key]['afficheStock'] = 'En stock';
    }
    $bgColor = '';
    if ($catalog[$key]['afficheStock'] === 'En stock') {
        $bgColor = 'bg-success';
    } elseif ($catalog[$key]['afficheStock'] === 'Rupture') {
        $bgColor = 'bg-danger';
    } else {
        $bgColor = 'bg-warning';
    }

    return '<p class="'.$bgColor.' text-light p-1 rounded-2">'.
        htmlspecialchars($catalog[$key]['afficheStock'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').
        '</p>';
}

function IsNew(bool $article)
{
    if ($article) {
        return '<span style =" background-color: blue;
            color: white;
            border-radius: 5px;
            padding: 5px;
            ">New</span>';
    }
    return null;

}

function IsInPromo($price, $discount)
{
    if ($discount > 0) {
        return '<p>Promo '.$discount.'%</p>
                        <p>'.round($price * (1 - ($discount / 100)), 2).' €</p>';
    } else {
        return '<p>'.$price.' €</p>';
    }
}

// Fonctions de validation :

function validateEmail(string $email): bool
{
    $positionArobase = strpos($email, '@');
    $nbCar = stripos($email, '.') - ($positionArobase + 1);
    if ($positionArobase !== false && $nbCar !== false) {
        if (strrchr($email, '.') !== '' && strpos(strrchr($email, '.', true), '@') !== false) {
            if (substr($email, $nbCar, ($positionArobase + 1)) !== '') {
                if (strrchr($email, '@', true) !== '') {
                    return true;
                } else {
                    echo 'Rien avant @<br>';

                    return false;
                }
            } else {
                echo 'Rien entre @ et .<br>';

                return false;
            }
        } else {
            echo 'Rien après . ou pas de . après @<br>';

            return false;
        }
    } else {
        echo 'Pas de @ ou de .<br>';

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
} // → true si nombre positif

// Fonction de debug :
function dump_and_die(mixed $var, string $message): void
{
    $type = get_debug_type($var);
    echo "<pre style=\"background: #1e1e1e; color: #4ec9b0; padding: 20px; border-radius: 5px;\">
    $message
    Type : $type
    Value : $var
    </pre>";
    exit();
}
function Afficheprice(float $price, bool $Isvalide): float
{
    if ($Isvalide) {
        return $price;
    } else {
        dump_and_die($price, 'Prix invalide');
        exit;
    }
}

function e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function view(string $template, array $data = []): void
{
    extract($data);

    ob_start();
    require __DIR__."/../views/$template.php";
    $content = ob_get_clean();

    require __DIR__.'/../views/layout.php';
}

function redirect(string $url): void
{
    header("Location: $url");
    exit;
}

// -----------------------
// Fonction FLASH
function flash(string $type, string $message): void
{
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message,
    ];
}

function getFlash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    return $flash;
}

// Récupérer l'ancienne valeur d'un champ
function old(string $key, string $default = ''): string
{
    return $_SESSION['old'][$key] ?? $default;
}
