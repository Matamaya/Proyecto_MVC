<?php
require_once dirname(__DIR__) . '/Config/Database.php';

echo "Updating database schema...\n";

try {
    $db = Database::connect();
    
    // Check if role column exists
    $stmt = $db->query("SHOW COLUMNS FROM users LIKE 'role'");
    $exists = $stmt->fetch();
    
    if (!$exists) {
        // Add the column
        // We use VARCHAR or ENUM. Using ENUM as per database.sql update
        $sql = "ALTER TABLE users ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user'";
        $db->exec($sql);
        echo "[SUCCESS] Column 'role' added to 'users' table.\n";
    } else {
        echo "[INFO] Column 'role' already exists.\n";
    }

    // Ensure AdminRobot is admin
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute(['admin@robotics.com']);
    $admin = $stmt->fetch();

    if ($admin) {
        $update = $db->prepare("UPDATE users SET role = 'admin' WHERE id = ?");
        $update->execute([$admin['id']]);
        echo "[SUCCESS] Admin permissions granted to 'admin@robotics.com'.\n";
    } else {
        echo "[INFO] Admin user 'admin@robotics.com' not found. Skipping role update.\n";
    }

} catch (Exception $e) {
    echo "[ERROR] Database update failed: " . $e->getMessage() . "\n";
}
