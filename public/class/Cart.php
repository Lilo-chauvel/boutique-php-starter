<?php
class Cart
{

    private array $items = [];
    /**
     * Add a quantity to a existing article
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function addProduct(Product $product, int $quantity = 1): void
    {
        $this->items[$product->getId()] = new CartItem($product, $quantity);
    }

    /**
     * Update a given article
     * Chainable
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function uptdateProduct(Product $product, int $quantity = 1):object
    {
        $this->items[$product->getId()]->setQuantity($quantity);
        return $this;
    }

    /**
     * Remove a given product in your cart
     * Chainable
     * @param Product $product
     * @return void
     */
    public function removeProduct(Product $product): object
    {
        unset($this->items[$product->getId()]);
        return $this;
    }

    /**
     * Get the array Items 
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get the total of the catalog
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
     * Count the number of product in your cart
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Remove all the product ni your cart
     * Chainable
     * @return void
     */
    public function clear(): object
    {
        $this->items = [];
        return $this;
    }
}
