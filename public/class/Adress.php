<?php
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
     * @param int $postCode
     * @throws InvalidArgumentException
     * @return void
     */
    private function setPostCode(int $postCode): object
    {
        if (filter_var($postCode, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[0-9]{5}$/"]]) === false) {
            throw new InvalidArgumentException("Le code postal n'est pas valide");
        }
        return $this;
    }

    /**
     * Give the adress
     */
    public function getAdress(): string
    {
        return $this->streetNumber . " " . $this->street . ", " . $this->postCode . " " . $this->town . ", " . $this->country;
    }
}