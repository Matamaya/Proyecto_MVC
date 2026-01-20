<?php


class PostController {
    public function index() {
        // Verificar si el usuario ha iniciado sesión
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "/public/auth/login");
            exit;
        }

        // Instancia el modelo
        $postModel = new Post();
        
        // Pide los datos
        $posts = $postModel->getAll();

        // Carga las vistas y les pasa los datos ($posts)
        require_once 'app/views/layout/header.php';
        require_once 'app/views/home.php';
        require_once 'app/views/layout/footer.php';
    }

    public function show($id) {
        $postModel = new Post();
        // Busca el robot por ID
        $post = $postModel->findById($id);

        // Si no existe, error 404
        if (!$post) {
            header("Location: " . BASE_URL);
            exit;
        }

        // Carga la vista de detalle
        require_once 'app/views/layout/header.php';
        require_once 'app/views/posts/detail.php';
        require_once 'app/views/layout/footer.php';
    }

}