<?php
// app/Controllers/AboutController.php

class AboutController {
    public function index() {
        // Renderizar la vista
        require_once '../views/layout/header.php';
        require_once '../views/about.php';
        require_once '../views/layout/footer.php';
    }
}
