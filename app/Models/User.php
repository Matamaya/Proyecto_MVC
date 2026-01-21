<?php
require_once dirname(__DIR__) . '/Config/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Registrar nuevo usuario
    public function create($data) {
        // CORRECCIÓN 1: Cambiamos 'role' por 'role_id' en la consulta SQL
        $sql = "INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)";
        $stmt = $this->db->prepare($sql);
        
        // CORRECCIÓN 2: ¡ELIMINADO EL PASSWORD_HASH! 
        // Ya viene encriptado desde el AuthController. No debemos re-encriptarlo.
        
        // CORRECCIÓN 3: Usamos role_id. Si no viene, asignamos 2 (usuario estándar)
        $roleId = $data['role_id'] ?? 2;

        return $stmt->execute([
            ':username' => $data['username'],
            ':email'    => $data['email'],
            ':password' => $data['password'], // Guardamos el hash que recibimos
            ':role_id'  => $roleId
        ]);
    }

    // Buscar usuario por Email (para el Login)
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar usuario por Username (para validaciones)
    public function findByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Obtener usuario por ID (Para ver perfiles)
    public function findById($id) {
        // CORRECCIÓN 4: Pedimos 'role_id' en lugar de 'role'
        $sql = "SELECT id, username, email, role_id, created_at FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Listar todos los usuarios (Para el panel admin)
    public function getAll() {
        // CORRECCIÓN 5: Pedimos 'role_id' en lugar de 'role'
        $sql = "SELECT id, username, email, role_id FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar usuario (Admin)
    public function update($id, $data) {
        $sql = "UPDATE users SET username = :username, email = :email, role_id = :role_id WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'       => $id,
            ':username' => $data['username'],
            ':email'    => $data['email'],
            ':role_id'  => $data['role_id']
        ]);
    }

    // Eliminar usuario
    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}