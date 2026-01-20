<?php

namespace App\Class;

use InvalidArgumentException;
use PDO;

class UserRepository
{
    public function __construct(
        protected PDO $pdo
    ) {
    }

    /**
     * Find user by email
     * @param string $email
     * @return array
     */
    public function findByEmail(string $email): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Save a new user
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $role
     * @return static
     * @throws InvalidArgumentException
     */
    public function save(int $id, string $name, string $email, string $password, string $role): static
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("L'adresse email n'est pas valide");
        }
        $stmt = $this->pdo->prepare("INSERT INTO users (id, name, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id, $name, $email, $passwordHash, $role]);
        return $this;
    }
}