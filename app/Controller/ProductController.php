<?php

namespace App\Controller;

use App\Db\Database;
use App\Repository\ProductRepository;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $pdo = Database::getInstance();
        $this->repository = new ProductRepository($pdo);
    }

    /**
     * Display all products
     */
    public function index(): void
    {
        $allProducts = $this->repository->findAll();
        require __DIR__.'/../../views/products/index.php';
    }

    /**
     * Display a single product
     */
    public function show(): void
    {
        $id = $_GET['id'] ?? null;
        $product = $this->repository->find((int) $id);
        if (!$product instanceof \App\Class\Product && $id != null) {
            // Ex5 J12 - A integrer
            // $_SESSION['old'] = $_POST;
            // redirect('/contact');
            http_response_code(404);

            return;
        } elseif ($id === null) {
            echo 'isset valider';
            header('Location: produits');
            exit;
        } else {
            require __DIR__.'/../../views/products/show.php';
        }
    }
}
