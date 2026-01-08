<?php
// app/Models/Post.php

class Post {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        // Hacemos un JOIN para saber quién escribió el post
        $sql = "SELECT posts.*, users.username 
                FROM posts 
                JOIN users ON posts.user_id = users.id 
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


    ##TODO hace falta el insert y el delete
}