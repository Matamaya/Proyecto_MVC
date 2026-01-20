<?php
require_once dirname(__DIR__) . '/Models/Comment.php';

class CommentController {

    // Método para guardar el comentario
    public function store() {
        // Iniciamos sesión para saber quién comenta
        if (session_status() === PHP_SESSION_NONE) session_start();

        // 1. Seguridad: ¿Está logueado?
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/public/auth/login');
            exit;
        }

        // 2. Recibir datos del POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'] ?? null;
            $content = $_POST['content'] ?? '';

            if ($postId && !empty($content)) {
                $commentModel = new Comment();
                $commentModel->create($_SESSION['user_id'], $postId, $content);
            }
            
            // 3. Redirigir de vuelta al producto
            header('Location: ' . BASE_URL . '/public/post/show/' . $postId);
            exit;
        }
    }
}