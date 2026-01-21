<!-- views/layout.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Ma Boutique' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav>
            <a href="/">🏠 Accueil</a>
            <a href="/produits">📦 Produits</a>
            <a href="/panier">🛒 Panier</a>
            <a href="/contact">📧 Contact</a>
        </nav>
    </header>

    <main>
        <?php if (isset($flash)) { ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php } ?>

        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Ma Boutique</p>
    </footer>
</body>

</html>