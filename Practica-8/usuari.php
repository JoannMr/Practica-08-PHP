<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pàgina Usuari</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page-container">
        <h1>Benvingut, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Permís de visualització</p>
        <a href="logout.php">Tancar Sessió</a>
    </div>
</body>
</html>
