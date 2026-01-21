<?php
require_once dirname(__DIR__) . '/Models/User.php';

class AuthController {

    public function login() {
        $rootPath = dirname(__DIR__);
        $errors = [];
        $old = [];

        // Iniciar sesión si no está iniciada para verificar mensajes flash
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['success_message'])) {
            $success = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = $_POST; // Guardar datos antiguos para repoblar formulario
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email)) {
                $errors[] = "El email es obligatorio.";
            }
            if (empty($password)) {
                $errors[] = "La contraseña es obligatoria.";
            }

            if (empty($errors)) {
                $userModel = new User();
                $user = $userModel->findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Regenerar ID de sesión por seguridad
                    session_regenerate_id(true);
                    
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    
                    if (isset($user['role_id']) && $user['role_id'] == 1) {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'user';
                    }
                    
                    header('Location: ' . BASE_URL . '/public');
                    exit;
                } else {
                    $errors[] = "Credenciales incorrectas.";
                }
            }
        }

        // Cargar vista con errores y datos antiguos
        require_once $rootPath . '/views/layout/header.php';
        require_once $rootPath . '/views/auth/login.php';
        require_once $rootPath . '/views/layout/footer.php';
    }

    public function register() {
        $rootPath = dirname(__DIR__);
        $errors = [];
        $old = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = $_POST;
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // 1. Validaciones
            if (empty($username)) {
                $errors[] = "El nombre de usuario es obligatorio.";
            }
            
            if (empty($email)) {
                $errors[] = "El email es obligatorio.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "El formato del email no es válido.";
            }

            if (empty($password)) {
                $errors[] = "La contraseña es obligatoria.";
            } elseif (strlen($password) < 6) {
                $errors[] = "La contraseña debe tener al menos 6 caracteres.";
            }

            // 2. Comprobar si existe usuario
            if (empty($errors)) {
                $userModel = new User();
                
                if ($userModel->findByEmail($email)) {
                    $errors[] = "El email ya está registrado.";
                }
                
                // Opcional: Validar username único si se desea
                // if ($userModel->findByUsername($username)) {
                //    $errors[] = "El nombre de usuario ya está en uso.";
                // }

                if (empty($errors)) {
                    // 3. Crear usuario
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $datosUsuario = [
                        'username' => $username, 
                        'email'    => $email, 
                        'password' => $passwordHash, 
                        'role_id'  => 2 
                    ];

                    if ($userModel->create($datosUsuario)) {
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $_SESSION['success_message'] = "Cuenta creada con éxito. Por favor inicia sesión.";
                        header('Location: ' . BASE_URL . '/public/auth/login');
                        exit;
                    } else {
                        $errors[] = "Ocurrió un error al registrar el usuario. Inténtalo de nuevo.";
                    }
                }
            }
        }

        require_once $rootPath . '/views/layout/header.php';
        require_once $rootPath . '/views/auth/register.php';
        require_once $rootPath . '/views/layout/footer.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ' . BASE_URL . '/public');
        exit;
    }
}
