<?php

//---- Structure d'un Repository ----
class productRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    // READ - Un seul
    public function find(int $id): ?product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        return $data ? $this->hydrate($data) : null;
    }

    // READ - Tous
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    // CREATE
    public function save(product $product): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO products (nom, prix, stock) VALUES (?, ?, ?)"
        );
        $stmt->execute([
            $product->getName(),
            $product->getPrice(),
            $product->getStock()
        ]);
    }

    // UPDATE
    public function update(product $product): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE products SET nom = ?, prix = ?, stock = ? WHERE id = ?"
        );
        $stmt->execute([
            $product->getName(),
            $product->getPrice(),
            $product->getStock(),
            $product->getId()
        ]);
    }
    // setPrice
    // DELETE
    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }

    // Hydratation : tableau → objet
    private function hydrate(array $data): product
    {
        return new product(
            id: (int) $data['id'],
            name: $data['name'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category: (string) $data['category']

        );
    }
}


// UTILISATION

// Configuration
$pdo = new PDO("mysql:host=localhost;dbname=boutique", "dev", "dev");
$productRepo = new productRepository($pdo);

// Récupérer tous les produits
$products = $productRepo->findAll();

// Récupérer un produit
$product = $productRepo->find(42);

// Créer un produit
$newproduct = new product(id: 20, name: "Casquette", price: 19.99, stock: 100, category: "Accessoires");
$productRepo->save($newproduct);

// Modifier
$product->setPrice(24.99);
$productRepo->update($product);

// Supprimer
$productRepo->delete(42);




/**
 * Méthodes de recherche personnalisées
 */
class productRepositoryWithRecherche
{
    // ... méthodes de base ...

    public function findBycategory(int $categoryId): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE category_id = ?"
        );
        $stmt->execute([$categoryId]);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function findInStock(): array
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM products WHERE stock > 0"
        );
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    public function search(string $term): array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM products WHERE nom LIKE ?"
        );
        $stmt->execute(["%$term%"]);
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
}