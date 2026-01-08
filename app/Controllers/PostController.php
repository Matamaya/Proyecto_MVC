<?php
// app/Controllers/PostController.php
require_once '../app/Models/Post.php';

class PostController {
    public function index() {
        // 1. Instancia el modelo
        $postModel = new Post();
        
        // 2. Pide los datos
        $posts = $postModel->getAll();

        // 3. Carga las vistas y les pasa los datos ($posts)
        require_once '../views/layout/header.php';
        require_once '../views/home.php';
        require_once '../views/layout/footer.php';
    }

    public function show($id) {
        // 1. Instancia el modelo
        $postModel = new Post();
        
        // 2. Busca el robot por ID
        $post = $postModel->findById($id);

        // Si no existe, error 404 (opcional, pero buena práctica)
        if (!$post) {
            header("Location: " . BASE_URL);
            exit;
        }

        // 3. Carga la vista de detalle
        require_once '../views/layout/header.php';
        require_once '../views/post/detail.php'; // Crearemos esta carpeta y archivo ahora
        require_once '../views/layout/footer.php';
    }

}