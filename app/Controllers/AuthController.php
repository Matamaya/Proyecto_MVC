<?php
require_once dirname(__DIR__) . '/Models/User.php';

class AuthController {

    // Muestra el formulario de Login
    public function login() {
        $rootPath = dirname(__DIR__);
        
        // Si se envían datos (POST), intentamos loguear
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLogin();
        } else {
            // Si es GET, solo mostramos la vista
            require_once $rootPath . '/views/layout/header.php';
            require_once $rootPath . '/views/auth/login.php';
            require_once $rootPath . '/views/layout/footer.php';
        }
    }

    // Muestra el formulario de Registro
    public function register() {
        $rootPath = dirname(__DIR__);

        // Si se envían datos (POST), intentamos registrar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processRegister();
        } else {
            require_once $rootPath . '/views/layout/header.php';
            require_once $rootPath . '/views/auth/register.php';
            require_once $rootPath . '/views/layout/footer.php';
        }
    }

    // Lógica para procesar el Login
    private function processLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            // Login correcto: Iniciamos sesión
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirigir al Home
            header('Location: ' . BASE_URL . '/public');
            exit;
        } else {
            // Error
            echo "<div class='bg-red-500 text-white p-4 text-center'>Credenciales incorrectas</div>";
        }
    }

    // Lógica para procesar el Registro
    private function processRegister() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        
        // Intentamos crear el usuario
        if ($userModel->create(['username' => $username, 'email' => $email, 'password' => $password])) {
            // Registro exitoso: redirigir al login
            header('Location: ' . BASE_URL . '/public/auth/login');
            exit;
        } else {
            echo "<div class='bg-red-500 text-white p-4 text-center'>Error al registrar. El email ya existe.</div>";
        }
    }

    // Cerrar sesión
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/public');
        exit;
    }
}