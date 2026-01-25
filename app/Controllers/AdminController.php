<?php
require_once dirname(__DIR__) . '/Models/User.php';
require_once dirname(__DIR__) . '/Models/Post.php';
require_once dirname(__DIR__) . '/Models/Comment.php';
require_once dirname(__DIR__) . '/Models/Category.php';

class AdminController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        // Middleware de Auth y Rol
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . '/public');
            exit;
        }
    }

    public function index() {
        // Dashboard Stats
        $userModel = new User();
        $postModel = new Post();
        $commentModel = new Comment();

        $stats = [
            'users' => count($userModel->getAll()),
            'posts' => count($postModel->getAll()),
            'comments' => count($commentModel->getAll())
        ];

        $this->render('dashboard', ['stats' => $stats]);
    }

    // --- USERS MANAGEMENT ---
    public function users() {
        $userModel = new User();
        $users = $userModel->getAll();
        $this->render('users', ['users' => $users]);
    }

    public function deleteUser($id) {
        $userModel = new User();
        $userModel->delete($id);
        header('Location: ' . BASE_URL . '/public/admin/users');
        exit;
    }

    public function editUser($id) {
        $userModel = new User();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'role_id' => $_POST['role_id']
            ];
            $userModel->update($id, $data);
            header('Location: ' . BASE_URL . '/public/admin/users');
            exit;
        }

        $user = $userModel->findById($id);
        $this->render('user_form', ['user' => $user]);
    }


    // --- POSTS MANAGEMENT - DELEGATED TO PostController ---
    public function posts() {
        // Redirigir a la gestión unificada en PostController
        header('Location: ' . BASE_URL . '/public/post/manage');
        exit;
    }

    public function createPost() {
        header('Location: ' . BASE_URL . '/public/post/create');
        exit;
    }

    public function editPost($id) {
        header('Location: ' . BASE_URL . '/public/post/edit/' . $id);
        exit;
    }

    public function deletePost($id) {
        $postModel = new Post();
        $postModel->delete($id); // O redirigir a post/delete si existe, pero post/delete es una acción
        // Como PostController::delete redirige, podemos llamar al modelo aquí y redirigir
        header('Location: ' . BASE_URL . '/public/post/manage');
        exit;
    }

    public function togglePost($id) {
        $postModel = new Post();
        $postModel->toggleStatus($id);
        header('Location: ' . BASE_URL . '/public/post/manage');
        exit;
    }

    // --- COMMENTS MANAGEMENT ---
    public function comments() {
        $commentModel = new Comment();
        $comments = $commentModel->getAll();
        $this->render('comments', ['comments' => $comments]);
    }

    public function deleteComment($id) {
        $commentModel = new Comment();
        $commentModel->delete($id);
        header('Location: ' . BASE_URL . '/public/admin/comments');
        exit;
    }

    // Helper para renderizar vistas de admin
    private function render($view, $data = []) {
        extract($data);
        $rootPath = dirname(__DIR__); // app
        // Usamos el layout principal pero cargamos la vista de admin
        require_once $rootPath . '/views/layout/header.php';
        require_once $rootPath . '/views/admin/' . $view . '.php'; // Vistas en app/views/admin/
        require_once $rootPath . '/views/layout/footer.php';
    }
}
