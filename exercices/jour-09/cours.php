<?php

//---- Relation simple : Product et Category ----
class CategoryJ9
{
    public function __construct(
        private int $id,
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class ProductJ9
{
    public function __construct(
        private int $id,
        private string $name,
        private float $price,
        private Category $category // Relation !
    ) {
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }
}

$clothes = new CategoryJ9(1, "Vêtements");
$tshirt = new ProductJ9(1, "T-shirt", 29.99, $clothes);




//---- Composition : Cart et CartItem --    --

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity = 1
    ) {
    }
    public function decremente(int $quantityDecrement): void
    {
        $quantityAfterDecrement = $this->quantity - $quantityDecrement;
        if ($quantityAfterDecrement < 0) {
            echo "Votre essayez d'enlever plus de produit qu'il y en a";
        } else {
            $this->quantity = $quantityAfterDecrement;
        }
    }

    public function incremente($quantityIncremente)
    {
        $this->quantity += $quantityIncremente;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantitySet): void
    {
        $this->quantity = max(1, $quantitySet);
    }

    public function getTotal(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}

class Cart
{

    private array $items = [];

    public function addProduct(Product $product, int $quantity = 1): void
    {
        $id = $product->getId();

        if (isset($this->items[$id])) {
            // Produit déjà dans le panier → augmenter quantité
            $currentQuantity = $this->items[$id]->getQuantity();
            $this->items[$id]->setQuantity($currentQuantity + $quantity);
        } else {
            // Nouveau produit
            $this->items[$id] = new CartItem($product, $quantity);
        }
    }
    // public function add(){
    //     $items[];
    // }

    public function removeProduct(int $productId): void
    {
        unset($this->items[$productId]);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }
}
