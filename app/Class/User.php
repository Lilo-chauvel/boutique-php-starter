<?php

namespace App\Class;

use InvalidArgumentException;

class User
{
    public array $arrayAddress = [];

    public function __construct(
        public string $name,
        private string $email
    ) {
        $this->setEmail($this->email);
    }

    /**Check if the user is a new member or not (+30 days)
     *
     * @return bool
     *
    *private function isNewMember(): bool
    *{
    *    return $this->registrationDate > (int) strtotime("-30 day");
    *}
    */
    // ---------------

    /**
     * Set the user email
     * Chainable
     *
     * @throws InvalidArgumentException
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
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Add an address to the user profile
     * Chainable
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
     */
    public function getDefaultAddress(): string
    {
        return $this->arrayAddress[0]['street'] ?? '';
    }
}
