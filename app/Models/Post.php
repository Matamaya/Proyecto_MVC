<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Listar todos los posts
    public function getAll()
    {
        // Unimos con users para saber el autor
        $sql = "SELECT posts.*, users.username 
                FROM posts 
                JOIN users ON posts.user_id = users.id 
                ORDER BY posts.id ASC"; // a veces se usa 'created_at' pero 'id' sirve igual si es autoincremental
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    // Buscar un post por ID
    public function findById($id)
    {
        $sql = "SELECT posts.*, users.username 
                FROM posts 
                JOIN users ON posts.user_id = users.id 
                WHERE posts.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Crear Post (Solo Admin/Writer)
    public function create($title, $content, $userId, $imageUrl = null)
    {
        $sql = "INSERT INTO posts (title, content, user_id, image_url) VALUES (:title, :content, :user_id, :image_url)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':user_id' => $userId,
            ':image_url' => $imageUrl
        ]);
        // Devolvemos el ID para redireccionar o usar en Webhooks
        return $this->db->lastInsertId();
    }

    // Actualizar Post
    public function update($id, $title, $content, $imageUrl)
    {
        $sql = "UPDATE posts SET title = :title, content = :content, image_url = :image_url WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title'     => $title,
            ':content'   => $content,
            ':image_url' => $imageUrl,
            ':id'        => $id
        ]);
    }

    // Eliminar Post
    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>