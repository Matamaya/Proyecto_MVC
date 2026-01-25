<?php
// Prevent directory listing 403 by handling the request
// Redirect to root or handle as app entry if intended
require_once __DIR__ . '/../app/Config/config.php';
header("Location: " . BASE_URL);
exit;
