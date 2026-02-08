<?php
class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Registrar nuevo usuario
    public function create($username, $email, $passwordHash, $role = 'subscriber') {
        // El rol se guarda como texto: 'admin', 'writer', 'subscriber'
        $sql = "INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password_hash' => $passwordHash,
            ':role'     => $role
        ]);
    }

    // Buscar por Email
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    // Buscar por ID (Auxiliar)
    public function findById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Listar todos (Panel Admin)
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id ASC");
        return $stmt->fetchAll();
    }
    
    // Actualizar rol (Panel Admin)
    public function updateRole($id, $role) {
        $sql = "UPDATE users SET role = :role WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':role' => $role, ':id' => $id]);
    }
}
?>
