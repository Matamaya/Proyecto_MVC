<?php
require_once dirname(__DIR__) . '/Models/Comment.php';

class CommentController {

    public function store() {
        if (empty($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $text = trim($_POST['text']);
        $postId = $_POST['post_id'];
        $userId = $_SESSION['user_id'];

        if ($text !== '') {
            $commentModel = new Comment();
            $commentModel->create($postId, $userId, $text);

            // --- WEBHOOK COMENTARIO CREADO ---
            $this->sendWebhook('N8N_WEBHOOK_COMMENT_CREATED', [
                'post_id' => $postId,
                'text' => $text,
                'user_id' => $userId
            ]);
        }

        header("Location: index.php?action=show_post&id=" . $postId);
    }

    public function delete($id) {
        $commentModel = new Comment();
        $comment = $commentModel->findById($id);

        // Permisos: Solo dueño o Admin
        $isOwner = ($comment['user_id'] == $_SESSION['user_id']);
        $isAdmin = ($_SESSION['role'] === 'admin');

        if ($isOwner || $isAdmin) {
            $commentModel->delete($id);

            // --- WEBHOOK COMENTARIO BORRADO ---
            $this->sendWebhook('N8N_WEBHOOK_COMMENT_DELETED', [
                'comment_id' => $id
            ]);
        }

        header("Location: index.php?action=show_post&id=" . $comment['post_id']);
    }

    private function sendWebhook($envVar, $data) {
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