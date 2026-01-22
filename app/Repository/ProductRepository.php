<?php

namespace App\Repository;

require_once __DIR__.'/../../vendor/autoload.php';

use App\Class\Product;
use PDO;

/**
 * The product repository
 */
class ProductRepository
{
    public function __construct(
        protected PDO $pdo
    ) {}

    /**
     * Return the product of a given product in the database
     */
    public function find(int $id): ?Product
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        return $data ? $this->hydrate($data) : null;
    }

    /**
     * Return all the products
     *
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products');
        $stmt->execute();
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }

    /**
     * Hydrate: convert array to object
     */
    private function hydrate(array $data): Product
    {
        return
        new Product(
            id: (int) $data['id'],
            name: $data['name'],
            price: (float) $data['price'],
            stock: (int) $data['stock'],
            category: (string) $data['category'],
        );
    }

    public function saveProduct(Product $product, string $description = ''): static
    {
        $id = $product->getId();
        $name = $product->getName();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $category = $product->getCategory();
        $stmt = $this->pdo->prepare('INSERT INTO products (id, name, description, price, stock, category) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$id, $name, $description, $price, $stock, $category]);

        return $this;
    }

    /** CA MARCHE PAS UPDATE POUR QUI JE VEUX ÇA ME SOUL
     * With a given id update the variable of the
     * In the array are waited like that [1=>name,2=>description,3=>price]
     *
     * @param  string  $name
     * @param  string  $description
     * @param  float  $price
     * @param  int  $stock
     * @param  string  $category
     * @return void
     */
    /**    public function updateproduct(int $id, array $tabInput): static
     *    {
     *        // Récupère les valeurs actuelles du produit
     *        $tabProduitToUpdate = $this->find($id)->getAllVariableInArray();
     *
     *        // Remplace les valeurs nulles ou vides par les valeurs actuelles
     *        foreach ($tabProduitToUpdate as $key => $value) {
     *            if (!array_key_exists($key, $tabInput) || $tabInput[$key] === null || $tabInput[$key] === "") {
     *                // echo $tabInput[$key] . "<br>";
     *                $tabInput[$key] = $value;
     *                // echo $value . "<br>";
     *                // echo $key . "<br>";
     *                // echo $tabInput[$key] . "<br>";
     *            }
     *        }
     *
     *        // Prépare la requête SQL
     *        $stmt = $this->pdo->prepare("UPDATE products SET name=?, description=?, price=?, stock=?, category=? WHERE id=?");
     *
     *        echo "<pre>";
     *        print_r($tabInput);
     *        echo "</pre>";
     *        // Exécute avec les valeurs finales
     *        $stmt->execute([
     *            $tabInput[1],
     *            $tabInput[2],
     *            $tabInput[3],
     *            $tabInput[4],
     *            $tabInput[5],
     *            $id
     *        ]);
     *
     *        return $this;
     *    }
     */
    public function deleteProduct(int $id): static
    {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);

        return $this;
    }

    public function findBycategory(int $idcategory)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE category_id = ?');
        $stmt->execute([$idcategory]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findInStock()
    {
        $stmt = $this->pdo->query('SELECT * FROM products WHERE stock>0');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByPriceRange(float $min, float $max)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE price>? AND price<?');
        $stmt->execute([$min, $max]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Search in the dataBase column Name and Description
     *
     * @return array
     */
    public function search(string $term)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE name LIKE ? OR description LIKE ?');
        $stmt->execute(["%$term%", "%$term%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
