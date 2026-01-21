<?php

// ---- Relation simple : product et category ----
/**
 * Creat a category
 */
class categoryJ9
{
    public function __construct(
        /**
         * @var id: It is the ID of the category
         * @var name: The name of the category
         */
        private int $id,
        private string $name
    ) {}

    /**
     * Give the name of the category
     */
    public function getName(): string
    {
        return $this->name;
    }
}

class productJ9
{
    public function __construct(
        private int $id,
        private string $name,
        private float $price,
        private category $category // Relation !
    ) {}

    /**
     * Get the category of the article
     *
     * @return category|string
     */
    public function getcategory(): category
    {
        return $this->category;
    }

    /**
     * Get the name of the product
     */
    public function getName(): string
    {
        return $this->name;
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
     * Get the id of the product
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

// ---- Composition : cart et cartItem --    --

class cartItem
{
    public function __construct(
        private product $product,
        private int $quantity = 1
    ) {}

    /**
     * Add quantity to a product
     * Chainable
     *
     * @return void
     */
    public function decremente(int $quantityDecrement): static
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
     *
     * @param  mixed  $quantityIncremente
     * @return void
     */
    public function incremente($quantityIncremente): static
    {
        $this->quantity += $quantityIncremente;

        return $this;
    }

    /**
     * Get a product
     */
    public function getproduct(): product
    {
        return $this->product;
    }

    /**
     * Get the quantity of a product in a item
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Update the quantity of a product in a item
     * Chainable
     *
     * @return void
     */
    public function setQuantity(int $quantitySet): static
    {
        $this->quantity = max(0, $quantitySet);

        return $this;
    }

    /**
     * Get the total price of a item
     *
     * @return float|int
     */
    public function getTotalItem(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}

class cart
{
    private array $items = [];

    /**
     * Add a quantity to a existing article
     */
    public function addproduct(product $product, int $quantity = 1): void
    {
        $this->items[$product->getId()] = new cartItem($product, $quantity);
    }

    /**
     * Update a given article
     * Chainable
     *
     * @return void
     */
    public function uptdateproduct(product $product, int $quantity = 1): static
    {
        $this->items[$product->getId()]->setQuantity($quantity);

        return $this;
    }

    /**
     * Remove a given product in your cart
     * Chainable
     *
     * @return void
     */
    public function removeproduct(product $product): static
    {
        unset($this->items[$product->getId()]);

        return $this;
    }

    /**
     * Get the array Items
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get the total of the catalog
     */
    public function getTotalcart(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotalItem();
        }

        return $total;
    }

    /**
     * Count the number of product in your cart
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Remove all the product ni your cart
     * Chainable
     *
     * @return void
     */
    public function clear(): static
    {
        $this->items = [];

        return $this;
    }
}

class user
{
    public array $arrayAdress = [];

    private int $registrationDate;

    public function __construct(
        public string $name,
        private string $email,
    ) {
        $this->setEmail($this->email);
        $this->registrationDate = strtotime('now');
    }

    /**
     * Say if the user is a new member or not (+30j)
     */
    private function isnewMember(): bool
    {
        return $this->registrationDate > strtotime('-30 day');
    }

    /**
     * Set the user Email
     * Chainable
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    public function setEmail(string $email): static
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("L'adresse retourné n'est pas valide");
        }

        return $this;
    }

    /**
     * Add a adress to the user profil
     * Chainable
     *
     * @return void
     */
    public function addNewAdress(
        int $streetNumber,
        string $street,
        string $town,
        int $postCode,
        string $country,
    ): static {
        $idAdress = (count($this->arrayAdress));
        $this->arrayAdress[$idAdress] = adress($streetNumber, $street, $town, $postCode, $country);

        return $this;
    }

    /**
     * Get the default adress
     *
     * @return void
     */
    public function getDefaultAddress(): string
    {
        return $this->arrayAdress[0]->getAdress();
    }
}

class Adress
{
    public function __construct(
        public int $streetNumber,
        public string $street,
        public string $town,
        private int $postCode,
        public string $country,
    ) {
        $this->setPostCode($this->postCode);
    }

    /**
     * Set the code postal
     * Chainable
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function setPostCode(int $postCode): static
    {
        if (filter_var($postCode, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[0-9]{5}$/']]) === false) {
            throw new InvalidArgumentException("Le code postal n'est pas valide");
        }

        return $this;
    }

    /**
     * Give the adress
     */
    public function getAdress(): string
    {
        return $this->streetNumber.' '.$this->street.', '.$this->postCode.' '.$this->town.', '.$this->country;
    }
}
/**
 * order is create after a cart validation and he is validate when the paid is done
 */
class order
{
    public static array $TabIdorder = [];

    private int $id;

    private string $date;

    public function __construct(
        private user $user,
        private cart $item,
        private bool $statut = false,
    ) {
        $this->date = date('d-m-Y');
        $this->creatId();
    }

    private function creatId()
    {
        $this->id = rand(1000, 9999);
        $maxTab = count(self::$TabIdorder);
        $i = 0;
        while ($i < $maxTab) {
            if ($this->id === self::$TabIdorder[$i]) {
                $this->id = rand(1000, 9999);
                $i = 0;
            } else {
                $i++;
            }
        }
        self::$TabIdorder[] = $this->id;

        return $this->id;
    }

    /**
     * Give the date of a order
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Give the id of a order
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Calculate the total of a order and return the total
     */
    public function getTotalorder()
    {
        return $this->item->getTotalcart();
    }

    /**
     * Count and return the number of item in the order
     */
    public function getItemCount()
    {
        return $this->item->count();
    }
}

echo 'A bien accès à la page class.php';
