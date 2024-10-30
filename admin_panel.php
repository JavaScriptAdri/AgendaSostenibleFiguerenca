<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell d'Administració - Hacker Style</title>
    <link rel="stylesheet" href="admin_panel.css">
</head>
<body>
    <div class="admin-container">
        <!-- Barra lateral de navegació -->
        <nav class="sidebar">
            <div class="logo">
                <img src="images/hacker.jpg" alt="Logo" class="hacker-logo">
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

        <!-- Contingut principal -->
        <main class="content">
            <header class="admin-header">
                <h1>Panell d'Administració</h1>
            </header>

            <section id="dashboard" class="admin-section">
                <h3>Dashboard</h3>
                <p>Benvingut al panell d'administració. Selecciona una secció de la barra lateral per gestionar el contingut.</p>
            </section>

            <section id="event-management" class="admin-section hidden">
                <h2>Gestió d'Esdeveniments</h2>
                <button class="btn-primary" onclick="createEvent()">Crear Esdeveniment</button>
                <div id="events-list"><!-- Llistat d'esdeveniments es carregarà aquí --></div>
            </section>

            <section id="comment-management" class="admin-section hidden">
                <h2>Gestió de Comentaris</h2>
                <div id="comments-list"><!-- Llistat de comentaris es carregarà aquí --></div>
            </section>

            <section id="user-management" class="admin-section hidden">
                <h2>Gestió d'Usuaris</h2>
                <button class="btn-primary" onclick="createUser()">Crear Usuari</button>
                <div id="users-list"><!-- Llistat d'usuaris es carregarà aquí --></div>
            </section>

            <section id="tips-management" class="admin-section hidden">
                <h2>Gestió de Consells Sostenibles</h2>
                <button class="btn-primary" onclick="createTip()">Crear Consell</button>
                <div id="tips-list"><!-- Llistat de consells es carregarà aquí --></div>
            </section>

            <section id="category-management" class="admin-section hidden">
                <h2>Gestió de Categories</h2>
                <button class="btn-primary" onclick="createCategory()">Crear Categoria</button>
                <div id="categories-list"><!-- Llistat de categories es carregarà aquí --></div>
            </section>

            <section id="classified-ads-management" class="admin-section hidden">
                <h2>Gestió d'Anuncis Classificats</h2>
                <button class="btn-primary" onclick="createClassified()">Crear Anunci</button>
                <div id="classifieds-list"><!-- Llistat d'anuncis es carregarà aquí --></div>
            </section>

            <section id="classified-category-management" class="admin-section hidden">
                <h2>Gestió de Categories d'Anuncis</h2>
                <button class="btn-primary" onclick="createClassifiedCategory()">Crear Categoria d'Anunci</button>
                <div id="classified-categories-list"><!-- Llistat de categories d'anuncis es carregarà aquí --></div>
            </section>
        </main>
    </div>

    <script src="admin_panel.js"></script>
</body>
</html>
