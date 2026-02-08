<?php
class Database {
    private static $instance = null;
    private $conn;

    // Credenciales alineadas con docker-compose.yml
    private $host = 'db';              // El nombre del servicio en Docker
    private $db_name = 'mvc_robotix';     
    private $username = 'admin';   
    private $password = 'admin123'; 
    private function __construct() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            // En producción no deberíamos hacer echo del error exacto por seguridad, 
            die("Error de conexión a la Base de Datos: " . $e->getMessage());
        }
    }

    // Método estático para obtener la conexión desde cualquier modelo
    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
?>