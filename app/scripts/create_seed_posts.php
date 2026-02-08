<?php
// scripts/seed_posts.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Posts...\n";
$db = Database::connect();

// Asumimos que el usuario con ID 1 o 2 existe (Admin o Writer)
$sql = "INSERT INTO posts (user_id, title, content, image_url) VALUES 
(1, 'Bienvenido al Blog MVC', 'Este es el primer post generado automáticamente. Muestra la arquitectura MVC.', 'https://placehold.co/600x400'),
(2, 'Introducción a Docker', 'Docker permite contenerizar aplicaciones para que funcionen igual en todas partes.', null),
(1, 'El futuro de la IA', 'La inteligencia artificial generativa (RAG) está cambiando el desarrollo web.', null)";

try {
    $db->query($sql);
    echo "¡Posts creados!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>