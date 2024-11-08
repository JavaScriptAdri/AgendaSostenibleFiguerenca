<?php
session_start();
if (!isset($_SESSION['usuari_id'])) {
    header("Location: login.php");
    exit();
}

$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");
$id = $_SESSION['usuari_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $cognoms = $_POST['cognoms'];
    $email = $_POST['email'];
    $imatge_perfil = $_FILES['imatge_perfil']['name'];

    // Si l'usuari ha pujat una nova imatge
    if ($imatge_perfil) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imatge_perfil"]["name"]);
        move_uploaded_file($_FILES["imatge_perfil"]["tmp_name"], $target_file);
    } else {
        // Si no es puja cap imatge, es manté la imatge actual
        $imatge_perfil = $_POST['imatge_perfil_actual'];
    }

    $stmt = $mysqli->prepare("UPDATE usuaris SET nom = ?, cognoms = ?, email = ?, imatge_perfil = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nom, $cognoms, $email, $imatge_perfil, $id);
    $stmt->execute();

    // Redirigir a la pàgina de perfil després de l'actualització
    header("Location: perfil.php");
    exit();
}

$stmt = $mysqli->prepare("SELECT nom, cognoms, email, imatge_perfil FROM usuaris WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom, $cognoms, $email, $imatge_perfil);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="/public/css/editar_perfil.css">
</head>
<body>
    <div class="profile-container">
        <h1>Editar perfil</h1>
        <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
            <div class="profile-image">
                <img src="<?php echo htmlspecialchars($imatge_perfil); ?>" alt="Imatge de perfil">
                <input type="file" name="imatge_perfil" accept="image/*">
                <input type="hidden" name="imatge_perfil_actual" value="<?php echo htmlspecialchars($imatge_perfil); ?>">
            </div>
            <div class="profile-details">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>

                <label for="cognoms">Cognoms:</label>
                <input type="text" name="cognoms" value="<?php echo htmlspecialchars($cognoms); ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <button type="submit" class="edit-btn">Desar canvis</button>
        </form>
    </div>
</body>
</html>
