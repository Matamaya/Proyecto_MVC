<?php
require_once dirname(__DIR__) . '/Models/User.php';

class UserController {
    
    // Método para renderizar vistas
    protected function render($view, $data = []) {
        extract($data);
        include __DIR__ . '/../views/' . $view;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $pass = $_POST['password'];
            
            $userModel = new User();
            $user = $userModel->findByEmail($email);

            // Verificación simplificada
            if ($user && password_verify($pass, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role']; // 'admin', 'writer', 'subscriber'
                $_SESSION['username'] = $user['username'];
                
                header("Location: index.php?action=posts");
                exit;
            } else {
                $error = "Credenciales incorrectas.";
                return $this->render('auth/login.php', compact('error'));
            }
        }
        $this->render('auth/login.php');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $pass = $_POST['password'];
            $userModel = new User();

            if (empty($username) || empty($email) || empty($pass)) {
                $error = "Todos los campos son obligatorios.";
                return $this->render('auth/register.php', compact('error'));
            }

            $existingUser = $userModel->findByEmail($email);
            if ($existingUser) {
                $error = "El email ya está en uso.";
                return $this->render('auth/register.php', compact('error'));
            }
            
            // Hash y guardado
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            
            // Por defecto crea 'subscriber'
            $userModel->create($username, $email, $hash, 'subscriber');

            header("Location: index.php?action=login");
            exit;
        }
        $this->render('auth/register.php');
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>