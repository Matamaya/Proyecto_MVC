<?php
class Retriever {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Busca los 5 posts más relevantes para la pregunta
    public function search($query) {
        // MATCH(...) AGAINST(...) es la magia de MySQL para buscar texto natural
        $sql = "SELECT id, title, content, 
                MATCH(title, content) AGAINST (:query IN NATURAL LANGUAGE MODE) as score 
                FROM posts 
                WHERE MATCH(title, content) AGAINST (:query IN NATURAL LANGUAGE MODE) 
                ORDER BY score ASC 
                LIMIT 5";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':query' => $query]);
        
        return $stmt->fetchAll();
    }
}
?>