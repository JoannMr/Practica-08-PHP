<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sistema_acces';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Preparar consulta segura
$stmt = $conn->prepare("SELECT * FROM usuaris WHERE nom_usuari = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si existe el usuario
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['contrasenya'])) {
        $_SESSION['username'] = $user['nom_usuari'];
        $_SESSION['role'] = $user['rol'];

        // Redirigir según el rol
        if ($user['rol'] === 'Administrador') {
            header("Location: admin.php");
        } else {
            header("Location: usuari.php");
        }
        exit();
    } else {
        echo "Contrasenya incorrecta.";
    }
} else {
    echo "Usuari no trobat.";
}
$stmt->close();
$conn->close();
?>
