<?php
class CategoryRepository
{
    public function __construct(
        protected PDO $pdo,
    ) {
    }
    public function create(int $id, string $name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (id,name) VALUES (?,?)");
        $stmt->execute([$id, $name]);
        return $this;
    }
    public function read()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $TabRead = $stmt->fetchAll();
        return $TabRead;
    }
    public function update(int $id, string $name)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name=? WHERE id=?");
        $stmt->execute([$name, $id]);
        return $this;
    }
    /**
     * Work only for the category that are not connect to a product
     * @param int $id
     * @return static
     */
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id=?");
        $stmt->execute([$id]);
        return $this;
    }

    public function findWithProducts(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id=?");
        $stmt->execute([$id]);
        $TabRead = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $TabRead;
    }
}