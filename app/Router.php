<?php

class Router {
    protected $controller = 'PostController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // 1. Limpiar 'public' de la URL si aparece
        if (isset($url[0]) && $url[0] === 'public') {
            array_shift($url);
        }

        // 2. Buscar Controlador
        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            
            // USO DE __DIR__: Esto busca en "app/Controllers/" directamente
            if (file_exists(__DIR__ . '/Controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        // 3. Importar el controlador (Ruta absoluta)
        require_once __DIR__ . '/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 4. Buscar Método
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // 5. Parámetros
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}