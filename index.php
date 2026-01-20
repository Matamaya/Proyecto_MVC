<?php
// Cargar Configuración y Base de Datos
require_once 'app/Config/config.php';
require_once 'app/Config/Database.php';

// Autocarga de Clases (carga los archivos automáticamente)
spl_autoload_register(function ($class_name) {
    // Definir dónde buscar las clases
    $directories = [
        'app/',
        'app/Controllers/',
        'app/Models/'
    ];
    
    foreach ($directories as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once $directory . $class_name . '.php';
            return;
        }
    }
});

// Iniciar el Router
$init = new Router();