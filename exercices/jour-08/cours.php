<?php

// ---- Créer une classe ----
class Product
{
    // Propriétés (les données)
    public string $name;
    public float $price;
    public int $stock;

    // Méthode (le comportement)
    public function display(): void
    {
        echo "$this->name : $this->price €";
    }
}


//---- Le constructeur ----
class Product1
{
    public string $name;
    public float $price;
    public int $stock;
    
    public function __construct(string $name, float $price, int $stock = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
}

// Utilisation
$product = new Product1("T-shirt", 29.99, 50);

//----  Encapsulation : public vs private ----
class Product2
{
    private float $price; // Accessible uniquement dans la classe

    public function __construct(private string $name, float $price)
    {
        $this->setPrice($price); // Validation via setter
    }

    // Getter : lire la valeur
    public function getPrice(): float
    {
        return $this->price;
    }

    // Setter : modifier avec validation
    public function setPrice(float $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException("Prix négatif interdit");
        }
        $this->price = $price;
    }
}

$p = new Product2("T-shirt", 29.99);
// $p->price = -10;   // ❌ Erreur : private
$p->setPrice(25);     // ✅ Passe par la validation
echo $p->getPrice();  // 25


//---- Cool PHP that I bild ----
class User
{
    private function verifage(int $age)
    {
        if ($age < 0)
            throw new Exception("Âge impossible");
        $this->age = $age;
    }

    public function __construct(
        public int $age
    ) {
        $this->setAge($this->age);
    }

    public function setAge(int $age)
    {
        $this->verifage($age);
        $this->age = $age;

    }
}

$test = new User(10);
$test->age=-5
?>