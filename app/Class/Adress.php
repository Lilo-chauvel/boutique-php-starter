<?php

namespace App\Class;

use InvalidArgumentException;

class Adress
{
    public function __construct(
        public int $streetNumber,
        public string $street,
        public string $town,
        private int $postCode,
        public string $country
    ) {
        $this->setPostCode($this->postCode);
    }

    /**
     * Set the postal code
     * Chainable
     *
     * @throws InvalidArgumentException
     */
    private function setPostCode(int $postCode): self
    {
        if (filter_var($postCode, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^\d{5}$/']]) === false) {
            throw new InvalidArgumentException("Le code postal n'est pas valide");
        }
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get the postal code
     */
    public function getPostCode(): int
    {
        return $this->postCode;
    }

    /**
     * Get the full address
     */
    public function getAddress(): string
    {
        return $this->streetNumber.' '.$this->street.', '.$this->postCode.' '.$this->town.', '.$this->country;
    }
}
