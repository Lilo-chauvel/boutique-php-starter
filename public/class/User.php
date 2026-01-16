<?php
class User
{
    public array $arrayAdress = [];
    private int $registrationDate;
    public function __construct(
        public string $name,
        private string $email,
    ) {
        $this->setEmail($this->email);
        $this->registrationDate = strtotime("now");
    }
    /**
     * Say if the User is a new member or not (+30j)
     * @return bool
     */
    private function isnewMember(): bool
    {
        return $this->registrationDate > strtotime("-30 day");
    }

    /**
     * Set the User Email
     * Chainable
     * @param string $email
     * @throws InvalidArgumentException
     * @return void
     */
    public function setEmail(string $email): object
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("L'adresse retourné n'est pas valide");
        }
        return $this;
    }
    /**
     * Add a adress to the User profil
     * Chainable
     * @param int $streetNumber
     * @param string $street
     * @param string $town
     * @param int $postCode
     * @param string $country
     * @return void
     */
    public function addNewAdress(
        int $streetNumber,
        string $street,
        string $town,
        int $postCode,
        string $country,
    ): object{
        $idAdress = (count($this->arrayAdress));
        $this->arrayAdress[$idAdress] = new Adress($streetNumber, $street, $town, $postCode, $country);
        return $this;
    }
    /**
     * Get the default adress
     * @return void
     */
    public function getDefaultAddress(): string
    {
        return $this->arrayAdress[0]->getAdress();
    }
}