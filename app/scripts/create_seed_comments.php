<?php
$password = password_hash("Admin123!", PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (email, password_hash, role) VALUES
    (?, ?, ?)");
$stmt->execute(['admin@example.com', $password, 'admin']);
