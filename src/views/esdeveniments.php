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
    <meta name="description" content="Gestor d’esdeveniments sostenibles amb filtres avançats i geolocalització.">
    <title>Gestor d'Esdeveniments</title>
    <link rel="stylesheet" href="/public/css/esdeveniments.css">
    <link rel="stylesheet" href="/public/css/estilsDelIndex.css">
    <link rel="icon" href="imatges/IconaP2.png" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    
</head>
<body>
<div class="top_llegenda">
            <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
            <a href="index.php"><button title="Home" class="Home">Home</button></a>
            <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
            <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
            <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
            <a href="/src/views/login.php"><button title="Iniciar sessió" class="Iniciar sessió"> Iniciar sessió</button></a>
            <a href="/src/views/register.php"><button title="Registrar-se" class="Registrar">Registrar-se</button></a>           
       </div>

    <header>
        <h1>Gestor d’Esdeveniments</h1>
        <p>Benvingut a la nostra plataforma d’esdeveniments sostenibles. Navega, filtra i troba el que més t’interessi.</p>
    </header>

    <main>
        
        
        <section id="filters">
            <h2>Filtres</h2>
            <label for="date_start">Data Inici:</label>
            <input type="date" id="date_start" aria-label="Data d'inici">
            
            <label for="date_end">Data Final:</label>
            <input type="date" id="date_end" aria-label="Data final">
            
            <label for="event_name">Nom de l'Esdeveniment:</label>
            <input type="text" id="event_name" placeholder="Cerca per nom" aria-label="Cercar per nom">
            
            <label for="category">Categoria:</label>
            <select id="category" aria-label="Selecciona una categoria">
                <option value="">Totes les categories</option>
                <option value="Interior">Interior</option>
                <option value="Exterior">Exterior</option>
                <option value="Xerrada">Xerrada</option>
                <option value="Jornada">Jornada</option>
            </select>
            
            <button id="apply_filters">Aplicar Filtres</button>
        </section>

        <section id="events_list">
            <h2>Llistat d’Esdeveniments</h2>
            <div id="events_container" role="region" aria-live="polite">
                <!-- Els esdeveniments es carregaran aquí -->
            </div>
        </section>
        <div class="event-card" >
    <h3>Nom de l'Esdeveniment</h3>
    <p>Petita descripció de l'esdeveniment</p>
    <p class="event-details">Detalls sobre l'horari i la localització.</p>
</div>


        <section id="map">
            <h2>Ubicació d’Esdeveniments</h2>
            <div id="mapid"></div>
        </section>
        
    </main>

    <footer>
        <p>&copy; 2024 Gestor d’Esdeveniments Sostenibles</p>
    </footer>
    <script>
      // Assigna el nom de l'usuari a una variable JavaScript
      var usuari = <?php echo isset($_SESSION['usuari']) ? json_encode($_SESSION['usuari']) : 'null'; ?>;
    </script>
    <script src="/public/js/esdeveniments.js"></script>
</body>
</html>
