<?php

namespace App\Class;

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity = 1
    ) {}
    /**
     * Decrement quantity
     * Chainable
     */
    public function decrement(int $quantityDecrement): self
    {
        $quantityAfterDecrement = $this->quantity - $quantityDecrement;
        if ($quantityAfterDecrement < 0) {
            throw new \InvalidArgumentException('Cannot decrement below zero');
        }
        $this->quantity = $quantityAfterDecrement;

        return $this;
    }

    /**
     * Increment quantity
     * Chainable
     */
    public function increment(int $quantityIncrement): self
    {
        $this->quantity += $quantityIncrement;

        return $this;
    }

    /**
     * Get the product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * Get the quantity
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the quantity
     * Chainable
     */
    public function setQuantity(int $quantitySet): self
    {
        $this->quantity = max(0, $quantitySet);

        return $this;
    }

    /**
     * Get the total price of this item
     */
    public function getTotalItem(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
