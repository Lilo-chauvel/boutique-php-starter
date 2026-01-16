<?php
class Product
{
    public function __construct(
        protected  int $id,
        protected string $name,
        protected float $price,
        protected  int $stock
    ) {

    }

    /**
     * Get the id of the product
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    // /**
    //  * Get the category of the article
    //  * @return Category|string
    //  */
    // public function getCategory(): Category
    // {
    //     return $this->category;
    // }
    /**
     * Get the name of the product
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the price of the product
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the stock of the product
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Return a array with all the variable of the product
     * @return void
     */
    public function getAllVariableInArray(): array{
        $array = [];
        $array[]=$this->getId()??null;
        $array[]=$this->getName()??null;
        $array[]=$this->getPrice()??null;
        $array[]=$this->getStock()??null;
        return $array;
    }
}