<?php
// Connexió a la base de dades
$servername = "localhost"; // Cambia esto si tu servidor MySQL es diferente
$username = "root"; // Nom d'usuari de la base de dades
$password = ""; // Contrasenya de la base de dades
$dbname = "esdeveniments_db"; // Nom de la base de dades

// Crear connexió
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprovar connexió
if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}

// Comprovació de les dades rebudes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titol = htmlspecialchars($_POST['title']);
    $descripcio = htmlspecialchars($_POST['description']);
    $categoria = intval($_POST['category']);
    $estat = htmlspecialchars($_POST['status']);
    $id_usuari = 1; // Substitueix amb la ID de l'usuari autenticat

    // Gestionar les imatges
    $imatges = [];
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['images']['name'][$key]);
            $file_path = 'uploads/' . $file_name; // Directori on emmagatzemar les imatges

            // Comprovar si la imatge és vàlida i moure-la
            if (move_uploaded_file($tmp_name, $file_path)) {
                $imatges[] = $file_path;
            }
        }
    }

    // Convertir les imatges a format JSON
    $imatges_json = json_encode($imatges);

    // Inserir l'anunci a la base de dades
    $sql = "INSERT INTO anuncis (titol, descripcio, imatges, categoria, estat, id_usuari) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $titol, $descripcio, $imatges_json, $categoria, $estat, $id_usuari);

    if ($stmt->execute()) {
        echo "Anunci creat correctament.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
