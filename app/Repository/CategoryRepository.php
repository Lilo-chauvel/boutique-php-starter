<?php

namespace App\Repository;

use PDO;

class CategoryRepository
{
    public function __construct(
        protected PDO $pdo
    ) {
    }

    public function create(int $id, string $name): static
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (id, name) VALUES (?, ?)");
        $stmt->execute([$id, $name]);
        return $this;
    }

    public function read(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        return $stmt->fetchAll();
    }

    public function update(int $id, string $name): static
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->execute([$name, $id]);
        return $this;
    }

    /**
     * Delete category (only if not connected to any product)
     * @param int $id
     * @return static
     */
    public function delete(int $id): static
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $this;
    }

    /**
     * Find all products for a given category
     * @param int $id
     * @return array
     */
    public function findWithProducts(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}