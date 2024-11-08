<?php
session_start();
if (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

// Connexió a la base de dades
$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");
$id = $_SESSION['usuari_id'];

$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom, $cognoms, $email, $imatge_perfil);
$stmt->fetch();
?>

<h1>Benvingut/da, <?php echo htmlspecialchars($nom); ?>!</h1>
<p>Nom complet: <?php echo htmlspecialchars($nom . " " . $cognoms); ?></p>
<p>Email: <?php echo htmlspecialchars($email); ?></p>
<img src="<?php echo htmlspecialchars($imatge_perfil); ?>" alt="Imatge de perfil">
<a href="logout.php">Tancar sessió</a>
