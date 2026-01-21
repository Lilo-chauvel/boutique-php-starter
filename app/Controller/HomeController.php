<?php

namespace App\Controller;

class HomeController
{
    /**
     * Summary of bonjour
     *
     * @return void
     */
    public function bonjour()
    {
        echo 'bonjour';
    }

    /**
     * Display home page
     */
    public function index(): void
    {
        $title = 'Bienvenu sur ma boutique';
        require __DIR__.'/../../views/home/index.php';
    }

    // -----------  FLASH   -----------
    public function store(): void
    {
        // Après création réussie...
        flash('success', 'Produit créé avec succès !');
        redirect('/produits');
    }

    public function destroy(): void
    {
        // Après suppression...
        flash('warning', 'Produit supprimé.');
        redirect('/produits');
    }
}
