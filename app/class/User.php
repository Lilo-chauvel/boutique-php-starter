<?php

namespace App\Class;

use InvalidArgumentException;

class User
{
    public array $arrayAddress = [];
    private int $registrationDate;

    public function __construct(
        public string $name,
        private string $email
    ) {
        $this->setEmail($this->email);
        $this->registrationDate = (int) strtotime("now");
    }

    /**
     * Check if the user is a new member or not (+30 days)
     * @return bool
     */
    private function isNewMember(): bool
    {
        return $this->registrationDate > (int) strtotime("-30 day");
    }

    /**
     * Set the user email
     * Chainable
     * @param string $email
     * @throws InvalidArgumentException
     * @return self
     */
    public function setEmail(string $email): self
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("L'adresse email n'est pas valide");
        }
        $this->email = $email;
        return $this;
    }

    /**
     * Get the user email
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Add an address to the user profile
     * Chainable
     * @param int $streetNumber
     * @param string $street
     * @param string $town
     * @param int $postCode
     * @param string $country
     * @return self
     */
    public function addNewAddress(
        int $streetNumber,
        string $street,
        string $town,
        int $postCode,
        string $country
    ): self {
        $idAddress = count($this->arrayAddress);
        $this->arrayAddress[$idAddress] = [$streetNumber, $street, $town, $postCode, $country];
        return $this;
    }

    /**
     * Get the default address
     * @return string
     */
    public function getDefaultAddress(): string
    {
        return $this->arrayAddress[0]['street'] ?? '';
    }
}