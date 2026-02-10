<?php
// scripts/seed_posts.php
require_once __DIR__ . '/../Config/Database.php';

echo "Sembrando Posts...\n";
$db = Database::connect();


// IDs asumiendo que Laura es ID 2 y Carlos es ID 3 (ajustar si es necesario)
$u2 = 2;
$u3 = 3;

$posts = [
    [$u2, 'El futuro de PHP en 2025', 'PHP sigue vivo y más rápido que nunca. Con la llegada de PHP 8.3 y JIT, el rendimiento ha mejorado notablemente.', 'https://images.unsplash.com/photo-1599507593499-a3f7d7d97663?auto=format&fit=crop&w=800&q=80'],
    [$u3, 'Entendiendo la arquitectura MVC', 'Model-View-Controller es fundamental. Separa la lógica de la vista, permitiendo un código limpio y mantenible.', 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=80'],
    [$u2, 'Docker para principiantes', 'Docker permite empaquetar tu aplicación en contenedores. Olvídate del "en mi máquina funciona".', 'https://images.unsplash.com/photo-1605745341112-85968b19335b?auto=format&fit=crop&w=800&q=80'],
    [$u3, 'Seguridad Web: Evitando XSS y SQL Injection', 'Sanitizar inputs y usar sentencias preparadas es obligatorio. Nunca confíes en el usuario.', 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80'],
    [$u2, 'Introducción a Tailwind CSS', 'CSS utilitario que acelera el desarrollo. Puedes construir interfaces modernas sin salir de tu HTML.', 'https://images.unsplash.com/photo-1507721999472-8ed4421c4af2?auto=format&fit=crop&w=800&q=80'],
    [$u3, 'Automatización con n8n', 'Conecta tus aplicaciones sin código. Webhooks, triggers y flujos de trabajo automatizados.', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80'],
    [$u2, 'Bases de Datos Vectoriales y RAG', 'Cómo implementar búsqueda semántica en MySQL usando índices FULLTEXT para mejorar la IA.', 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80'],
    [$u3, 'Trabajo remoto como desarrollador', 'Consejos para mantener la productividad y la salud mental trabajando desde casa.', 'https://images.unsplash.com/photo-1593642632823-8f78536788c6?auto=format&fit=crop&w=800&q=80'],
    [$u2, 'APIs REST vs GraphQL', 'Diferencias clave. REST usa endpoints fijos, GraphQL permite pedir exactamente lo que necesitas.', 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&w=800&q=80'],
    [$u3, 'Optimización de MySQL', 'Índices, EXPLAIN y buenas prácticas para que tus consultas vuelen.', 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=800&q=80']
];

// Asumimos que el usuario con ID 1 o 2 existe (Admin o Writer)
$sql = "INSERT INTO posts (user_id, title, content, image_url) VALUES (?, ?, ?, ?)";

foreach ($posts as $p) {
    $sql = "INSERT INTO posts (user_id, title, content, image_url) VALUES (?, ?, ?, ?)";
    $db->prepare($sql)->execute([$p[0], $p[1], $p[2], $p[3]]);
}
echo "Posts creados";
