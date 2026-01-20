<?php
// FRONT CONTROLEUR : INDEX.PHP
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

// Récupérer l'URL demandée
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Charger les routes et dispatcher
$router = require __DIR__ . '/../config/routes.php';
$router->dispatch($uri, $method);


// ROUTEUR SIMPLE
class Router
{
    private array $routes = [];

    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        // Nettoyer l'URI (enlever les query strings)
        $path = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$path])) {
            [$controller, $action] = $this->routes[$method][$path];
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            http_response_code(404);
            echo "Page non trouvée";
        }
    }
}

//-------------------------------------------
// DEFINIR LES ROUTES
// config/routes.php
$router = new Router();

// Pages publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/produits', [productController::class, 'index']);
$router->get('/produit', [productController::class, 'show']);

// Panier
$router->get('/panier', [cartController::class, 'index']);
$router->post('/panier/ajouter', [cartController::class, 'add']);
$router->post('/panier/supprimer', [cartController::class, 'remove']);

// Contact
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'send']);

return $router;

//-------------------------------------------
// Définir les routes
// config/routes.php
$router = new Router();

// Pages publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/produits', [productController::class, 'index']);
$router->get('/produit', [productController::class, 'show']);

// Panier
$router->get('/panier', [cartController::class, 'index']);
$router->post('/panier/ajouter', [cartController::class, 'add']);
$router->post('/panier/supprimer', [cartController::class, 'remove']);

// Contact
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'send']);

return $router;

//-------------------------------------------
// STRUCTURE D'UN CONTROLEUR
class productController
{
    private productRepository $repository;

    public function __construct()
    {
        $pdo = database::getInstance();
        $this->repository = new productRepository($pdo);
    }

    // GET /produits
    public function index(): void
    {
        $products = $this->repository->findAll();
        require __DIR__ . '/../views/products/index.php';
    }

    // GET /produit?id=X
    public function show(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            $this->redirect('/produits');
            return;
        }

        $product = $this->repository->find((int) $id);

        if (!$product) {
            http_response_code(404);
            require __DIR__ . '/../views/errors/404.php';
            return;
        }

        require __DIR__ . '/../views/products/show.php';
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
//-------------------------------------------
?>
<!-- Vue (template) -->
<!-- views/products/index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Nos produits</title>
</head>

<body>
    <h1>Catalogue</h1>

    <?php foreach ($products as $product): ?>
        <article>
            <h2><?= htmlspecialchars($product->getNom()) ?></h2>
            <p><?= $product->getPrix() ?> €</p>
            <a href="/produit?id=<?= $product->getId() ?>">Voir</a>
        </article>
    <?php endforeach; ?>
</body>

</html>


<?php
//-------------------------------------------
// CARTCONTROLEUR AVEC POST
class cartController
{
    // GET /panier
    public function index(): void
    {
        $cart = $_SESSION['cart'] ?? [];
        require __DIR__ . '/../views/cart/index.php';
    }

    // POST /panier/ajouter
    public function add(): void
    {
        $productId = $_POST['product_id'] ?? null;
        $quantity = (int) ($_POST['quantity'] ?? 1);

        if ($productId && $quantity > 0) {
            if (!isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId] = 0;
            }
            $_SESSION['cart'][$productId] += $quantity;
        }

        // Toujours rediriger après un POST !
        $this->redirect('/panier');
    }

    // POST /panier/supprimer
    public function remove(): void
    {
        $productId = $_POST['product_id'] ?? null;

        if ($productId && isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        $this->redirect('/panier');
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}
?>