<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Connexió a la base de dades
$mysqli = new mysqli("172.19.0.3", "admin", "admin", "agenda_figuerenca_db");

// Comprova si la connexió ha fallat
if ($mysqli->connect_error) {
    die("Connexió fallida: " . $mysqli->connect_error);
}

// Verifica si l'usuari està autenticat
if (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera les dades de l'usuari
$id = $_SESSION['usuari_id'];
$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom, $cognoms, $email, $imatge_perfil);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil d'usuari</title>
    <link rel="stylesheet" href="../..//public/css/perfil.css">
</head>
<body>
    <!-- Llegenda superior -->
    <div class="top_llegenda">
        <img src="/public/imatges/agenda figuerenca no bg (1).png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
        <a href="index.php"><button title="Home" class="Home">Home</button></a>
        <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
        <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
        <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
        <a href="index.php?r=login"><button title="Iniciar sessió" class="Iniciar sessió">Iniciar sessió</button></a>
        <a href="index.php?r=register"><button title="Registrar-se" class="Registrar">Registrar-se</button></a>           
    </div>

    <!-- Contingut del perfil de l'usuari -->
    <h1>Benvingut/da, <?php echo htmlspecialchars($nom); ?>!</h1>
    <p>Nom complet: <?php echo htmlspecialchars($nom . " " . $cognoms); ?></p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    

    <?php
    if ($imatge_perfil) {
        // Ruta correcta per mostrar la imatge
        echo '<img src="/uploads/' . htmlspecialchars($imatge_perfil) . '" alt="Imatge de perfil" width="150">';
    } else {
        echo "No tens una imatge de perfil establerta.";
    }
    ?>
    <br>
    <a href="editar_perfil.php">Edita el teu perfil</a> <!-- Redirigeix a la pàgina d'editar perfil -->
    
    <br><br>
    <a href="/src/views/logout.php">Tancar sessió</a>
</body>
</html>
