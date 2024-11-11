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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_dusuari = $_POST['nom_dusuari'];
    $contrasenya = $_POST['contrasenya'];

    // Preparació de la consulta per verificar l'usuari
    $stmt = $mysqli->prepare("SELECT id, contrasenya FROM usuaris WHERE nom_dusuari = ?");
    if ($stmt === false) {
        die("Error en preparar la consulta: " . $mysqli->error);
    }

    $stmt->bind_param("s", $nom_dusuari);
    $stmt->execute();
    $stmt->bind_result($id, $hash_contrasenya);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($contrasenya, $hash_contrasenya)) {
        $_SESSION['usuari_id'] = $id;

        // Generar un token únic i guardar-lo en una cookie
        $token = bin2hex(random_bytes(16));  // Token aleatori
        setcookie("auth_token", $token, time() + (86400 * 30), "/");  // Cookie vàlida durant 30 dies

        // Guardar el token a la base de dades
        $update_stmt = $mysqli->prepare("UPDATE usuaris SET token = ? WHERE id = ?");
        if ($update_stmt === false) {
            die("Error en preparar la consulta d'actualització: " . $mysqli->error);
        }

        $update_stmt->bind_param("si", $token, $id);
        $update_stmt->execute();
        $update_stmt->close();

        // Redirecció a perfil.php amb la ruta correcta
        header("Location: /src/views/perfil.php ");
        exit();
    } else {
        echo "Nom d'usuari o contrasenya incorrectes";
    }
}
?>
