# PHP MVC Blog: Arquitectura, IA y Automatización

Plataforma web completa desarrollada con arquitectura **MVC pura en PHP**, contenerizada con **Docker**, e integrada con **Inteligencia Artificial (RAG)** y automatización de flujos mediante **n8n**.

![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Enabled-2496ED?style=flat&logo=docker&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-Dark_Mode-38B2AC?style=flat&logo=tailwindcss&logoColor=white)
![n8n](https://img.shields.io/badge/n8n-Automation-FF6584?style=flat&logo=n8n&logoColor=white)

## Descripción del Proyecto

Este proyecto simula un entorno de producción real donde se separan responsabilidades mediante el patrón Modelo-Vista-Controlador. No utiliza frameworks (como Laravel o Symfony) para demostrar el dominio de los fundamentos de PHP, enrutamiento y gestión de bases de datos.

### Características Principales

* **Arquitectura MVC:** Separación clara de lógica (Controllers), datos (Models) y diseño (Views).
* **Módulo RAG (IA):** Chatbot integrado que responde preguntas basándose *únicamente* en el contenido de los posts publicados, utilizando búsquedas `FULLTEXT` para recuperar contexto.
* **Automatización n8n:** Sistema de Webhooks que notifica eventos (nuevos posts/comentarios) a un servidor n8n externo.
* **Seguridad Robusta:**
    * **Anti-SQL Injection:** Uso estricto de PDO y Sentencias Preparadas.
    * **Anti-XSS:** Sanitización de salida con `htmlspecialchars`.
    * **Anti-CSRF:** Acciones destructivas protegidas bajo método `POST`.
    * **Auth:** Sistema de Login, Registro y Roles (Admin, Writer, Subscriber).

---

## Instalación y Despliegue

El proyecto está totalmente dockerizado para un despliegue en un solo comando.

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/tu-usuario/tu-repo.git](https://github.com/tu-usuario/tu-repo.git)
    cd tu-repo
    ```

2.  **Iniciar contenedores:**
    ```bash
    docker compose up -d --build
    ```
    *La base de datos se inicializa automáticamente con `database.sql`.*

3.  **Acceso a Servicios:**
    * **Aplicación Web:** [http://localhost:8080](http://localhost:8080)
    * **n8n Automation:** [http://localhost:5678](http://localhost:5678)
    * **phpMyAdmin:** [http://localhost:8081](http://localhost:8081)

---

## Estructura del Proyecto

```text
/
├── app/
│   ├── Config/       # Conexión a Base de Datos (Singleton)
│   ├── Controllers/  # Lógica de negocio (Admin, Post, User, RAG)
│   ├── Models/       # Acceso a datos y lógica de búsqueda (Retriever)
│   ├── Utils/        # Clientes HTTP, Uploaders, Mock LLM
│   └── Views/        # Plantillas HTML/PHP con TailwindCSS
├── public/
│   ├── img/          # Imágenes subidas y assets
│   ├── index.php     # Front Controller (Enrutador único)
│   └── .htaccess     # Redirección de tráfico al Front Controller
├── docker-compose.yml # Orquestación de servicios
└── Dockerfile         # Configuración de imagen PHP personalizada

---
## Glosario de Métodos MVC

Para entender el flujo de datos dentro de los Controladores, se utilizan las siguientes convenciones estándar:

### Renderizado
* **`render($view, $data)`**:
    * Método auxiliar encargado de la capa de presentación.
    * Recibe el nombre de la vista (ej: `posts/index.php`) y un array de datos.
    * Utiliza `extract()` para convertir las claves del array en variables nativas de PHP accesibles dentro de la vista HTML.

### Flujo de Creación (RESTful)
En la arquitectura MVC, la creación de un recurso se divide en dos pasos lógicos:

1.  **`create()` (Verbo HTTP: GET)**:
    * **Responsabilidad:** Interfaz de Usuario.
    * **Acción:** Carga y muestra el formulario HTML vacío para que el usuario introduzca datos.
    * No interactúa con la base de datos para guardar nada.

2.  **`store()` (Verbo HTTP: POST)**:
    * **Responsabilidad:** Lógica de Negocio y Persistencia.
    * **Acción:** Recibe los datos enviados por el formulario (`$_POST`), realiza validaciones de seguridad y llama al **Modelo** para insertar la información en la base de datos.
    * Finalmente, redirige al usuario a otra página para evitar reenvíos de formulario duplicados.

### Métodos del Modelo
* **`Model::create()`**: A diferencia del controlador, este método ejecuta la sentencia SQL `INSERT INTO` pura mediante PDO Prepared Statements. Es invocado por el método `store()` del controlador.