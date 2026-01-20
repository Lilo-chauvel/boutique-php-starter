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
     * @param int $postCode
     * @throws InvalidArgumentException
     * @return self
     */
    private function setPostCode(int $postCode): self
    {
        if (filter_var($postCode, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[0-9]{5}$/"]]) === false) {
            throw new InvalidArgumentException("Le code postal n'est pas valide");
        }
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * Get the postal code
     * @return int
     */
    public function getPostCode(): int
    {
        return $this->postCode;
    }

    /**
     * Get the full address
     * @return string
     */
    public function getAddress(): string
    {
        return $this->streetNumber . " " . $this->street . ", " . $this->postCode . " " . $this->town . ", " . $this->country;
    }
}