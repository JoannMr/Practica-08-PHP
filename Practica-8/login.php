<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Iniciar Sessió</h1>
        <form action="process_login.php" method="post">
            <input type="text" name="username" placeholder="Nom d'usuari" required>
            <input type="password" name="password" placeholder="Contrasenya" required>
            <button type="submit">Login</button>
        </form>
        <div class="message">
            <p>Introdueix les teves credencials per accedir al sistema.</p>
        </div>
    </div>
</body>
</html>
