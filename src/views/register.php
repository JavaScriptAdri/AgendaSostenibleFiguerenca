<?php
// Connexió a la base de dades
$mysqli = new mysqli("localhost", "usuari", "contrasenya", "esdeveniments_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $nom_dusuari = $_POST['nom_dusuari'];
    $email = $_POST['email'];
    $contrasenya = password_hash($_POST['contrasenya'], PASSWORD_BCRYPT);

    // Inserció de l'usuari a la base de dades
    $stmt = $mysqli->prepare("INSERT INTO usuaris (nom, cognoms, nom_dusuari, email, contrasenya) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $cognoms, $nom_dusuari, $email, $contrasenya);
    $stmt->execute();

    // Iniciar sessió i redirigir a perfil.php
    session_start();
    $_SESSION['usuari_id'] = $stmt->insert_id;
    header("Location: perfil.php");
    exit();
}
?>

<form action="register.php" method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="cognoms" placeholder="Cognoms" required>
    <input type="text" name="nom_dusuari" placeholder="Nom d'usuari" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="contrasenya" placeholder="Contrasenya" required>
    <button type="submit">Registrar-se</button>
</form>
