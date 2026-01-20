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
}