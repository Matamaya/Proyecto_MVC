<?php
class AboutController {
    public function index() {
        // Renderizar la vista
        require_once 'app/views/layout/header.php';
        require_once 'app/views/about.php';
        require_once 'app/views/layout/footer.php';
    }
}
