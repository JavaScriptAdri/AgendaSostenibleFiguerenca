$(document).ready(function() {
    // Carrega esdeveniments al carregar la pàgina
    loadEvents();

    // Filtrar esdeveniments
    $('#filter-name, #filter-start-date, #filter-end-date, #filter-category').on('input change', function() {
        loadEvents();
    });
});

function loadEvents() {
    const name = $('#filter-name').val();
    const startDate = $('#filter-start-date').val();
    const endDate = $('#filter-end-date').val();
    const category = $('#filter-category').val();

    $.ajax({
        url: 'get_esdeveniments.php',
        type: 'GET',
        data: {
            name: name,
            start_date: startDate,
            end_date: endDate,
            category: category
        },
        success: function(response) {
            $('#events-list').html(response);
        }
    });
}
