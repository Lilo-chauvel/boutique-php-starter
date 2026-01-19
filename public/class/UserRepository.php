<?php
class UserRepository
{
    public function __construct(
        public PDO $pdo
    ) {
    }
    public function findByEmail(string $email): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function save(int $id, string $nom, string $email, string $password, string $role)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("L'adresse retourné n'est pas valide");
        }
        $stmt = $this->pdo->prepare("INSERT INTO users (id,nom,email,password,role) VALUES (?,?,?,?,?)");
        $stmt->execute([$id, $nom, $email, $passwordHash, $role]);
        return $this;
    }
}
?>