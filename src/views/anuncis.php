<?php
// Inclou connexió a la base de dades i funcions
include 'cookiePerDefecte.php'; // Inclou el fitxer que crea la cookie per defecte
include '../../connexio.php'; // Inclou el fitxer de connexió a la base de dades

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncis Classificats - Esdeveniments Sostenibles</title>
    <link rel="stylesheet" href="/public/css/anuncis.css"> <!-- Ajusta el camí a la teva ubicació de CSS -->
</head>
<body>
    <header>
        <h1>Anuncis Classificats per Reutilització</h1>
    </header>
    
    <!-- Cercador i Filtratge -->
    <section class="search-filter">
        <input type="text" id="searchInput" placeholder="Cerca anuncis..." oninput="filterAnuncios()">
        <select id="categoryFilter" onchange="filterAnuncios()">
            <option value="">Selecciona una categoria</option>
            <option value="mobilitat">Mobilitat</option>
            <option value="electrodomestics">Electrodomèstics</option>
            <option value="mobles">Mobles</option>
            <option value="runes">Runes i materials</option>
            <!-- Afegir més categories segons les necessitats -->
        </select>
    </section>

    <!-- Llistat d'Anuncis -->
    <section id="announcements" class="announcement-list">
        <?php
        // Obtenir els anuncis des de la base de dades
        $announcements = getAllAnnouncements();  // Funció per obtenir tots els anuncis
        foreach ($announcements as $announcement) {
            echo '<div class="announcement-card" data-category="' . htmlspecialchars($announcement['category']) . '">';
            echo '<h3>' . htmlspecialchars($announcement['title']) . '</h3>';
            echo '<p>' . substr(htmlspecialchars($announcement['description']), 0, 100) . '...</p>';
            echo '<a href="announcement_detail.php?id=' . $announcement['id'] . '">Veure més</a>';
            echo '</div>';
        }
        ?>
    </section>

    <!-- Consells de Sostenibilitat -->
    <section class="sustainability-tips">
        <h2>Consells de Sostenibilitat</h2>
        <ul>
            <li>Reutilitza en comptes de llençar!</li>
            <li>Pensa en l'economia circular abans de comprar nous productes.</li>
            <li>Repara els teus electrodomèstics abans de substituir-los.</li>
            <!-- Afegir més consells segons les necessitats -->
        </ul>
    </section>

    <script src="/public/js/anuncis.js"></script> <!-- Ajusta el camí a la teva ubicació de JS -->
</body>
</html>
