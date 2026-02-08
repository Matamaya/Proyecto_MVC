<?php
// scripts/seed_comments.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Comentarios...\n";
$db = Database::connect();

$sql = "INSERT INTO comments (post_id, user_id, text) VALUES 
(1, 2, '¡Gran explicación! Me ha quedado muy claro.'),
(1, 3, '¿Podrías profundizar más en el patrón Singleton?'),
(2, 1, 'Docker es indispensable hoy en día.')";

try {
    $db->query($sql);
    echo "¡Comentarios creados!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>