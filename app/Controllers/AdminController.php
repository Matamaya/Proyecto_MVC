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


    // --- POSTS MANAGEMENT ---
    public function posts() {
        $postModel = new Post();
        $posts = $postModel->getAll();
        $this->render('posts', ['posts' => $posts]);
    }

    public function createPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postModel = new Post();
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'price' => $_POST['price'],
                'user_id' => $_SESSION['user_id'], // Admin crea el post
                'category_id' => $_POST['category_id'],
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
            // Specs como JSON simple por ahora
            if (!empty($_POST['specs'])) {
                $data['specs'] = $_POST['specs']; // Asumimos que viene como string válido o lo procesamos
            }

            $postModel->create($data);
            header('Location: ' . BASE_URL . '/public/admin/posts');
            exit;
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $this->render('post_form', ['categories' => $categories]);
    }

    public function editPost($id) {
        $postModel = new Post();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'price' => $_POST['price'],
                'category_id' => $_POST['category_id']
            ];
             if (!empty($_POST['specs'])) {
                $data['specs'] = $_POST['specs'];
            }
            
            $postModel->update($id, $data);
            header('Location: ' . BASE_URL . '/public/admin/posts');
            exit;
        }

        $post = $postModel->findById($id);
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $this->render('post_form', ['post' => $post, 'categories' => $categories]);
    }

    public function deletePost($id) {
        $postModel = new Post();
        $postModel->delete($id);
        header('Location: ' . BASE_URL . '/public/admin/posts');
        exit;
    }

    public function togglePost($id) {
        $postModel = new Post();
        $postModel->toggleStatus($id);
        header('Location: ' . BASE_URL . '/public/admin/posts');
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
