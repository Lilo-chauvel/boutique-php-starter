<?php
?><?php
session_start(); // TOUJOURS en première ligne

$_SESSION["user"] = "Marie"; // Écrire
echo $_SESSION["user"];      // Lire
unset($_SESSION["user"]);    // Supprimer une clé
session_destroy();           // Tout détruire


//-----------------------------
// Définir la durée avant session_start() - en secondes
ini_set('session.gc_maxlifetime', 3600); // 1 heure

// Ou définir la durée du cookie de session
session_set_cookie_params([
    'lifetime' => 3600,      // Durée de vie en secondes (1h)
    'path' => '/',           // Accessible sur tout le site
    'domain' => '',          // Domaine (vide = domaine actuel)
    'secure' => true,        // HTTPS uniquement (recommandé en prod)
    'httponly' => true,      // Inaccessible en JavaScript (sécurité XSS)
    'samesite' => 'Lax'      // Protection CSRF
]);
session_start();


//-----------------------------
// Régénérer l'ID de session (sécurité, après login)
session_regenerate_id(true);

// Vérifier si une session existe
if (session_status() === PHP_SESSION_ACTIVE) {
    echo "Session active $i";
    $i++;
}
// Obtenir l'ID de session
$sessionId = session_id();

// Nommer la session (utile pour plusieurs apps sur même domaine)
session_name('MON_APP');
session_start();


//-----------------------------
$pdo = new PDO(
    "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
    "dev",
    "dev",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);


//-----------------------------
// SELECT avec paramètre
$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$_GET["id"]]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// INSERT
$stmt = $pdo->prepare("INSERT INTO produits (nom, prix) VALUES (?, ?)");
$stmt->execute(["T-shirt", 29.99]);