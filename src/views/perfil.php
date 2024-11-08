<?php
session_start();
if (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");
$id = $_SESSION['usuari_id'];

$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom, $cognoms, $email, $imatge_perfil);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil d'usuari</title>
    <link rel="stylesheet" href="/public/css/perfil.css">
</head>
<body>
    <div class="profile-container">
        <h1>Benvingut/da, <?php echo htmlspecialchars($nom); ?>!</h1>
        <div class="profile-body">
            <div class="profile-image">
                <!-- Mostrar la imagen de perfil -->
                <img src="<?php echo htmlspecialchars($imatge_perfil); ?>" alt="Imatge de perfil" class="profile-img">
            </div>
            <div class="profile-details">
                <p><strong>Nom complet:</strong> <?php echo htmlspecialchars($nom . " " . $cognoms); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            </div>
        </div>
        <div class="profile-footer">
            <a href="editar_perfil.php" class="edit-btn">Editar perfil</a>
            <a href="logout.php" class="logout-btn">Tancar sessió</a>
        </div>
    </div>
</body>
</html>
