// Funció de filtratge dels anuncis segons la cerca i la categoria seleccionada
function filterAnuncios() {
    let searchInput = document.getElementById('searchInput').value.toLowerCase();
    let categoryFilter = document.getElementById('categoryFilter').value;
    let announcements = document.querySelectorAll('.announcement-card');

    announcements.forEach(announcement => {
        let title = announcement.querySelector('h3').textContent.toLowerCase();
        let description = announcement.querySelector('p').textContent.toLowerCase();
        let category = announcement.dataset.category.toLowerCase();

        if (title.includes(searchInput) && (categoryFilter === '' || category === categoryFilter)) {
            announcement.style.display = 'block';
        } else {
            announcement.style.display = 'none';
        }
    });
}
