<?php
// app/Models/Post.php

class Post {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        // Hacemos un LEFT JOIN para obtener todos los posts y sus relaciones
        $sql = "SELECT posts.*, users.username, categories.name as category_name
                FROM posts 
                LEFT JOIN users ON posts.user_id = users.id 
                LEFT JOIN categories ON posts.category_id = categories.id
                ORDER BY posts.created_at DESC";
                
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        // Preparamos la consulta para evitar inyecciones SQL
        $sql = "SELECT posts.*, users.username, categories.name as category_name
                FROM posts 
                JOIN users ON posts.user_id = users.id 
                JOIN categories ON posts.category_id = categories.id
                WHERE posts.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Insertar nuevo post
    public function create($data) {
        $sql = "INSERT INTO posts (title, content, price, specs, is_active, user_id, category_id) 
                VALUES (:title, :content, :price, :specs, :is_active, :user_id, :category_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title'       => $data['title'],
            ':content'     => $data['content'],
            ':price'       => $data['price'],
            ':specs'       => $data['specs'] ?? null,
            ':is_active'   => $data['is_active'] ?? 1,
            ':user_id'     => $data['user_id'],
            ':category_id' => $data['category_id']
        ]);
    }

    // Actualizar post
    public function update($id, $data) {
        $sql = "UPDATE posts SET 
                title = :title, 
                content = :content, 
                price = :price, 
                specs = :specs, 
                category_id = :category_id 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'          => $id,
            ':title'       => $data['title'],
            ':content'     => $data['content'],
            ':price'       => $data['price'],
            ':specs'       => $data['specs'] ?? null,
            ':category_id' => $data['category_id']
        ]);
    }

    // Eliminar post hard delete
    public function delete($id) {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Cambiar estado (Publicar/Despublicar)
    public function toggleStatus($id) {
        $sql = "UPDATE posts SET is_active = NOT is_active WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}