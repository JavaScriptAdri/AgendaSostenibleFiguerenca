<?php
session_start();

// Connexió a la base de dades
$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");

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

// Recupera les dades actuals del perfil de l'usuari
$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");
if ($stmt === false) {
    die('Error en la preparació de la consulta SQL: ' . $mysqli->error); // Afegim missatge d'error
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $nom = $user['nom'];
    $cognoms = $user['cognoms'];  // Utilitzem 'cognoms' en lloc de 'cognom'
    $email = $user['email'];
    $imatge_perfil = $user['imatge_perfil'];
} else {
    echo "Usuari no trobat.";
    exit();
}

$stmt->close();

// Directori on es desaran les imatges
$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads";  // Ruta absoluta a la carpeta uploads

// Comprova si el directori existeix, si no, el crea
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0755, true);
}

// Comprova si l'usuari ha enviat un nou fitxer d'imatge
if (isset($_FILES['imatge']) && $_FILES['imatge']['error'] == UPLOAD_ERR_OK) {
    // Processar la càrrega de la imatge
    $imatge_nom = basename($_FILES['imatge']['name']);
    
    // Ruta completa a la qual desar la imatge
    $imatge_destinacio = $uploads_dir . "/" . $imatge_nom;

    if (move_uploaded_file($_FILES['imatge']['tmp_name'], $imatge_destinacio)) {
        // Actualitza el perfil de l'usuari amb la nova imatge a la base de dades
        $stmt = $mysqli->prepare("UPDATE usuaris SET imatge_perfil = ? WHERE id = ?");
        if ($stmt === false) {
            die('Error en la preparació de la consulta SQL: ' . $mysqli->error); // Afegim missatge d'error
        }
        $stmt->bind_param("si", $imatge_nom, $id);
        $stmt->execute();
        $stmt->close();
        
        // Redirigeix a perfil.php per mostrar la nova imatge
        header("Location: perfil.php");
        exit();
    } else {
        echo "Error al desar la imatge.";
    }
}

// Comprova si l'usuari ha enviat canvis per al nom, cognoms o l'email
if (isset($_POST['nom']) || isset($_POST['cognoms']) || isset($_POST['email'])) {
    $nou_nom = $_POST['nom'];
    $nous_cognoms = $_POST['cognoms'];  // Afegim 'cognoms'
    $nou_email = $_POST['email'];

    // Actualitza el nom, cognoms i email de l'usuari a la base de dades
    $stmt = $mysqli->prepare("UPDATE usuaris SET nom = ?, cognoms = ?, email = ? WHERE id = ?");
    if ($stmt === false) {
        die('Error en la preparació de la consulta SQL: ' . $mysqli->error); // Afegim missatge d'error
    }
    $stmt->bind_param("sssi", $nou_nom, $nous_cognoms, $nou_email, $id);
    if ($stmt->execute()) {
        // Després de l'actualització, redirigeix a perfil.php
        header("Location: perfil.php");
        exit();
    } else {
        echo "Error actualitzant perfil: " . $mysqli->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/editar_perfil.css">
    <title>Editar Perfil</title>
</head>
<body>
 
    <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
        <br>

        <label for="cognoms">Cognoms:</label>
        <input type="text" name="cognoms" id="cognoms" value="<?php echo htmlspecialchars($cognoms); ?>" required>
        <br>

        <label for="email">Correu electrònic:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
        <br>

        <label for="imatge">Canvia la teva imatge de perfil:</label>
        <input type="file" name="imatge" id="imatge">
        <button type="submit">Actualitzar perfil</button>
    </form>
</body>
</html>
