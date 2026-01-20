<?php

namespace App\Controller;

class HomeController
{
    /**
     * Display home page
     * @return void
     */
    public function index(): void
    {
        require __DIR__ . '/../views/home/index.php';
    }
}