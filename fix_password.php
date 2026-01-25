<?php
// fix_password.php (Versión para el CLIENTE)

// 1. CONFIGURACIÓN
$host = 'db';
$db   = 'mvc_project';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
    echo "✅ Conexión establecida.<br>";
} catch (\PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// 2. DATOS DEL CLIENTE
$password_plana = 'pass123'; // <--- Ponemos una contraseña distinta para probar
$id_usuario_objetivo = 1;    // <--- IMPORTANTE: ID 2 (El usuario Cliente)

$hash_seguro = password_hash($password_plana, PASSWORD_DEFAULT);
echo "🔏 Nuevo Hash generado para Cliente: " . $hash_seguro . "<br>";

// 3. ACTUALIZAR EN LA BASE DE DATOS
$sql = "UPDATE users SET password = :pass WHERE id = :id";
$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute([
    'pass' => $hash_seguro,
    'id'   => $id_usuario_objetivo
]);

if ($resultado) {
    echo "<h1>🚀 ¡Contraseña de Cliente Actualizada!</h1>";
    echo "Usuario ID: $id_usuario_objetivo <br>";
    echo "Nueva contraseña: <b>$password_plana</b><br>";
    echo "<hr>";
    echo "<h3>¿Cómo probarlo?</h3>";
    echo "Edita tu archivo <b>test_login.php</b> y cambia el email a <i>cli@ente.com</i> (o el email que tenga el usuario 2) y la pass a <i>pass456</i>.";
} else {
    echo "❌ Error al actualizar. Verifica que el usuario con ID $id_usuario_objetivo realmente existe.";
}
