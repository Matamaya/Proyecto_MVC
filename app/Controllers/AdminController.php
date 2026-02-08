<?php
// Asegúrate de que las rutas coinciden con tu estructura /app
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Post.php';
require_once __DIR__ . '/../Models/Comment.php';

class AdminController {

    // Helper para cargar vistas (dentro de app/views)
    protected function render($view, $data = []) {
        extract($data);
        // Ajuste de ruta: estamos en app/Controllers, bajamos a app/views
        include __DIR__ . '/../Views/' . $view;
    }

    // Seguridad: Solo Admins
    private function requireAdmin() {
        if (($_SESSION['role'] ?? '') !== 'admin') {
            header("Location: index.php");
            exit;
        }
    }

    // --- DASHBOARD ---
    public function dashboard() {
        $this->requireAdmin();
        
        // Recopilamos estadísticas para las gráficas/tarjetas
        $userModel = new User();
        $postModel = new Post();
        $commentModel = new Comment();

        // Nota: En un proyecto real haríamos un método count() en el modelo 
        // para no traer todos los datos, pero esto sirve para la práctica.
        $stats = [
            'users' => count($userModel->getAll()),
            'posts' => count($postModel->getAll()),
            'comments' => count($commentModel->getAll() ?? [])
        ];

        $this->render('admin/dashboard.php', compact('stats'));
    }

    // --- GESTIÓN DE USUARIOS ---
    
    // Listar usuarios
    public function getUsers() {
        $this->requireAdmin();
        $userModel = new User();
        $users = $userModel->getAll();
        $this->render('admin/users.php', compact('users'));
    }

    // Mostrar formulario de edición de rol
    public function editUser($id) {
        $this->requireAdmin();
        $userModel = new User();
        $user = $userModel->findById($id);
        
        if (!$user) {
            header("Location: index.php?action=admin_users");
            exit;
        }

        $this->render('admin/user_form.php', compact('user'));
    }

    // Procesar la actualización del usuario
    public function updateUser($id) {
        $this->requireAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role'] ?? 'subscriber';
            
            $userModel = new User();
            $userModel->updateRole($id, $role);
            
            header("Location: index.php?action=admin_users");
            exit;
        }
    }

    // Borrar usuario
    public function deleteUser($id) {
        $this->requireAdmin();
        // Evitar que el admin se borre a sí mismo
        if ($id == $_SESSION['user_id']) {
            // Podrías añadir un mensaje de error aquí
            header("Location: index.php?action=admin_users");
            exit;
        }
        
        header("Location: index.php?action=admin_users");
    }

    // --- GESTIÓN DE POSTS ---

    // Listar posts (vista tabla)
    public function getPosts() {
        $this->requireAdmin();
        $postModel = new Post();
        $posts = $postModel->getAll(); // Reutilizamos el método que ya trae el nombre de usuario
        $this->render('admin/posts.php', compact('posts'));
    }

    // Borrar post desde el admin
    public function deletePost($id) {
        $this->requireAdmin();
        $postModel = new Post();
        $postModel->delete($id);
        header("Location: index.php?action=admin_posts");
    }

    // --- GESTIÓN DE COMENTARIOS ---

    // Listar comentarios (moderación)
    public function getComments() {
        $this->requireAdmin();
        $commentModel = new Comment();
        // Usamos el método especial que creamos para traer el título del post
        $comments = $commentModel->getAll(); 
        $this->render('admin/comments.php', compact('comments'));
    }

    // Borrar comentario (moderación)
    public function deleteComment($id) {
        $this->requireAdmin();
        $commentModel = new Comment();
        $commentModel->delete($id);
        header("Location: index.php?action=admin_comments");
    }
}
?>