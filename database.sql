SET FOREIGN_KEY_CHECKS = 0;

-- Limpieza
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;

-- 1. Tabla ROLES (Estructura sólida)
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255)
);

-- 2. Tabla USUARIOS (Email ampliado)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE, -- Ampliado a 255
    password VARCHAR(255) NOT NULL,
    role_id INT DEFAULT 2, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- 3. Tabla CATEGORÍAS
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

-- 4. Tabla POSTS (Productos) con CHECK y JSON
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,       -- Ampliado para SEO
    content TEXT NOT NULL,
    image_url VARCHAR(512),            -- Ampliado para URLs largas
    price DECIMAL(10, 2) DEFAULT 0.00,
    
    -- Columna JSON para especificaciones técnicas variables (Batería, Peso, etc.)
    specs JSON NULL,                   
    
    -- Control de estado (Soft Delete)
    is_active BOOLEAN DEFAULT TRUE,    
    
    user_id INT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,

    -- CONSTRAINT DE SEGURIDAD: Precio no puede ser negativo
    CONSTRAINT chk_price_positive CHECK (price >= 0)
);

-- 5. Tabla COMENTARIOS
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

SET FOREIGN_KEY_CHECKS = 1;

-- ==========================================
-- SEEDING DE DATOS (Con JSON de ejemplo)
-- ==========================================

INSERT INTO roles (id, name, description) VALUES 
(1, 'admin', 'Superusuario'), (2, 'user', 'Cliente');

INSERT INTO users (id, username, email, password, role_id) VALUES 
(1, 'AdminBot', 'admin@robo.com', 'pass123', 1),
(2, 'Cliente1', 'cli@ente.com', 'pass456', 2);

INSERT INTO categories (id, name) VALUES (1, 'Humanoides'), (2, 'Industriales');

-- Fíjate en el campo 'specs' (JSON) y el precio protegido
INSERT INTO posts (title, content, price, specs, user_id, category_id) VALUES
('Atlas Model X', 'Robot avanzado', 150000.00, '{"battery": "5000mAh", "weight": "89kg", "height": "1.5m"}', 1, 1),
('Spot Mini', 'Perro robot', 74500.00, '{"battery": "4000mAh", "legs": 4, "speed": "1.6m/s"}', 1, 2);

-- Intento de insertar precio negativo (ESTO DARÍA ERROR y protege tu BD)
-- INSERT INTO posts (title, content, price) VALUES ('ErrorBot', 'Test', -100.00);


-- Limpiar comentarios previos (opcional, para no duplicar)
TRUNCATE TABLE comments;

-- Inserts para el Post 1 (Atlas Model X)
INSERT INTO comments (content, user_id, post_id, created_at) VALUES 
('¡Vaya bestia! ¿Tenéis planes de financiación a 30 años?', 2, 1, '2023-10-20 10:00:00'),
('Hola Cliente1, lamentablemente solo aceptamos pago único o transferencia.', 1, 1, '2023-10-20 10:15:00'),
('Fuera bromas, la movilidad que tiene en el video es impresionante.', 2, 1, '2023-10-20 10:30:00');

-- Inserts para el Post 2 (Spot Mini)
INSERT INTO comments (content, user_id, post_id, created_at) VALUES 
('Lo quiero para pasear por el parque. ¿Incluye correa?', 2, 2, '2023-10-21 09:00:00'),
('Este modelo es autónomo, te sigue él a ti. No necesita correa.', 1, 2, '2023-10-21 09:45:00');