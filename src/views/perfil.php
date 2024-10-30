<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuari'])) {
    // Redirigeix a la pàgina d'inici si l'usuari no està registrat
    header('Location: ../../public/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/estilsDelIndex.css">
</head>
<body>
    <div class="top_llegenda">
        <h1>Perfil d'Usuari</h1>
        <p>Benvigut, <?php echo htmlspecialchars($_SESSION['usuari']); ?>!</p>
        <a href="php/tancarSesio.php"><button title="Tancar sessió">Tancar sessió</button></a>
    </div>
    
    <!-- Altres continguts del perfil -->

</body>
</html>
