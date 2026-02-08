<?php
// scripts/seed_users.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Usuarios...\n";

$db = Database::connect();
$pass = password_hash("123456", PASSWORD_DEFAULT);

// 1. Admin
$sql = "INSERT INTO users (username, email, password_hash, role) VALUES 
        ('Admin', 'admin@test.com', '$pass', 'admin'),
        ('Escritor', 'writer@test.com', '$pass', 'writer'),
        ('Lector', 'reader@test.com', '$pass', 'subscriber')";

try {
    $db->query($sql);
    echo "¡Usuarios creados! (Pass: 123456)\n";
} catch (PDOException $e) {
    echo "Error (probablemente ya existían): " . $e->getMessage() . "\n";
}
?>