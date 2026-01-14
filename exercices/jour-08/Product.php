<?php
class product
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public float $price,
        public int $stock,
        public string $category,
    ) {
    }
    public function getPriceIncludingTax(float $vat = 20)
    {
        $priceWithTax = $this->price * (1 + ($vat / 100));
        return $priceWithTax;
    }
    public function isInStock(): bool
    {
        if ($this->stock > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function reduceStock(int $quantity):void
    {
        $stockAfterReduce = $this->stock - $quantity;
        if ($stockAfterReduce < 0) {
            echo "Vous n'avez pas assez de stock";
        } else {
            $this->stock = $stockAfterReduce;
        }
    }
    public function checkDiscount(float|int $percentage): bool
    {
        return $percentage >= 0;
    }
    public function applyDiscount(float $percentage): float|bool
    {
        $priceWithReduce = $this->price * (1 - ($percentage / 100));
        if ($this->checkDiscount($percentage)) {
            echo "Votre montant remisé est de " . $priceWithReduce;
            return $priceWithReduce;
        } else {
            echo "votre remise n'est pas valable";
            return $priceWithReduce = false;
        }
    }
}

$voiture = new product(4, "clio2", "My previous car", 2000, 2, "Vehicle");
// echo "<br>";
// echo $voiture->getPriceIncludingTax();
// echo "<br>";
// var_dump($voiture->isInStock());
// echo "<br>";
// echo $voiture->reduceStock(4);
// echo "<br>";
// echo $voiture->reduceStock(1);
// echo "<br>";
// var_dump($voiture->isInStock());
// echo "<br>";
// var_dump($voiture->applyDiscount(-10));
// echo "<br>";
// $voiture->applyDiscount(20);
// echo "<br>";