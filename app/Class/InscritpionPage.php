<?php
// Classe InscritpionPage pour une boutique e-commerce
// Propriétés : id (int), name (string), description (?string),Age (int), email (string), password (string), createdAt (DateTimeImmutable), slug (string)
// Constructeur avec promotion de propriétés PHP 8
// Méthode generateSlug() qui crée le slug à partir du name
// Getters pour toutes les propriétés

namespace App\Class;
use DateTimeImmutable;

class InscritpionPage
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected ?string $description,
        protected int $Age,
        protected string $email,
        protected string $password,
        protected DateTimeImmutable $createdAt,
        protected string $slug
    ) {
        $this->slug = $this->generateSlug();
    }

    private function generateSlug(): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->name)));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAge(): int
    {
        return $this->Age;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}

// Crée moi la page HTML avec la methode MVC
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Inscription Page</h1>
        <form method="POST" action="/register">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
</body>
</html>