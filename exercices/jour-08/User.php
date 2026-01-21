<?php

class user
{
    public function __construct(
        public string $name,
        public string $email,
        public string|bool $registrationDate = true
    ) {
        if ($registrationDate) {
            $this->registrationDate = date('d-m-Y');
        }
    }

    public function isnewMember(): bool
    {
        return strtotime($this->registrationDate) > strtotime('-30 day');
    }
}

$lilo = new user('Lilo', 'dede', '10-01-2026');
var_dump($lilo->isnewMember());
