<?php

class ImageUploader {
    private $targetDir;
    private $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
    private $maxSize = 2097152; // 2MB

    public function __construct($targetDir = 'public/uploads/') {
        // Ajustamos la ruta relativa a la raíz del proyecto si es necesario
        // Asumimos que esta clase se usa desde index.php en la raíz o similar
        // Pero para estar seguros, usaremos rutas relativas al script de entrada o absolutas si se configuran.
        // Aquí asumiremos que 'public/uploads/' es accesible desde donde se llame (index.php).
        $this->targetDir = $targetDir;
        
        if (!file_exists($this->targetDir)) {
            mkdir($this->targetDir, 0777, true);
        }
    }

    public function upload($file, $existingImage = null) {
        // Validar si hubo error en la subida
        if ($file['error'] !== UPLOAD_ERR_OK) {
            // Si no se subió nada, devolvemos la imagen existente (si hay) o null
            if ($file['error'] === UPLOAD_ERR_NO_FILE) {
                return $existingImage;
            }
            throw new Exception("Error al subir el archivo. Código: " . $file['error']);
        }

        // Validar tamaño
        if ($file['size'] > $this->maxSize) {
            throw new Exception("El archivo es demasiado grande. Máximo 2MB.");
        }

        // Validar tipo por extensión
        $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileType, $this->allowedTypes)) {
            throw new Exception("Solo se permiten archivos JPG, JPEG, PNG y WEBP.");
        }

        // Validar tipo MIME real (Seguridad adicional)
        $mime = $file['type']; // Fallback inseguro si finfo no está disponible
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if ($finfo) {
                $mime = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
            }
        }

        $allowedMimes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!in_array($mime, $allowedMimes)) {
            throw new Exception("El archivo no es una imagen válida ($mime).");
        }

        // Generar nombre único
        $fileName = uniqid('img_', true) . '.' . $fileType;
        $targetFilePath = $this->targetDir . $fileName;

        // Mover archivo
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            // Devolver la URL relativa para guardar en BD
            // Asumimos que BASE_URL apunta a la raíz del proyecto.
            // Guardamos la ruta relativa desde la raiz web p.ej: '/public/uploads/img_....'
            return BASE_URL . '/' . $this->targetDir . $fileName;
        } else {
            throw new Exception("Hubo un error al guardar el archivo en el servidor.");
        }
    }
}
