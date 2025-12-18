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
}