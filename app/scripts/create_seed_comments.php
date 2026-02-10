<?php
// scripts/seed_comments.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Comentarios...\n";
$db = Database::connect();

// IDs de usuarios (asegúrate que existan, 4 y 5 son los subscribers)
$comments = [
    [1, 4, '¡Excelente artículo! Muy claro.'],
    [1, 5, '¿Podrías profundizar más en JIT?'],
    [2, 4, 'El MVC me cambió la vida, gracias.'],
    [3, 5, 'Docker es complicado al principio, pero vale la pena.'],
    [3, 2, 'Totalmente de acuerdo.'],
    [4, 4, 'Buen recordatorio sobre seguridad.'],
    [5, 5, 'Tailwind es increíble, adiós Bootstrap.'],
    [6, 4, 'n8n ahorra muchísimo tiempo.'],
    [7, 5, 'Interesante enfoque del RAG.'],
    [8, 4, 'Gracias por los consejos de trabajo remoto.']
];

echo "--- Sembrando Comentarios ---\n";

foreach ($comments as $c) {
    $sql = "INSERT INTO comments (post_id, user_id, text) VALUES (?, ?, ?)";
    $db->prepare($sql)->execute([$c[0], $c[1], $c[2]]);
}
echo "comentarios creados";
