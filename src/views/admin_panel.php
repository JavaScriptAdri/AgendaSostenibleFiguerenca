<?php
// Connexió a la base de dades
$servername = "localhost";
$username = "usuari";
$password = "contrasenya";
$dbname = "base_dades";

$mysqli = new mysqli("172.20.0.2", "admin", "admin", "agenda_figuerenca_db");

// Altres codi anterior

if (isset($_POST['action']) && $_POST['action'] === 'get_stats') {
    $stats = [
        'total_events' => getTotalEvents(),
        'total_comments' => getTotalComments(),
        'total_users' => getTotalUsers(),
        'total_tips' => getTotalTips()
    ];
    echo json_encode($stats);
}

// Funcions per obtenir les estadístiques
function getTotalEvents() {
    // Codi per comptar els esdeveniments
    return 120; // Exemple de nombre total
}

function getTotalComments() {
    // Codi per comptar els comentaris
    return 450; // Exemple de nombre total
}

function getTotalUsers() {
    // Codi per comptar els usuaris
    return 230; // Exemple de nombre total
}

function getTotalTips() {
    // Codi per comptar els consells
    return 50; // Exemple de nombre total
}

// Funcions CRUD per diferents mòduls
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    
    // CRUD per Esdeveniments
    if ($action === 'create_event') {
        $titol = $_POST['titol'];
        $descripcio = $_POST['descripcio'];
        $data = $_POST['data'];
        $stmt = $mysqli->prepare("INSERT INTO esdeveniments (titol, descripcio, data) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $titol, $descripcio, $data);
        $stmt->execute();
        echo "Esdeveniment creat!";
    } elseif ($action === 'delete_event') {
        $id = $_POST['id'];
        $stmt = $mysqli->prepare("DELETE FROM esdeveniments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        echo "Esdeveniment eliminat!";
    }

    // Aquí segueixen les altres accions CRUD
    exit;
}
?>



<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell d'Administració - Esdeveniments Sostenibles</title>
    <link rel="stylesheet" href="/public/css/admin_panel.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
    <div class="admin-container">
        <nav class="sidebar">
            <div class="logo">
                <img src="../../public/imatges/logo.png" alt="Logo" class="admin-logo">
                <h2 class="admin-title">Admin Panel</h2>
            </div>
            <ul>
                <li onclick="showSection('dashboard')">Dashboard</li>
                <li onclick="showSection('event-management')">Esdeveniments</li>
                <li onclick="showSection('comment-management')">Comentaris</li>
                <li onclick="showSection('user-management')">Usuaris</li>
                <li onclick="showSection('tips-management')">Consells</li>
                <li onclick="showSection('category-management')">Categories</li>
                <li onclick="showSection('classified-ads-management')">Anuncis</li>
                <li onclick="showSection('classified-category-management')">Categories Anuncis</li>
            </ul>
        </nav>

        <main class="content">
    <header class="admin-header">
        <h1>Panell d'Administració</h1>
    </header>
    <section id="dashboard" class="admin-section">
        <h2>Dashboard</h2> <!-- Canviat de h3 a h2 -->
        <p>Benvingut al panell d'administració. Selecciona una secció de la barra lateral per gestionar el contingut.</p>
    </section>

    <!-- Sección de gestión de eventos, comentarios, etc. -->
</main>


            <!-- Sección de gestión de eventos, comentarios, etc. -->
        </main>
    </div>

    <script src="../../public/js/admin_panel.js"></script>


</body>
</html>

