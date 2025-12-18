<?php
// public/index.php

// Cargar Configuración y Base de Datos
require_once '../app/Config/config.php';
require_once '../app/Config/Database.php';

// Cargar Controladores (Normalmente esto se hace con Autoload, pero manual sirve por ahora)
require_once '../app/Controllers/PostController.php';

// Obtener la URL
$url = $_GET['url'] ?? '/';
$url = rtrim($url, '/');
$url = explode('/', $url);

// Enrutamiento Básico
switch ($url[0]) {
    case '':
    case 'home':
        $controller = new PostController();
        $controller->index();
        break;

    // Aquí agregaremos 'login' y 'register' más adelante
        
    default:
        http_response_code(404);
        echo "404 - Página no encontrada";
        break;
}