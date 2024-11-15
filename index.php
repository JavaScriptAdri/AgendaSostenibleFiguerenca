<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor d'Esdeveniments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="esdeveniments.css">
</head>
<body>
    <!-- Pàgina de benvinguda -->
    <div class="container mt-5">
        <h1 class="text-center">Benvingut al Gestor d'Esdeveniments</h1>
        <p class="text-center">Aquí trobaràs tots els esdeveniments futurs!</p>

        <!-- Filtres -->
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" id="filter-name" class="form-control" placeholder="Filtrar per nom">
            </div>
            <div class="col-md-3">
                <input type="date" id="filter-start-date" class="form-control" placeholder="Data d'inici">
            </div>
            <div class="col-md-3">
                <input type="date" id="filter-end-date" class="form-control" placeholder="Data final">
            </div>
            <div class="col-md-3">
                <select id="filter-category" class="form-control">
                    <option value="">Totes les categories</option>
                    <option value="Xerrada">Xerrada</option>
                    <option value="Aire lliure">Aire lliure</option>
                    <!-- Afegeix altres categories -->
                </select>
            </div>
        </div>

        <!-- Llistat d'esdeveniments -->
        <div id="events-list" class="row">
            <!-- Els esdeveniments es carregaran aquí via AJAX -->
        </div>
    </div>

    <!-- Footer amb avís de cookies -->
    <footer class="text-center mt-5">
        <p>Política de cookies: Utilitzem cookies per millorar l'experiència de l'usuari.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="esdeveniments.js"></script>
</body>
</html>
