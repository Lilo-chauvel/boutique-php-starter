<?php
require_once("/var/www/boutique/public/class/Autoloader.php");
Autoloader::register();
/**
 * The Product repository
 */
class ProductRepository extends Product
{

    public function __construct(
        protected int $id,
        protected string $name,
        protected float $price,
        protected int $stock,
        protected PDO $pdo
    ) {
        parent::__construct(
            $id,
            $name,
            $price,
            $stock,
        );
    }
    /**
     * Return the product of a given product in the Database
     * @param int $id
     * @return Product|null
     */
    public function find(int $id): Product
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        return $data ? $this->hydrate($data) : null;
    }

    /**
     * Return all the product
     * @return void
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return array_map([$this, 'hydrate'], $stmt->fetchAll());
    }
    // Hydratation : tableau → objet
    private function hydrate(array $data): Product
    {
        return new Product(
            id: (int) $data['id'],
            name: $data['name'],
            price: (float) $data['price'],
            stock: (int) $data['stock']
        );
    }

    public function saveProduct(Product $product, string $description = ""): static
    {
        $name = $product->getName();
        $price = $product->getPrice();
        $stock = $product->getStock();
        $category = $product->getCategory();
        $stmt = $this->pdo->query("INSERT INTO products (name,description, price, stock,category) VALUES ($name,$description,$price,$stock,$category)");
        return $this;
    }
    /**
     * With a given id update the variable of the
     * @param int $id 
     * @param string $name
     * @param string $description
     * @param float $price
     * @param int $stock
     * @param string $category
     * @return void
     */
    public function updateProduct(int $id,array $tabInput,?string $name,?string $description,?float $price,?int $stock,?string $category): static
    {
        $tabProduitToUpdate = $this->find($id)->getAllVariableInArray();

        foreach($tabInput as $key=>$characteristic){
            if (!isset($characteristic)){
                $tabInput[$key] = $tabProduitToUpdate[$key];
            }
        }
        $stmt = $this->pdo->query("UPDATE products SET name=$name,description=$description, price=$price, stock=$stock ,category=$category WHERE id=$id");
        return $this;
    }

    public function delete(int $id): static{
        $stmt = $this->pdo->query("DELETE FROM products WHERE id = $id");
        return $this;
    }
}