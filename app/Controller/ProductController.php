<?php

namespace App\Controller;

use App\Class\Database;
use App\Class\ProductRepository;

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
     * @return void
     */
    public function index(): void
    {
        $products = $this->repository->findAll();
        require __DIR__ . '/../views/products/index.php';
    }

    /**
     * Display a single product
     * @return void
     */
    public function show(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(404);
            return;
        }

        $product = $this->repository->find((int) $id);
        if (!$product) {
            http_response_code(404);
            return;
        }

        require __DIR__ . '/../views/products/show.php';
    }
}
