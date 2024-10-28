<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esdeveniments</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="esdeveniments.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Esdeveniments</h1>

        <!-- Filtres -->
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" id="filter-name" class="form-control" placeholder="Filtrar per nom">
            </div>
            <div class="col-md-3">
                <input type="date" id="filter-date" class="form-control">
            </div>
            <div class="col-md-3">
                <select id="filter-category" class="form-control">
                    <option value="">Totes les categories</option>
                    <option value="Interior">Interior</option>
                    <option value="Aire lliure">Aire lliure</option>
                    <option value="Xerrada">Xerrada</option>
                    <option value="Jornada">Jornada</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" onclick="filterEvents()">Aplicar filtres</button>
            </div>
        </div>

        <!-- Llistat d'esdeveniments -->
        <div id="events-list" class="row">
            <?php
            // Exemple de llistat d'esdeveniments
            $events = [
                [
                    'title' => "Caminada 'Correcull' 2024",
                    'description' => "Una caminada per descobrir els paratges naturals.",
                    'date' => "2024-11-15",
                    'time' => "10:00",
                    'category' => "Aire lliure",
                    'rating' => 4.5,
                    'lat' => 41.3851,
                    'lon' => 2.1734,
                    'comments' => ["Molt bon esdeveniment!", "Perfecte per als amants de la natura."],
                ],
                [
                    'title' => "Xerrada sobre sostenibilitat",
                    'description' => "Una xerrada sobre com aplicar principis sostenibles en el dia a dia.",
                    'date' => "2024-12-01",
                    'time' => "18:00",
                    'category' => "Xerrada",
                    'rating' => 4.0,
                    'lat' => 41.3888,
                    'lon' => 2.159,
                    'comments' => ["Informativa i inspiradora.", "Molt interessant."]
                ]
            ];

            // Genera el llistat d'esdeveniments
            foreach ($events as $index => $event) {
                echo "
                <div class='col-md-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$event['title']}</h5>
                            <p class='card-text'>{$event['description']}</p>
                            <p><strong>Data:</strong> {$event['date']} | <strong>Categoria:</strong> {$event['category']}</p>
                            <button class='btn btn-primary' onclick='showEventDetails({$index})'>Veure detalls</button>
                        </div>
                    </div>
                </div>";
            }
            ?>
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
                        <p><strong>Valoració:</strong> <span id="event-rating"></span> estrelles</p>
                        <div id="map"></div>
                        <p><strong>Comentaris:</strong></p>
                        <ul id="event-comments"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, jQuery, and Leaflet JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Custom JS -->
    <script src="esdeveniments.js"></script>
</body>
</html>
