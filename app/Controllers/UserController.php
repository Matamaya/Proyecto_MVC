<?php
require_once dirname(__DIR__) . '/Models/User.php';

class UserController {

    public function profile($id) {
        $userModel = new User();
        $user = $userModel->findById($id);

        if (!$user) {
            header('Location: ' . BASE_URL . '/public');
            exit;
        }

        // Traducir ID a texto para la vista
        $rolTexto = ($user['role_id'] == 1) ? 'Administrador' : 'Usuario';

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/views/layout/header.php';
        
        echo '<div class="container mx-auto mt-10 p-5 bg-white shadow rounded">';
        echo '<h1 class="text-2xl font-bold">Perfil de ' . htmlspecialchars($user['username']) . '</h1>';
        echo '<p>Email: ' . htmlspecialchars($user['email']) . '</p>';
        // CORRECCIÓN: Mostrar el texto traducido, no la columna que falta
        echo '<p>Rol: ' . $rolTexto . '</p>';
        echo '</div>';
        
        require_once $rootPath . '/views/layout/footer.php';
    }

    public function index() {
        session_start();
        // Esto funciona bien porque AuthController ya configuró $_SESSION['role'] como texto
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
            $rolDisplay = ($u['role_id'] == 1) ? 'Admin' : 'User';
            
            echo '<li>' . htmlspecialchars($u['username']) . 
                 ' (' . htmlspecialchars($u['email']) . ') - <strong>' . $rolDisplay . '</strong></li>';
        }
        echo '</ul></div>';
        
        require_once $rootPath . '/views/layout/footer.php';
    }
}