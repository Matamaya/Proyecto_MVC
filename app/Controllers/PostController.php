<?php


class PostController
{
    public function index()
    {
        // Verificar si el usuario ha iniciado sesión
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "/public/auth/login");
            exit;
        }

        // Instancia el modelo
        $postModel = new Post();

        // Pide los datos
        $posts = $postModel->getAll();

        // Carga las vistas y les pasa los datos ($posts)
        require_once 'app/views/layout/header.php';
        require_once 'app/views/home.php';
        require_once 'app/views/layout/footer.php';
    }

    public function show($id)
    {
        $postModel = new Post();
        $post = $postModel->findById($id);

        if (!$post) {
            header("Location: " . BASE_URL . "/public/post/manage");
            exit;
        }

        // --- Cargar Comentarios ---
        require_once dirname(__DIR__) . '/Models/Comment.php'; // Importar modelo
        $commentModel = new Comment();
        $comments = $commentModel->getByPostId($id); // Obtener datos
        // ---------------------------------

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/app/views/layout/header.php';
        require_once $rootPath . '/app/views/posts/detail.php';
        require_once $rootPath . '/app/views/layout/footer.php';
    }

    // --- ADMINISTRACIÓN DE POSTS ---

    private function checkAdmin() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['error_message'] = "Acceso denegado.";
            header("Location: " . BASE_URL . "/public");
            exit;
        }
    }

    // Listado para gestión (Admin)
    public function manage() {
        $this->checkAdmin();
        $postModel = new Post();
        $posts = $postModel->getAll(); 

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/app/views/layout/header.php';
        require_once $rootPath . '/app/views/posts/index.php'; // Vista de tabla de gestión
        require_once $rootPath . '/app/views/layout/footer.php';
    }

    public function create() {
        $this->checkAdmin();
        
        require_once dirname(__DIR__) . '/Models/Category.php';
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/app/views/layout/header.php';
        require_once $rootPath . '/app/views/posts/create.php';
        require_once $rootPath . '/app/views/layout/footer.php';
    }

    public function store() {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitización básica de entrada
            $title = trim(htmlspecialchars($_POST['title'] ?? '')); // XSS prevent at source, though output encoding is better
            $content = trim(htmlspecialchars($_POST['content'] ?? ''));
            $price = filter_var($_POST['price'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $category_id = filter_var($_POST['category_id'] ?? '', FILTER_SANITIZE_NUMBER_INT);
            $specs = trim($_POST['specs'] ?? ''); // JSON raw string

            
            $errors = [];
            if (empty($title)) $errors[] = "El título es obligatorio";
            if (empty($content)) $errors[] = "El contenido es obligatorio";
            if ($price < 0) $errors[] = "El precio no puede ser negativo";
            if (empty($category_id)) $errors[] = "La categoría es obligatoria";

            // Manejo de Imagen
            $imageUrl = null;
            if (isset($_FILES['image'])) {
                try {
                    require_once dirname(__DIR__) . '/utils/ImageUploader.php';
                    $uploader = new ImageUploader();
                    // BASE_URL se usa dentro de la clase, asegurar que esté definida o pasarla
                    // La clase ImageUploader que creé usa BASE_URL.
                    $imageUrl = $uploader->upload($_FILES['image']);
                } catch (Exception $e) {
                     $errors[] = $e->getMessage();
                }
            }

            if (empty($errors)) {
                $postModel = new Post();
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'price' => $price,
                    'image_url' => $imageUrl,
                    'specs' => !empty($specs) ? $specs : null, 
                    'is_active' => 1,
                    'user_id' => $_SESSION['user_id'],
                    'category_id' => $category_id
                ];

                if ($postModel->create($data)) {
                    $_SESSION['success_message'] = "Publicación creada correctamente.";
                    header("Location: " . BASE_URL . "/public/post/manage");
                    exit;
                } else {
                    $errors[] = "Error al guardar en la base de datos.";
                }
            }

            // Si hay errores
            require_once dirname(__DIR__) . '/Models/Category.php';
            $categoryModel = new Category();
            $categories = $categoryModel->getAll();
            $old = $_POST;
            
            $rootPath = dirname(__DIR__, 2);
            require_once $rootPath . '/app/views/layout/header.php';
            require_once $rootPath . '/app/views/posts/create.php';
            require_once $rootPath . '/app/views/layout/footer.php';
        }
    }

    public function edit($id) {
        $this->checkAdmin();
        
        $postModel = new Post();
        $post = $postModel->findById($id);

        if (!$post) {
            header("Location: " . BASE_URL . "/public/post/manage");
            exit;
        }

        require_once dirname(__DIR__) . '/Models/Category.php';
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $rootPath = dirname(__DIR__, 2);
        require_once $rootPath . '/app/views/layout/header.php';
        require_once $rootPath . '/app/views/posts/edit.php';
        require_once $rootPath . '/app/views/layout/footer.php';
    }

    public function update($id) {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $title = trim(htmlspecialchars($_POST['title'] ?? ''));
            $content = trim(htmlspecialchars($_POST['content'] ?? ''));
            $price = filter_var($_POST['price'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $category_id = filter_var($_POST['category_id'] ?? '', FILTER_SANITIZE_NUMBER_INT);
            $specs = trim($_POST['specs'] ?? '');
            
            $errors = [];
            if (empty($title)) $errors[] = "El título es obligatorio";

            // Obtener post actual para imagen
            $postModel = new Post();
            $currentPost = $postModel->findById($id);

            // Manejo de Imagen
            $imageUrl = $currentPost['image_url'] ?? null;
            if (isset($_FILES['image'])) {
                try {
                    require_once dirname(__DIR__) . '/utils/ImageUploader.php';
                    $uploader = new ImageUploader();
                    // Pasar imagen existente es opcional segun mi logica actual, pero el uploader
                    // devuelve la nueva ruta si se sube.
                    $uploadedUrl = $uploader->upload($_FILES['image'], $imageUrl);
                    if ($uploadedUrl) {
                        $imageUrl = $uploadedUrl;
                    }
                } catch (Exception $e) {
                     $errors[] = $e->getMessage();
                }
            }

            if (empty($errors)) {
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'price' => $price,
                    'image_url' => $imageUrl,
                    'specs' => !empty($specs) ? $specs : null, 
                    'category_id' => $category_id
                ];

                if ($postModel->update($id, $data)) {
                    $_SESSION['success_message'] = "Publicación actualizada.";
                    header("Location: " . BASE_URL . "/public/post/manage");
                    exit;
                }
            }
             header("Location: " . BASE_URL . "/public/post/edit/" . $id);
        }
    }

    public function delete($id) {
        $this->checkAdmin();
        $postModel = new Post();
        $postModel->delete($id);
        $_SESSION['success_message'] = "Publicación eliminada.";
        header("Location: " . BASE_URL . "/public/post/manage");
        exit;
    }
}
