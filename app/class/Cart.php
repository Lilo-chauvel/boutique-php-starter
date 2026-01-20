<?php

namespace App\Class;

class Cart
{
    private array $items = [];

    /**
     * Add a product to the cart
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function addProduct(Product $product, int $quantity = 1): void
    {
        $this->items[$product->getId()] = new CartItem($product, $quantity);
    }

    /**
     * Update a product quantity in cart
     * Chainable
     * @param Product $product
     * @param int $quantity
     * @return self
     */
    public function updateProduct(Product $product, int $quantity = 1): self
    {
        if (isset($this->items[$product->getId()])) {
            $this->items[$product->getId()]->setQuantity($quantity);
        }
        return $this;
    }

    /**
     * Remove a product from the cart
     * Chainable
     * @param Product $product
     * @return self
     */
    public function removeProduct(Product $product): self
    {
        unset($this->items[$product->getId()]);
        return $this;
    }

    /**
     * Get all items in the cart
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get the total price of the cart
     * @return float
     */
    public function getTotalCart(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalItem();
        }
        return $total;
    }

    /**
     * Count the number of products in the cart
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Clear the cart
     * Chainable
     * @return self
     */
    public function clear(): self
    {
        $this->items = [];
        return $this;
    }
}
