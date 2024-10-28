// Exemple d'esdeveniments carregats amb PHP
const events = [
    {
        title: "Caminada 'Correcull' 2024",
        description: "Una caminada per descobrir els paratges naturals.",
        date: "2024-11-15",
        time: "10:00",
        category: "Aire lliure",
        rating: 4.5,
        lat: 41.3851,
        lon: 2.1734,
        comments: ["Molt bon esdeveniment!", "Perfecte per als amants de la natura."]
    },
    {
        title: "Xerrada sobre sostenibilitat",
        description: "Una xerrada sobre com aplicar principis sostenibles en el dia a dia.",
        date: "2024-12-01",
        time: "18:00",
        category: "Xerrada",
        rating: 4.0,
        lat: 41.3888,
        lon: 2.159,
        comments: ["Informativa i inspiradora.", "Molt interessant."]
    }
];

// Filtrar esdeveniments
function filterEvents() {
    const filterName = document.getElementById('filter-name').value.toLowerCase();
    const filterDate = document.getElementById('filter-date').value;
    const filterCategory = document.getElementById('filter-category').value;

    const filteredEvents = events.filter(event => {
        return (filterName === '' || event.title.toLowerCase().includes(filterName)) &&
               (filterDate === '' || event.date === filterDate) &&
               (filterCategory === '' || event.category === filterCategory);
    });

    renderEvents(filteredEvents);
}

// Mostra els detalls de l'esdeveniment
function showEventDetails(index) {
    const event = events[index];
    document.getElementById('event-title').innerText = event.title;
    document.getElementById('event-description').innerText = event.description;
    document.getElementById('event-date').innerText = event.date;
    document.getElementById('event-time').innerText = event.time;
    document.getElementById('event-rating').innerText = event.rating;

    const commentsList = document.getElementById('event-comments');
    commentsList.innerHTML = '';
    event.comments.forEach(comment => {
        commentsList.innerHTML += `<li>${comment}</li>`;
    });

    // Mostra el mapa amb la ubicació de l'esdeveniment
    const map = L.map('map').setView([event.lat, event.lon], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([event.lat, event.lon]).addTo(map);

    $('#eventModal').modal('show');
}

// Inicialitza la pàgina mostrant tots els esdeveniments
function renderEvents(filteredEvents = events) {
    const eventsList = document.getElementById('events-list');
    eventsList.innerHTML = '';

    filteredEvents.forEach((event, index) => {
        eventsList.innerHTML += `
        <div class='col-md-6 mb-4'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>${event.title}</h5>
                    <p class='card-text'>${event.description}</p>
                    <p><strong>Data:</strong> ${event.date} | <strong>Categoria:</strong> ${event.category}</p>
                    <button class='btn btn-primary' onclick='showEventDetails(${index})'>Veure detalls</button>
                </div>
            </div>
        </div>
        `;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    renderEvents();
});
// Exemple d'esdeveniments carregats amb PHP
const events = [
    {
        title: "Caminada 'Correcull' 2024",
        description: "Una caminada per descobrir els paratges naturals.",
        date: "2024-11-15",
        time: "10:00",
        category: "Aire lliure",
        rating: 4.5,
        lat: 41.3851,
        lon: 2.1734,
        comments: ["Molt bon esdeveniment!", "Perfecte per als amants de la natura."]
    },
    {
        title: "Xerrada sobre sostenibilitat",
        description: "Una xerrada sobre com aplicar principis sostenibles en el dia a dia.",
        date: "2024-12-01",
        time: "18:00",
        category: "Xerrada",
        rating: 4.0,
        lat: 41.3888,
        lon: 2.159,
        comments: ["Informativa i inspiradora.", "Molt interessant."]
    }
];

// Filtrar esdeveniments
function filterEvents() {
    const filterName = document.getElementById('filter-name').value.toLowerCase();
    const filterDate = document.getElementById('filter-date').value;
    const filterCategory = document.getElementById('filter-category').value;

    const filteredEvents = events.filter(event => {
        return (filterName === '' || event.title.toLowerCase().includes(filterName)) &&
               (filterDate === '' || event.date === filterDate) &&
               (filterCategory === '' || event.category === filterCategory);
    });

    renderEvents(filteredEvents);
}

// Mostra els detalls de l'esdeveniment
function showEventDetails(index) {
    const event = events[index];
    document.getElementById('event-title').innerText = event.title;
    document.getElementById('event-description').innerText = event.description;
    document.getElementById('event-date').innerText = event.date;
    document.getElementById('event-time').innerText = event.time;
    document.getElementById('event-rating').innerText = event.rating;

    const commentsList = document.getElementById('event-comments');
    commentsList.innerHTML = '';
    event.comments.forEach(comment => {
        commentsList.innerHTML += `<li>${comment}</li>`;
    });

    // Mostra el mapa amb la ubicació de l'esdeveniment
    const map = L.map('map').setView([event.lat, event.lon], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([event.lat, event.lon]).addTo(map);

    $('#eventModal').modal('show');
}

// Inicialitza la pàgina mostrant tots els esdeveniments
function renderEvents(filteredEvents = events) {
    const eventsList = document.getElementById('events-list');
    eventsList.innerHTML = '';

    filteredEvents.forEach((event, index) => {
        eventsList.innerHTML += `
        <div class='col-md-6 mb-4'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>${event.title}</h5>
                    <p class='card-text'>${event.description}</p>
                    <p><strong>Data:</strong> ${event.date} | <strong>Categoria:</strong> ${event.category}</p>
                    <button class='btn btn-primary' onclick='showEventDetails(${index})'>Veure detalls</button>
                </div>
            </div>
        </div>
        `;
    });
}

document.addEventListener('DOMContentLoaded', () => {
    renderEvents();
});
