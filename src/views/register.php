<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'php/cookiePerDefecte.php'; // Inclou el fitxer que crea la cookie per defecte
include '../connexio.php'; // Inclou el fitxer de connexió a la base de dades
include 'php/controlRegistre.php';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra't</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Registra't</h2>
        <form action="php/register.php" method="POST" class="register-form">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="cognoms" placeholder="Cognoms" required>
            <input type="text" name="nom_dusuari" placeholder="Nom d'usuari" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit">Registrar-se</button>
        </form>
    </div>
</body>
</html>
