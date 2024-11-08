<?php
// Connexió a la base de dades
$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");

// Comprova si la connexió ha fallat
if ($mysqli->connect_error) {
    die("Error de connexió: " . $mysqli->connect_error);
}

// Processa el formulari només si es fa un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obté les dades del formulari
    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $nom_dusuari = $_POST['nom_dusuari'];
    $email = $_POST['email'];
    $contrasenya = password_hash($_POST['contrasenya'], PASSWORD_BCRYPT);

    // Comprova si els camps obligatoris estan complets
    if (empty($nom) || empty($cognoms) || empty($nom_dusuari) || empty($email) || empty($contrasenya)) {
        echo "Tots els camps són obligatoris.";
    } else {
        // Prepara la consulta d'inserció
        $stmt = $mysqli->prepare("INSERT INTO usuaris (nom, cognoms, nom_dusuari, email, contrasenya) VALUES (?, ?, ?, ?, ?)");

        // Comprova si la consulta es va preparar correctament
        if (!$stmt) {
            die("Error al preparar la consulta: " . $mysqli->error);
        }

        // Vincula els paràmetres amb la consulta
        $stmt->bind_param("sssss", $nom, $cognoms, $nom_dusuari, $email, $contrasenya);

        // Executa la consulta
        if ($stmt->execute()) {
            // Inicia la sessió i redirigeix a perfil.php si s'ha registrat correctament
            session_start();
            $_SESSION['usuari_id'] = $stmt->insert_id;
            header("Location: perfil.php");
            exit();
        } else {
            // Si l'execució fallida, mostra l'error
            echo "Error al registrar-se: " . $stmt->error;
        }

        // Tanca la consulta
        $stmt->close();
    }
}

// Tanca la connexió
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra't</title>
    <link rel="stylesheet" href="/public/css/register.css">
</head>
<body>
    <div class="register-container">
        <h2>Registra't</h2>
        <form action="register.php" method="POST" class="register-form">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="cognoms" placeholder="Cognoms" required>
            <input type="text" name="nom_dusuari" placeholder="Nom d'usuari" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit">Registrar-se</button>
        </form>
    </div>
</body>
</html>