<?php
// scripts/seed_users.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Usuarios...\n";

$db = Database::connect();

$users = [
    ['Admin Pro', 'admin@robotix.com', 'admin123', 'admin'],
    ['Laura Writer', 'laura@robotix.com', 'pass123', 'writer'],
    ['Carlos Dev', 'carlos@robotix.com', 'pass123', 'writer'],
    ['Dani Lector', 'dani@robotix.com', 'pass123', 'subscriber'],
    ['Elena Fan', 'elena@robotix.com', 'pass123', 'subscriber']
];

echo "--- Sembrando Usuarios ---\n";

foreach ($users as $u) {
    // Verificamos si existe para no duplicar
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$u[1]]);
    if ($stmt->fetch()) {
        echo "Usuario {$u[0]} ya existe.\n";
        continue;
    }

    $passHash = password_hash($u[2], PASSWORD_DEFAULT); // Encriptamos la contraseña
    $sql = "INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)";
    $db->prepare($sql)->execute([$u[0], $u[1], $passHash, $u[3]]);
}

echo "Usuarios creados";
