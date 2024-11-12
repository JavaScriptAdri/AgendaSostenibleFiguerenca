<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../../public/php/controlLogin.php');

// Connexió a la base de dades
$mysqli = new mysqli("172.19.0.2", "admin", "admin", "agenda_figuerenca_db");

// Comprova si la connexió ha fallat
if ($mysqli->connect_error) {
    die("Connexió fallida: " . $mysqli->connect_error);
}

// Inicialitza les variables per evitar errors d'ús indefinit
$nom = $cognoms = $email = $imatge_perfil = $rol = "";

// Verifica si l'usuari està autenticat
if (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera les dades de l'usuari, incloent el rol
$id = $_SESSION['usuari_id'];
$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil, rol FROM usuaris WHERE id = ?");

if ($stmt) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nom, $cognoms, $email, $imatge_perfil, $rol);
    $stmt->fetch();
    $stmt->close();
} else {
    die("Error en la preparació de la consulta: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil d'usuari</title>
    <link rel="stylesheet" href="../../public/css/perfil.css">
</head>
<body>
    <div class="top_llegenda">
        <!-- Botons de navegació -->
    </div>

    <h1>Benvingut/da, <?php echo htmlspecialchars($nom); ?>!</h1>
    <p>Nom complet: <?php echo htmlspecialchars($nom . " " . $cognoms); ?></p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>

    <?php if ($imatge_perfil): ?>
        <img src="/uploads/<?php echo htmlspecialchars($imatge_perfil); ?>" alt="Imatge de perfil" width="150">
    <?php else: ?>
        <p>No tens una imatge de perfil establerta.</p>
    <?php endif; ?>

    <br>
    <a href="editar_perfil.php">Edita el teu perfil</a>
    <br><br>
    <a href="/src/views/logout.php">Tancar sessió</a>

    <?php if ($rol === "administrador"): ?>
        <br><br>
        <a href="admin_panel.php"><button>Panell d'Administració</button></a>
    <?php endif; ?>
</body>
</html>
