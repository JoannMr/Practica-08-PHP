<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrador') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina d'Administrador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page-container">
        <h1>Benvingut, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Permís de gestió</p>
        <a href="logout.php">Tancar Sessió</a>
    </div>
</body>
</html>
