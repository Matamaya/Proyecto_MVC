<?php
require_once '../app/Models/Post.php';

class PostController {
    public function index() {
        // Instancia el modelo
        $postModel = new Post();
        
        // Pide los datos
        $posts = $postModel->getAll();

        // Carga las vistas y les pasa los datos ($posts)
        require_once '../views/layout/header.php';
        require_once '../views/home.php';
        require_once '../views/layout/footer.php';
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
        require_once '../views/layout/header.php';
        require_once '../views/post/detail.php';
        require_once '../views/layout/footer.php';
    }

}