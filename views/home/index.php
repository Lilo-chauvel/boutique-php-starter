<?php
ob_start(); // Commence à capturer le HTML
?>
<h1>
    <?= htmlspecialchars($title) ?>
</h1>
<p>Découvrez nos produits !</p>
<a href="/produits">Voir le catalogue</a>
<?php
calculateDiscount(10, 10);
$content = ob_get_clean(); // Récupère le HTML capturé
require __DIR__.'/../layout.php'; // Injecte dans le layout
