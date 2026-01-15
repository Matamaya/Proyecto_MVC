<?php

//TODO: URL base del proyecto
define('BASE_URL', 'http://localhost:8080');

#Credenciales de Base de Datos (que coincidan con docker compose)
define('DB_HOST', 'db');           // db es el Nombre del servicio en docker-compose
define('DB_NAME', 'mvc_project');  // TODO: cambiar el nombre de mvc_project por RobotZ Store (nombre sujeto a cambio)
define('DB_USER', 'user');         // TODO: si cambio la config del compose, entonces esto debe de ser "admin"
define('DB_PASS', 'password');
#define('DB_CHARSET', 'utf8mb4');
?>