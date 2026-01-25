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
            $content = trim(htmlspecialchars($_POST['content'] ?? ''));

            if ($postId && !empty($content)) {
                $imageUrl = null;
                // Manejo de Imagen opcional para comentario
                if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                     try {
                        require_once dirname(__DIR__) . '/utils/ImageUploader.php';
                        // Instanciamos el uploader
                        // NOTA: Como el usuario dijo "ojo solo imagenes", el ImageUploader que creamos 
                        // YA valida que el tipo sea jpg, jpeg, png, o webp y nada más.
                        $uploader = new ImageUploader(); 
                        $imageUrl = $uploader->upload($_FILES['image']);
                    } catch (Exception $e) {
                         // Si falla la imagen, ¿qué hacemos?
                         // Podríamos redirigir con error. Por ahora, lo ignoramos o añadimos al error.
                         // Simplificación: si falla imagen, no se sube, pero el comentario sí.
                         // O podrías guardar el error en sesión.
                    }
                }

                $commentModel = new Comment();
                $commentModel->create($_SESSION['user_id'], $postId, $content, $imageUrl);
            }
            
            // 3. Redirigir de vuelta al producto
            header('Location: ' . BASE_URL . '/public/post/show/' . $postId);
            exit;
        }
    }
}