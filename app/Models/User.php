<?php
require_once dirname(__DIR__) . '/Config/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Registrar nuevo usuario
    public function create($data) {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->db->prepare($sql);
        
        // Encriptamos la contraseña por seguridad
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        return $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);
    }

    // Buscar usuario por Email (para el Login)
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ... código anterior (create y findByEmail) ...

    // Obtener usuario por ID (Para ver perfiles)
    public function findById($id) {
        $sql = "SELECT id, username, email, role, created_at FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Listar todos los usuarios (Para un futuro panel admin)
    public function getAll() {
        $sql = "SELECT id, username, email, role FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}