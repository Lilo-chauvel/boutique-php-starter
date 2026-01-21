<?php

namespace App\Class;

class Cart
{
    /**
     * Summary of items
     *
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * Add a product to the cart
     */
    public function addProduct(Product $product, int $quantity = 1): void
    {
        $this->items[$product->getId()] = new CartItem($product, $quantity);
    }

    /**
     * Update a product quantity in cart
     * Chainable
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
     */
    public function removeProduct(Product $product): self
    {
        unset($this->items[$product->getId()]);

        return $this;
    }

    /**
     * Get all items in the cart
     *
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get the total price of the cart
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
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Clear the cart
     * Chainable
     */
    public function clear(): self
    {
        $this->items = [];

        return $this;
    }
}
