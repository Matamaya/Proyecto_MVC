<?php
class Comment {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Crear comentario
    public function create($postId, $userId, $text) {
        $sql = "INSERT INTO comments (post_id, user_id, text) VALUES (:post_id, :user_id, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':post_id' => $postId,
            ':user_id' => $userId, 
            ':text' => $text
        ]);
        return $this->db->lastInsertId();
    }

    // Obtener comentarios de un post
    public function getByPostId($postId) {
        $sql = "SELECT comments.*, users.username 
                FROM comments 
                JOIN users ON comments.user_id = users.id 
                WHERE post_id = :post_id 
                ORDER BY comments.id ASC"; // Usamos ID o created_at
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':post_id' => $postId]);
        return $stmt->fetchAll();
    }

    // Obtener todos (para Admin)
    public function getAll() {
        $sql = "SELECT comments.*, posts.title 
                FROM comments 
                JOIN posts ON comments.post_id = posts.id
                ORDER BY comments.id ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    // Eliminar comentario
    public function delete($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    
    public function findById($id) {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
?>