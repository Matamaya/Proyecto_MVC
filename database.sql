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


-- 1. Crear la tabla 'comments' (si no existe)
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Relaciones: Si se borra el usuario o el post, se borra el comentario
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- 2. Limpiar comentarios viejos (opcional, para no duplicar)
-- SET FOREIGN_KEY_CHECKS = 0; 
-- TRUNCATE TABLE comments;
-- SET FOREIGN_KEY_CHECKS = 1;

-- 3. Insertar Comentarios de Prueba

-- Comentarios en el Robot 1 (Atlas Model X)
INSERT INTO comments (user_id, post_id, content, created_at) VALUES 
(3, 1, '¡Increíble la agilidad que tiene este modelo! Lo he visto en videos y es alucinante.', '2023-10-01 10:00:00'),
(4, 1, 'El precio es elevado, pero para tareas de rescate vale cada centavo. ¿Saben si incluye garantía extendida?', '2023-10-01 12:30:00'),
(2, 1, 'Hola MariaDev, sí, incluye 2 años de garantía directa con Boston Dynamics.', '2023-10-01 14:15:00');

-- Comentarios en el Robot 2 (Spot Mini)
INSERT INTO comments (user_id, post_id, content, created_at) VALUES 
(5, 2, 'Me encantaría tener uno de mascota, aunque creo que mi gato se infartaría.', '2023-10-02 09:45:00'),
(3, 2, 'Lo usamos en la obra para inspeccionar tuberías estrechas y funciona de maravilla.', '2023-10-03 16:20:00');

-- Comentarios en el Robot 5 (Raspberry Pi Kit)
INSERT INTO comments (user_id, post_id, content, created_at) VALUES 
(4, 5, 'Perfecto para empezar a programar con Python. A mi hijo le ha encantado.', '2023-10-05 18:00:00'),
(1, 5, 'Gracias por tu compra Maria. Pronto sacaremos un curso avanzado para este kit.', '2023-10-06 09:00:00');

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


