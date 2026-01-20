<?php
require_once dirname(__DIR__) . '/Models/User.php';

class UserController {

    // Ver perfil de un usuario (Ej: /public/user/profile/1)
    public function profile($id) {
        $userModel = new User();
        $user = $userModel->findById($id);

        if (!$user) {
            header('Location: ' . BASE_URL . '/public');
            exit;
        }

        // Cargamos la vista de perfil (La crearemos simple abajo)
        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/views/layout/header.php';
        // Podríamos crear views/user/profile.php, pero por ahora imprimimos simple
        echo '<div class="container mx-auto mt-10 p-5 bg-white shadow rounded">';
        echo '<h1 class="text-2xl font-bold">Perfil de ' . htmlspecialchars($user['username']) . '</h1>';
        echo '<p>Email: ' . htmlspecialchars($user['email']) . '</p>';
        echo '<p>Rol: ' . htmlspecialchars($user['role']) . '</p>';
        echo '</div>';
        require_once $rootPath . '/views/layout/footer.php';
    }

    // Listar usuarios (Solo para admins)
    public function index() {
        session_start();
        // Verificar si es admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . '/public');
            exit;
        }

        $userModel = new User();
        $users = $userModel->getAll();

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/views/layout/header.php';
        
        echo '<div class="container mx-auto mt-10 p-6 bg-white shadow rounded">';
        echo '<h2 class="text-2xl font-bold mb-4">Lista de Usuarios (Admin)</h2>';
        echo '<ul class="list-disc pl-5">';
        foreach($users as $u) {
            echo '<li>' . $u['username'] . ' (' . $u['email'] . ') - <strong>' . $u['role'] . '</strong></li>';
        }
        echo '</ul></div>';
        
        require_once $rootPath . '/views/layout/footer.php';
    }
}