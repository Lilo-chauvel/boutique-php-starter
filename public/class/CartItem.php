<?php
class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity = 1
    ) {
    }
    /**
     * Add quantity to a product
     * Chainable
     * @param int $quantityDecrement
     * @return void
     */
    public function decremente(int $quantityDecrement): object
    {
        $quantityAfterDecrement = $this->quantity - $quantityDecrement;
        if ($quantityAfterDecrement < 0) {
            echo "Votre essayez d'enlever plus de produit qu'il y en a";
        } else {
            $this->quantity = $quantityAfterDecrement;
        }
        return $this;
    }
    /**
     * Remove quantity to a cart item
     * Chainable
     * @param mixed $quantityIncremente
     * @return void
     */
    public function incremente($quantityIncremente): object
    {
        $this->quantity += $quantityIncremente;
        return $this;
    }
    /**
     * Get a product
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
    /**
     * Get the quantity of a product in a item
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    /**
     * Update the quantity of a product in a item
     * Chainable
     * @param int $quantitySet
     * @return void
     */
    public function setQuantity(int $quantitySet): object
    {
        $this->quantity = max(0, $quantitySet);
        return $this;
    }
    /**
     * Get the total price of a item
     * @return float|int
     */
    public function getTotalItem(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
