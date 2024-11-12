<?php
include '../connexio.php'; // Inclou el fitxer de connexió amb PDO
include 'php/cookiePerDefecte.php'; // Inclou el fitxer per crear la cookie per defecte

// Comprovació si s'ha enviat el formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $target_dir = "../uploads/";

    // Comprovar si la carpeta d'uploads existeix, i si no, crear-la
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $uploaded_images = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image_name = uniqid() . "_" . basename($_FILES['images']['name'][$key]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($tmp_name, $target_file)) {
                $uploaded_images[] = $target_file;
            } else {
                echo "Error al moure el fitxer: " . $_FILES['images']['name'][$key];
            }
        }
    }

    // Convertir les imatges a JSON per desar-les en una única columna a la base de dades
    $images_json = json_encode($uploaded_images);

    try {
        // Preparar i executar la inserció a la base de dades
        $stmt = $pdo->prepare("INSERT INTO anuncis (title, description, category, status, images) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $category, $status, $images_json]);
        echo "Anunci creat correctament!";
    } catch (PDOException $e) {
        echo "Error al crear l'anunci: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncis Classificats</title>
    <link rel="stylesheet" href="/public/css/anuncis.css">
    <link rel="stylesheet" href="/public/css/estilsDelIndex.css">
    <link rel="icon" href="imatges/IconaP2.png" type="image/png">
</head>
<body>
<div class="top_llegenda">
    <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
    <a href="index.php"><button title="Home" class="Home">Home</button></a>
    <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
    <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
    <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
    <a href="index.php?r=login"><button title="Iniciar sessió" class="Iniciar sessió">Iniciar sessió</button></a>
    <a href="index.php?r=register"><button title="Registrar-se" class="Registrar">Registrar-se</button></a>           
</div>

<div class="Titul_principal">
    <h1 title="Titol principal">Anuncis</h1>
</div>

<header>
    <h1>Anuncis Classificats</h1>
</header>

<main>
    <section id="create_ad">
        <h2>Crear Anunci</h2>
        <form id="ad_form" method="POST" enctype="multipart/form-data">
            <label for="title">Títol:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Descripció:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="images">Imatges:</label>
            <input type="file" id="images" name="images[]" accept="image/*" multiple>

            <label for="category">Categoria:</label>
            <select id="category" name="category">
                <option value="mobles">Mobles</option>
                <option value="vehicles">Vehicles</option>
                <option value="electrodomestics">Electrodomèstics</option>
                <option value="tecnologia">Tecnologia</option>
            </select>

            <label for="status">Estat:</label>
            <select id="status" name="status">
                <option value="esborrany">Esborrany</option>
                <option value="public">Públic</option>
                <option value="caducat">Caducat</option>
                <option value="esborrat">Esborrat</option>
            </select>

            <button type="submit">Crear Anunci</button>
        </form>
    </section>

    <section id="ad_list">
        <h2>Anuncis Existents</h2>
        <div id="ads">
            <?php
            try {
                // Recuperar els anuncis de la base de dades
                $stmt = $pdo->prepare("SELECT * FROM anuncis WHERE status = 'public'"); // Filtrar anuncis públics
                $stmt->execute();
                
                // Mostrar els anuncis
                $ads = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($ads) {
                    foreach ($ads as $ad) {
                        echo "<div class='ad'>";
                        echo "<h3>" . htmlspecialchars($ad['title']) . "</h3>";
                        echo "<p>" . nl2br(htmlspecialchars($ad['description'])) . "</p>";
                        echo "<p><strong>Categoria:</strong> " . htmlspecialchars($ad['category']) . "</p>";
                        echo "<p><strong>Estat:</strong> " . htmlspecialchars($ad['status']) . "</p>";

                        // Mostrar les imatges de l'anunci
                        $images = json_decode($ad['images'], true);
                        if ($images) {
                            foreach ($images as $image) {
                                echo "<img src='$image' alt='Imatge de l'anunci' class='ad_image'>";
                            }
                        }
                        echo "</div>";
                    }
                } else {
                    echo "<p>No s'han trobat anuncis públics.</p>";
                }
            } catch (PDOException $e) {
                echo "Error al recuperar els anuncis: " . $e->getMessage();
            }
            ?>
        </div>
    </section>
</main>

<script>
    // Assigna el nom de l'usuari a una variable JavaScript
    var usuari = <?php echo isset($_SESSION['usuari']) ? json_encode($_SESSION['usuari']) : 'null'; ?>;
</script>
<script src="/public/js/Index.js"></script>
<script src="/public/js/anuncis.js"></script>
</body>
</html>
