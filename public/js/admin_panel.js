// Funció per mostrar una secció específica
function showSection(sectionId) {
    document.querySelectorAll('.admin-section').forEach(section => {
        section.classList.add('hidden');
    });
    document.getElementById(sectionId).classList.remove('hidden');
}

// Carregar secció inicial
document.addEventListener('DOMContentLoaded', () => {
    showSection('dashboard');
    loadEvents();
});

// Carrega la llista d'esdeveniments
async function loadEvents() {
    try {
        const response = await fetch('/api/events.php');
        const events = await response.json();
        document.getElementById('events-list').innerHTML = events.map(event => 
            `<div class="event">
                <h4>${event.titol}</h4>
                <p>${event.descripcio}</p>
                <button onclick="editEvent(${event.id})">Edita</button>
                <button onclick="deleteEvent(${event.id})">Elimina</button>
            </div>`
        ).join('');
    } catch (error) {
        console.error('Error carregant esdeveniments:', error);
    }
}

// Funció per eliminar un esdeveniment
async function deleteEvent(eventId) {
    try {
        await fetch(`/api/events.php?id=${eventId}`, { method: 'DELETE' });
        loadEvents();
    } catch (error) {
        console.error('Error eliminant esdeveniment:', error);
    }
}

// Crear esdeveniment nou
async function createEvent() {
    const newEvent = { titol: "Nou Esdeveniment", descripcio: "Descripció..." };
    try {
        await fetch('/api/events.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(newEvent)
        });
        loadEvents();
    } catch (error) {
        console.error('Error creant esdeveniment:', error);
    }
}
