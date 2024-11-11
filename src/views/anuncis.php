<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'php/cookiePerDefecte.php'; // Inclou el fitxer que crea la cookie per defecte
include '../connexio.php'; // Inclou el fitxer de connexió a la base de dades
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncis Classificats</title>
    <link rel="stylesheet" href="css/anuncis.css">
    <link rel="stylesheet" href="css/estilsDelIndex.css">
    <link rel="stylesheet" href="css/consells.css">
    <link rel="icon" href="imatges/IconaP2.png" type="image/png">
</head>
<body>
<div class="top_llegenda">
            <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
            <a href="index.php"><button title="Home" class="Home">Home</button></a>
            <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
            <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
            <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
            <a href="index.php?r=login"><button title="Iniciar sessió" class="Iniciar sessió"> Iniciar sessió</button></a>
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
            <form id="ad_form">
                <label for="title">Títol:</label>
                <input type="text" id="title" required>

                <label for="description">Descripció:</label>
                <textarea id="description" rows="5" required></textarea>

                <label for="images">Imatges:</label>
                <input type="file" id="images" accept="image/*" multiple>

                <label for="category">Categoria:</label>
                <select id="category">
                    <option value="mobles">Mobles</option>
                    <option value="vehicles">Vehicles</option>
                    <option value="electrodomestics">Electrodomèstics</option>
                    <option value="tecnologia">Tecnologia</option>
                </select>

                <label for="status">Estat:</label>
                <select id="status">
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
            <div id="ads"></div>
        </section>
    </main>
    <script>
      // Assigna el nom de l'usuari a una variable JavaScript
      var usuari = <?php echo isset($_SESSION['usuari']) ? json_encode($_SESSION['usuari']) : 'null'; ?>;
    </script>
    <script src="js/Index.js"></script>
    <script src="js/anuncis.js"></script>
</body>
</html>