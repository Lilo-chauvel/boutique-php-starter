-- ============================================
-- MaBoutique - Script SQL
-- Formation PHP 14 jours
-- JOUR 7 : Créer la base et importer ce fichier
-- ============================================

-- Création de la base de données
CREATE DATABASE IF NOT EXISTS boutique
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE boutique;

-- ============================================
-- TABLE : categories
-- ============================================
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- TABLE : products
-- JOUR 7 : Utiliser pour lister les produits
-- JOUR 10 : CRUD via productRepository
-- ============================================
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    category_id INT,
    discount INT DEFAULT 0 COMMENT 'Pourcentage de remise',
    is_new BOOLEAN DEFAULT FALSE,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ============================================
-- TABLE : users
-- JOUR 7 : Inscription et connexion
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL COMMENT 'Stocké avec password_hash()',
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- TABLE : orders (Bonus - Jour 9+)
-- ============================================
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'paid', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- TABLE : order_items (Bonus - Jour 9+)
-- ============================================
CREATE TABLE IF NOT EXISTS order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10,2) NOT NULL COMMENT 'Prix au moment de la commande',
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- DONNÉES : Catégories
-- ============================================
INSERT INTO categories (name, slug) VALUES
('Vêtements', 'vetements'),
('Chaussures', 'chaussures'),
('Accessoires', 'accessoires');

-- ============================================
-- DONNÉES : Produits (8 produits)
-- Correspondant aux données du frontend HTML
-- ============================================
INSERT INTO products (name, slug, description, price, stock, category_id, discount, is_new, image) VALUES
(
    'T-shirt Premium Bio',
    't-shirt-premium-bio',
    'T-shirt en coton biologique de haute qualité. Coupe moderne et confortable, parfait pour un usage quotidien. Disponible en plusieurs coloris. Fabriqué de manière éthique et durable.',
    35.99,
    45,
    1,
    0,
    TRUE,
    'tshirt.jpg'
),
(
    'Sneakers Urban',
    'sneakers-urban',
    'Baskets urbaines au design moderne. Semelle confortable pour une utilisation quotidienne. Parfaites pour un style décontracté.',
    99.99,
    3,
    2,
    20,
    FALSE,
    'sneakers.jpg'
),
(
    'Casquette Vintage',
    'casquette-vintage',
    'Casquette au style rétro revisité. Ajustable à toutes les tailles. Idéale pour compléter votre look streetwear.',
    24.99,
    28,
    3,
    0,
    FALSE,
    'casquette.jpg'
),
(
    'Jean Slim Stretch',
    'jean-slim-stretch',
    'Jean coupe slim avec élasthanne pour un confort optimal. Taille mi-haute, parfait pour toutes les occasions.',
    79.99,
    20,
    1,
    30,
    FALSE,
    'jean.jpg'
),
(
    'Sac à dos Urbain',
    'sac-a-dos-urbain',
    'Sac à dos 20L avec compartiment laptop. Bretelles rembourrées et dos aéré pour un confort maximal. Nombreuses poches de rangement.',
    59.99,
    12,
    3,
    0,
    TRUE,
    'sac.jpg'
),
(
    'Montre Classic',
    'montre-classic',
    'Montre élégante au design intemporel. Mouvement quartz précis. Bracelet en cuir véritable. Résistante à l''eau 30m.',
    89.99,
    0,
    3,
    0,
    FALSE,
    'montre.jpg'
),
(
    'Pull Col Roulé',
    'pull-col-roule',
    'Pull en laine mélangée, doux et chaud. Col roulé élégant. Parfait pour les journées fraîches.',
    49.99,
    15,
    1,
    0,
    FALSE,
    'pull.jpg'
),
(
    'Ceinture Cuir',
    'ceinture-cuir',
    'Ceinture en cuir véritable. Boucle métallique classique. Disponible en plusieurs tailles.',
    34.99,
    0,
    3,
    0,
    FALSE,
    'ceinture.jpg'
);

-- ============================================
-- DONNÉES : Utilisateur de test (optionnel)
-- Mot de passe : "password123" (hashé)
-- ============================================
-- INSERT INTO users (username, email, password, role) VALUES
-- ('admin', 'admin@maboutique.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
-- ('user', 'user@test.fr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');

-- ============================================
-- INDEX pour les performances
-- ============================================
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_products_stock ON products(stock);
CREATE INDEX idx_products_is_new ON products(is_new);
CREATE INDEX idx_orders_user ON orders(user_id);
CREATE INDEX idx_orders_status ON orders(status);
