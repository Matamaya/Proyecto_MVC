-- 1. Desactivar revisión de claves foráneas para poder borrar sin errores
SET FOREIGN_KEY_CHECKS = 0;

-- 2. Borrar tablas viejas si existen
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

-- 3. Crear tabla de Usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Crear tabla de Categorías
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- 5. Crear tabla de Posts (PRODUCTOS)
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL, 
    content TEXT NOT NULL,       
    image_url VARCHAR(255),
    price DECIMAL(10, 2) DEFAULT 0.00,        
    user_id INT,                 
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- 6. Insertar Datos de Prueba (Robots)
INSERT INTO users (username, email, password) VALUES 
('AdminRobot', 'admin@robotics.com', '1234');

INSERT INTO categories (name) VALUES 
('Humanoides'), ('Industriales'), ('Drones');

INSERT INTO posts (title, content, image_url, price, user_id, category_id) VALUES
('Atlas Model X', 'Robot humanoide capaz de realizar parkour y tareas de rescate.', 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&q=80&w=600', 150000.00, 1, 1),
('Spot Mini', 'Perro robot explorador. Ideal para inspección industrial.', 'https://images.unsplash.com/photo-1535378437327-1e16d47053e1?auto=format&fit=crop&q=80&w=600', 74500.00, 1, 2),
('CyberArm K1', 'Brazo robótico de alta precisión para ensamblaje.', 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=600', 12000.00, 1, 2);

-- Reactivar claves foráneas
SET FOREIGN_KEY_CHECKS = 1;
