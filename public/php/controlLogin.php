<?php
// Connexió a la base de dades
$mysqli = new mysqli("172.19.0.2", "admin", "admin", "agenda_figuerenca_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_dusuari = $_POST['nom_dusuari'];
    $contrasenya = $_POST['contrasenya'];

    $stmt = $mysqli->prepare("SELECT id, contrasenya FROM usuaris WHERE nom_dusuari = ?");
    $stmt->bind_param("s", $nom_dusuari);
    $stmt->execute();
    $stmt->bind_result($id, $hash_contrasenya);
    $stmt->fetch();

    if (password_verify($contrasenya, $hash_contrasenya)) {
        session_start();
        $_SESSION['usuari_id'] = $id;
        header("Location: perfil.php");
        exit();
    } else {
        echo "Nom d'usuari o contrasenya incorrectes";
    }
}
