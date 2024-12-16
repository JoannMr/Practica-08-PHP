<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sistema_acces';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

// Crear la base de datos
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Crear la taula d'usuaris
$conn->query("
CREATE TABLE IF NOT EXISTS usuaris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_usuari VARCHAR(50) NOT NULL UNIQUE,
    contrasenya VARCHAR(255) NOT NULL,
    rol ENUM('Administrador', 'Usuari') NOT NULL
)");

// Insertar usuarios de prueba
$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser = password_hash("user123", PASSWORD_DEFAULT);

$conn->query("
INSERT INTO usuaris (nom_usuari, contrasenya, rol)
VALUES
    ('admin', '$passwordAdmin', 'Administrador'),
    ('usuari', '$passwordUser', 'Usuari')
ON DUPLICATE KEY UPDATE nom_usuari=VALUES(nom_usuari);
");

echo "Base de dades i usuaris creats correctament.";
$conn->close();
?>
