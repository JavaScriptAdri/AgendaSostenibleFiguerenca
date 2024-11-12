<?php
// Connexió a la base de dades
$mysqli = new mysqli("172.19.0.2", "admin", "admin", "agenda_figuerenca_db");

// Comprova la connexió
if ($mysqli->connect_error) {
    die("Connexió fallida: " . $mysqli->connect_error);
}

// Funció per crear un esdeveniment
function createEvent($title, $description, $date, $location) {
    global $mysqli;
    $stmt = $mysqli->prepare("INSERT INTO esdeveniments (titol, descripcio, data, ubicacio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $date, $location);
    return $stmt->execute();
}

// Funció per obtenir esdeveniments ordenats per visualitzacions
function getEventsByViews() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM esdeveniments ORDER BY visualitzacions DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Funció per gestionar els comentaris: validar, editar o eliminar
function manageComment($commentId, $action, $newContent = null) {
    global $mysqli;
    if ($action === 'validate') {
        $stmt = $mysqli->prepare("UPDATE comentaris SET validat = 1 WHERE id = ?");
        $stmt->bind_param("i", $commentId);
    } elseif ($action === 'edit' && $newContent) {
        $stmt = $mysqli->prepare("UPDATE comentaris SET contingut = ? WHERE id = ?");
        $stmt->bind_param("si", $newContent, $commentId);
    } elseif ($action === 'delete') {
        $stmt = $mysqli->prepare("DELETE FROM comentaris WHERE id = ?");
        $stmt->bind_param("i", $commentId);
    }
    return $stmt->execute();
}

// Funció per crear un nou usuari
function createUser($username, $password, $email) {
    global $mysqli;
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO usuaris (nom_dusuari, contrasenya, email, rol) VALUES (?, ?, ?, 'admin')");
    $stmt->bind_param("sss", $username, $hash_password, $email);
    return $stmt->execute();
}

// Altres funcions similars per a consells, categories, anuncis i categories d'anuncis...
?>
