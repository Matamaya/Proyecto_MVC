<?php
require_once dirname(__DIR__) . '/Config/Database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Insertar un comentario
    public function create($data) {
    // Fíjate que NO pedimos 'created_at', la base de datos lo pone sola
    $sql = "INSERT INTO comments (content, user_id, post_id) VALUES (:content, :user_id, :post_id)";
    
    $stmt = $this->db->prepare($sql);
    
    return $stmt->execute([
        ':content' => $data['content'],
        ':user_id' => $data['user_id'], // Viene de $_SESSION['user_id']
        ':post_id' => $data['post_id']  // Viene del ID del producto que estás viendo
    ]);
}

    // Obtener comentarios de un post (Incluyendo el nombre del usuario)
    public function getByPostId($postId) {
        $sql = "SELECT comments.*, users.username 
                FROM comments 
                JOIN users ON comments.user_id = users.id 
                WHERE post_id = :post_id 
                ORDER BY comments.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los comentarios (Admin)
    public function getAll() {
        $sql = "SELECT comments.*, users.username, posts.title as post_title 
                FROM comments 
                JOIN users ON comments.user_id = users.id 
                JOIN posts ON comments.post_id = posts.id
                ORDER BY comments.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Eliminar comentario
    public function delete($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}