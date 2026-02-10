<?php
// Ajuste de rutas para la estructura /app
require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Comment.php';

class PostController
{
    // Helper para renderizar vistas
    protected function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../Views/' . $view;
    }

    public function index()
    {
        $postModel = new Post();
        $posts = $postModel->getAll();
        $this->render('posts/index.php', compact('posts'));
    }

    public function show($id)
    {
        $postModel = new Post();
        $commentModel = new Comment();

        $post = $postModel->findById($id);
        $comments = $commentModel->getByPostId($id);

        if (!$post) {
            header("Location: index.php");
            exit;
        }

        $this->render('posts/show.php', compact('post', 'comments'));
    }

    // Formulario de creación
    public function create()
    {
        // Control de Acceso (Solo Admin o Writer)
        if (!in_array($_SESSION['role'] ?? '', ['admin', 'writer'])) {
            header("Location: index.php");
            exit;
        }
        $this->render('posts/create.php');
    }

    // Guardar Post + IMAGEN + WEBHOOK
    public function store()
    {
        if (!in_array($_SESSION['role'] ?? '', ['admin', 'writer'])) {
            header("Location: index.php");
            exit;
        }

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $userId = $_SESSION['user_id'];
        $imageUrl = null; // Por defecto nulo

        if ($title === '' || $content === '') {
            $error = "Campos obligatorios";
            return $this->render('posts/create.php', compact('error'));
        }

        // --- SUBIDA DE IMAGEN ---
        try {
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploader = new ImageUploader();
                $imageUrl = $uploader->upload($_FILES['image']);
            }

            $postModel = new Post();
            $postId = $postModel->create($title, $content, $userId, $imageUrl);

            // 3. ENVIAR AL WEBHOOK
            $summary = substr(strip_tags($content), 0, 150) . '...';
            $link = "http://localhost:8080/index.php?action=show_post&id=" . $postId;
            $fullImageUrl = $imageUrl ? "http://localhost:8080/" . $imageUrl : "";

            // --- WEBHOOK A n8n ---
            $this->sendWebhook('N8N_WEBHOOK_POST_CREATED', [
                'id' => $postId,
                'title' => $title,
                'summary' => $summary,    // el cuerpo del email
                'link' => $link,          // el botón "Leer más"
                'image_url' => $fullImageUrl // ruta completa para que se vea la foto
            ]);

            header("Location: index.php");

        } catch (Exception $e) {
            // Si falla la subida o la BD, volvemos al formulario con el error
            $error = $e->getMessage();
            return $this->render('posts/create.php', compact('error'));
        }
    }

    // Formulario de edición
    public function edit($id)
    {
        // 1. Verificar sesión
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $postModel = new Post();
        $post = $postModel->findById($id);

        if (!$post) {
            header("Location: index.php");
            exit;
        }

        // 2. Verificar permisos: Solo Admin o el Dueño del post
        $isOwner = ($post['user_id'] == $_SESSION['user_id']);
        $isAdmin = ($_SESSION['role'] === 'admin');

        if (!$isOwner && !$isAdmin) {
            header("Location: index.php");
            exit;
        }

        $this->render('posts/edit.php', compact('post'));
    }

    // Actualizar Post
    public function update($id)
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        $postModel = new Post();
        $post = $postModel->findById($id);

        // Verificar permisos nuevamente antes de guardar
        $isOwner = ($post['user_id'] == $_SESSION['user_id']);
        $isAdmin = ($_SESSION['role'] === 'admin');

        if (!$isOwner && !$isAdmin) {
            header("Location: index.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            // Mantenemos la imagen vieja por defecto
            $imageUrl = $post['image_url'];


            try {
                // Si el usuario sube una NUEVA imagen, la procesamos
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploader = new ImageUploader();
                    $imageUrl = $uploader->upload($_FILES['image']);
                }

                // NOTA: Asegúrate de actualizar app/Models/Post.php para soportar esto:
                $postModel->update($id, $title, $content, $imageUrl);

                header("Location: index.php?action=show_post&id=" . $id);

            } catch (Exception $e) {
                $error = $e->getMessage();
                $this->render('posts/edit.php', compact('post', 'error'));
            }
        }
    }

    // Eliminar Post
    public function delete($id)
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        $postModel = new Post();
        $post = $postModel->findById($id);

        $isOwner = ($post['user_id'] == $_SESSION['user_id']);
        $isAdmin = ($_SESSION['role'] === 'admin');

        if ($isOwner || $isAdmin) {
            $postModel->delete($id);
            // Opcional: Disparar webhook de borrado si quisieras
        }

        // Si venimos del admin, volver al admin, si no, al home
        if ($isAdmin && strpos($_SERVER['HTTP_REFERER'] ?? '', 'admin') !== false) {
            header("Location: index.php?action=admin_posts");
        } else {
            header("Location: index.php");
        }
    }

    // Helper privado para enviar webhook
    private function sendWebhook($envVar, $data)
    {
        $url = getenv($envVar);
        $token = getenv('N8N_SHARED_TOKEN');

        if ($url) {
            $client = new HttpClient();
            $client->post($url, [
                'headers' => ['X-Shared-Token' => $token],
                'json' => $data
            ]);
        }
    }
}
?>