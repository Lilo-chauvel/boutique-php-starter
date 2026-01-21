<?php

namespace App\Class;

class Product
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected float $price,
        protected int $stock,
        protected string $category
    ) {}

    /**
     * Get the id of the product
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    // /**
    //  * Get the name of the article
    //  * @return category|string
    //  */
    // public function getcategory(): category
    // {
    //     return $this->category;
    // }
    /**
     * Get the name of the product
     */
    public function getName(): string
    {
        return $this->name;
    }

    // /**
    //  * Get the category of the article
    //  * @return category|string
    //  */
    // public function getcategory(): category
    // {
    //     return $this->category;
    // }
    /**
     * Get the category of the product
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Get the price of the product
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the stock of the product
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Return an array with all the variables of the product
     */
    public function getAllVariableInArray(): array
    {
        return [$this->getId(), $this->getName(), $this->getPrice(), $this->getStock()];
    }
}
