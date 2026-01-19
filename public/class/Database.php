<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
        "dev",
        "dev",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit;
}
class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=localhost;dbname=boutique;charset=utf8mb4",
                "dev",
                "dev",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instance;
    }
}


?>