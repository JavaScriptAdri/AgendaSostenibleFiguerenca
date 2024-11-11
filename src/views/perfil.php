<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Connexió a la base de dades
$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");

// Comprova si la connexió ha fallat
if ($mysqli->connect_error) {
    die("Connexió fallida: " . $mysqli->connect_error);
}

// Verifica si l'usuari està autenticat, si no, comprova el token de la cookie
if (!isset($_SESSION['usuari_id']) && isset($_COOKIE['auth_token'])) {
    // Verificar el token de la cookie a la base de dades
    $stmt = $mysqli->prepare("SELECT id FROM usuaris WHERE token = ?");
    if ($stmt === false) {
        die("Error en preparar la consulta: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_COOKIE['auth_token']);
    $stmt->execute();
    $stmt->bind_result($id);
    if ($stmt->fetch()) {
        $_SESSION['usuari_id'] = $id;
    } else {
        header("Location: login.php");
        exit();
    }
} elseif (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

// Recupera les dades de l'usuari
$id = $_SESSION['usuari_id'];
$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");

// Comprova si la preparació de la consulta ha fallat
if ($stmt === false) {
    die("Error en preparar la consulta: " . $mysqli->error);
}

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
    <div class="top_llegenda">
        <img src="/public/imatges/agenda figuerenca no bg (1).png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
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
    <a href="/src/views/logout.php">Tancar sessió</a>
</body>
</html>
