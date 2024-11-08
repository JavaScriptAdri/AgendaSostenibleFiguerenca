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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="top_llegenda">
            <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
            <a href="index.php"><button title="Home" class="Home">Home</button></a>
            <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
            <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
            <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
            <a href="index.php?r=login"><button title="Iniciar sessió" class="Iniciar sessió"> Iniciar sessió</button></a>
            <a href="index.php?r=register"><button title="Registrar-se" class="Registrar">Registrar-se</button></a>           
       </div>
    <h1>Benvingut/da, <?php echo htmlspecialchars($nom); ?>!</h1>
    <p>Nom complet: <?php echo htmlspecialchars($nom . " " . $cognoms); ?></p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <img src="<?php echo htmlspecialchars($imatge_perfil); ?>" alt="Imatge de perfil">
    <a href="logout.php">Tancar sessió</a>
</body>
</html>