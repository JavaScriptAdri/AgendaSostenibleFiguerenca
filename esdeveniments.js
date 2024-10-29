$(document).ready(function() {
    // Inicia el mapa Leaflet
    const map = L.map('mapid').setView([41.3851, 2.1734], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Funció per carregar els esdeveniments
    function carregarEsdeveniments(filters = {}) {
        $.ajax({
            url: 'get_esdeveniments.php',
            type: 'GET',
            data: filters,
            success: function(data) {
                $('#events_container').html(data);
                // Actualitza el mapa amb els nous esdeveniments
                JSON.parse(data).forEach(event => {
                    L.marker([event.latitud, event.longitud]).addTo(map)
                        .bindPopup(`<b>${event.titol}</b><br>${event.descripcio}`);
                });
            }
        });
    }

    // Carrega inicial dels esdeveniments
    carregarEsdeveniments();

    // Aplica els filtres quan es fa clic al botó
    $('#apply_filters').click(function() {
        const filters = {
            date_start: $('#date_start').val(),     
            date_end: $('#date_end').val(),
            event_name: $('#event_name').val(),
            category: $('#category').val()
        };
        carregarEsdeveniments(filters);
    });
});
