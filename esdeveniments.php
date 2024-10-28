<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor d'Esdeveniments</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="esdeveniments.css">
</head>
<body>

    <!-- Política de cookies -->
    <div id="cookie-policy" class="alert alert-warning" role="alert">
        Aquesta pàgina fa servir cookies per millorar la teva experiència. 
        <button id="accept-cookies" class="btn btn-primary">Accepta</button>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4">Benvingut al Gestor d'Esdeveniments</h1>
        <p>Consulta i filtra esdeveniments pròxims!</p>

        <!-- Filtres -->
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="filter-name" class="form-control" placeholder="Filtrar per nom">
            </div>
            <div class="col-md-3">
                <input type="date" id="filter-start-date" class="form-control" placeholder="Data d'inici">
            </div>
            <div class="col-md-3">
                <input type="date" id="filter-end-date" class="form-control" placeholder="Data final">
            </div>
            <div class="col-md-2">
                <select id="filter-category" class="form-control">
                    <option value="">Totes les categories</option>
                    <option value="Aire lliure">Aire lliure</option>
                    <option value="Interior">Interior</option>
                    <option value="Xerrada">Xerrada</option>
                </select>
            </div>
        </div>

        <!-- Llistat d'esdeveniments -->
        <div id="events-list" class="row">
            <!-- Es carregaran els esdeveniments aquí via AJAX -->
        </div>

        <!-- Modal per veure detalls de l'esdeveniment -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Detalls de l'esdeveniment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 id="event-title"></h4>
                        <p id="event-description"></p>
                        <p><strong>Data:</strong> <span id="event-date"></span></p>
                        <p><strong>Hora:</strong> <span id="event-time"></span></p>
                        <p><strong>Categoria:</strong> <span id="event-category"></span></p>
                        <div id="map" style="height: 300px;"></div>
                        <p><strong>Comentaris:</strong></p>
                        <ul id="event-comments"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap JS, Leaflet JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="esdeveniments.js"></script>
</body>
</html>
