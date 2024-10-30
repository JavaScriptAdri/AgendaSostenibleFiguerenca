<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gestor d’esdeveniments sostenibles amb filtres avançats i geolocalització.">
    <title>Gestor d'Esdeveniments</title>
    <link rel="stylesheet" href="../../public/css/esdeveniments.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    
</head>
<body>
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

    <script src="public/js/esdeveniments.js"></script>
</body>
</html>
