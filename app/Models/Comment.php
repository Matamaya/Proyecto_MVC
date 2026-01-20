<?php
require_once dirname(__DIR__) . '/Config/Database.php';

class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Insertar un comentario
    public function create($userId, $postId, $content) {
        $sql = "INSERT INTO comments (user_id, post_id, content) VALUES (:user_id, :post_id, :content)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId,
            ':post_id' => $postId,
            ':content' => $content
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
}