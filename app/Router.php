<?php

class Router {
    protected $controller = 'PostController'; // Controlador por defecto (Home)
    protected $method = 'index';              // Método por defecto
    protected $params = [];                   // Parámetros (ej: id del robot)

    public function __construct() {
        $url = $this->getUrl();

        // 1. Buscar si existe el controlador en la URL (ej: /user/...)
        // La primera parte de la URL se asume como controlador
        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            if (file_exists('../app/Controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        // Importar el controlador
        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 2. Buscar el método (ej: /user/edit/...)
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 3. Los parámetros restantes (ej: el ID del robot)
        $this->params = $url ? array_values($url) : [];

        // Llama al método del controlador con los parámetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Función auxiliar para trocear la URL
    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return []; // Retorna array vacío si estamos en la home
    }
}