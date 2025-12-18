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
}