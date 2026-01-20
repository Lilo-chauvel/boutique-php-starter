<?php

namespace App\Controller;

use productRepository;

class HomeController
{
    private $product = new productRepository();
    /**
     * Display home page
     * @return void
     */
    public function index(): void
    {
        $title = "Bienvenu sur ma boutique";
        require __DIR__ . '/../../views/home/index.php';
    }

    public function show()
    {
        $id = htmlspecialchars($_GET['id']) ?? null;

        if (!$id) {
            $this->redirection(404);

            require __DIR__ . '/../views/errors/404.php';
            return;
        }
        require __DIR__ . '/../views/products/show.php';
    }

    public function redirection(string $url): void
    {
        header("Location : $url");
        exit;
    }
}
?>