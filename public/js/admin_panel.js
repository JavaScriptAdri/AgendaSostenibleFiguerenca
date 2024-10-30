// Mostra o amaga les seccions segons la navegació de la barra lateral
function showSection(sectionId) {
    const sections = document.querySelectorAll(".admin-section");
    sections.forEach(section => {
        section.classList.add("hidden");
    });
    document.getElementById(sectionId).classList.remove("hidden");
}

function createEvent() {
    alert("Funció per crear un nou esdeveniment.");
}

function createUser() {
    alert("Funció per crear un nou usuari.");
}

function createTip() {
    alert("Funció per crear un consell sostenible nou.");
}

function createCategory() {
    alert("Funció per crear una nova categoria.");
}

function createClassified() {
    alert("Funció per crear un anunci classificat nou.");
}

function createClassifiedCategory() {
    alert("Funció per crear una categoria d'anunci classificat nova.");
}
// Mostrar la sección seleccionada y ocultar las demás
function showSection(sectionId) {
    // Ocultar todas las secciones
    const sections = document.querySelectorAll('.admin-section');
    sections.forEach(section => {
        section.classList.add('hidden');
    });

    // Mostrar la sección seleccionada
    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.classList.remove('hidden');
    }
}

// Mostrar la sección de dashboard al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    showSection('dashboard');
});
