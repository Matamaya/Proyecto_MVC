SET FOREIGN_KEY_CHECKS = 0;

-- 1. Limpieza total (Borrar tablas antiguas si existen)
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;      -- Ya no se usa
DROP TABLE IF EXISTS categories; -- Ya no se usa

-- 2. Tabla USUARIOS
-- El rol se guarda como texto ('admin', 'writer', 'subscriber') directamente aquí.
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'subscriber',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabla POSTS (Publicaciones)
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255) NULL,  -- NUEVA COLUMNA
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- REQUISITO: Índice FULLTEXT para el módulo RAG
-- Esto permite que la IA busque palabras clave dentro del título y contenido.
ALTER TABLE posts ADD FULLTEXT ft_posts_title_content (title, content);

-- 4. Tabla COMENTARIOS
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE, -- Si borras el post, se borran sus comentarios
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

SET FOREIGN_KEY_CHECKS = 1;
