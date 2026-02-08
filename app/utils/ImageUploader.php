<?php
class ImageUploader {
    // Carpeta destino (relativa a index.php)
    private $targetDir = "public/uploads/";
    private $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    private $maxSize = 2 * 1024 * 1024; // 2MB

    public function upload($file) {
        // 1. Verificamos si hay archivo y si no hubo error en la subida
        if (!isset($file['name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null; // No se subió nada o hubo error
        }

        // 2. Validar tamaño
        if ($file['size'] > $this->maxSize) {
            throw new Exception("El archivo es demasiado grande. Máximo 2MB.");
        }

        // 3. Validar extensión
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExt, $this->allowedTypes)) {
            throw new Exception("Formato no permitido. Solo JPG, PNG, WEBP.");
        }

        // 4. Generar nombre único (para evitar sobreescribir)
        $fileName = uniqid() . '.' . $fileExt;
        $targetPath = $this->targetDir . $fileName;

        // 5. Crear carpeta si no existe
        if (!is_dir($this->targetDir)) {
            mkdir($this->targetDir, 0755, true);
        }

        // 6. Mover archivo
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath; // Devolvemos la ruta para guardar en BD
        } else {
            throw new Exception("Error al mover el archivo al servidor.");
        }
    }
}
?>