<?php
// index.php - EL ENRUTADOR PRINCIPAL

session_start();

// 1. Cargar Configuración y Utilidades
require_once 'app/Config/Database.php';
require_once 'app/Utils/HttpClient.php';
require_once 'app/Utils/ImageUploader.php';
require_once 'app/Utils/LLM.php';

// 2. Cargar Controladores
require_once 'app/Controllers/UserController.php';
require_once 'app/Controllers/PostController.php';
require_once 'app/Controllers/CommentController.php';
require_once 'app/Controllers/AdminController.php';
require_once 'app/Controllers/RagController.php';

// 3. Capturar la acción de la URL
$action = $_GET['action'] ?? 'posts'; // Por defecto vamos al listado de posts

// 4. Enrutamiento (Switch)
switch ($action) {
    // --- RUTAS PÚBLICAS (Blog) ---
    case 'posts':
        (new PostController())->index();
        break;
    case 'show_post':
        $id = $_GET['id'] ?? null;
        if ($id) (new PostController())->show($id);
        else header('Location: index.php');
        break;

    // --- AUTENTICACIÓN ---
    case 'login':
        (new UserController())->login();
        break;
    case 'register':
        (new UserController())->register();
        break;
    case 'logout':
        (new UserController())->logout();
        break;

    // --- GESTIÓN DE POSTS (Crear/Editar/Borrar) ---
    case 'create_post':
        (new PostController())->create();
        break;
    case 'store_post':
        (new PostController())->store();
        break;
    case 'edit_post':
        $id = $_GET['id'] ?? null;
        if ($id) (new PostController())->edit($id);
        break;
    case 'update_post':
        $id = $_GET['id'] ?? null;
        if ($id) (new PostController())->update($id);
        break;
    case 'delete_post':
        $id = $_GET['id'] ?? null;
        if ($id) (new PostController())->delete($id);
        break;

    // --- COMENTARIOS ---
    case 'store_comment':
        (new CommentController())->store();
        break;
    case 'delete_comment':
        $id = $_GET['id'] ?? null;
        if ($id) (new CommentController())->delete($id);
        break;

    // --- MÓDULO RAG (IA) ---
    case 'rag_ask':
        (new RagController())->ask();
        break;

    // --- PANEL DE ADMINISTRACIÓN ---
    case 'admin_dashboard':
        (new AdminController())->dashboard();
        break;
    // Usuarios
    case 'admin_users':
        (new AdminController())->getUsers();
        break;
    case 'admin_edit_user':
        $id = $_GET['id'] ?? null;
        if ($id) (new AdminController())->editUser($id);
        break;
    case 'admin_update_user':
        $id = $_GET['id'] ?? null;
        if ($id) (new AdminController())->updateUser($id);
        break;
    case 'admin_delete_user':
        $id = $_GET['id'] ?? null;
        if ($id) (new AdminController())->deleteUser($id);
        break;
    // Posts (Admin view)
    case 'admin_posts':
        (new AdminController())->getPosts();
        break;
    // Comentarios (Moderación)
    case 'admin_comments':
        (new AdminController())->getComments();
        break;
    case 'admin_delete_comment':
        // Reutilizamos la lógica del AdminController para borrar y volver al panel
        $id = $_GET['id'] ?? null;
        if ($id) (new AdminController())->deleteComment($id);
        break;

    // --- 404 ---
    default:
        echo "<h1>404 - Página no encontrada</h1>";
        echo "<a href='index.php'>Volver al inicio</a>";
        break;
}