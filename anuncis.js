// Navegació entre seccions
function showSection(sectionId) {
    document.querySelectorAll(".admin-section").forEach(section => section.classList.add("hidden"));
    document.getElementById(sectionId).classList.remove("hidden");

    document.querySelectorAll(".sidebar ul li").forEach(li => li.classList.remove("active"));
    document.querySelector(`[onclick="showSection('${sectionId}')"]`).classList.add("active");
}

function createEvent() { alert("Funció per crear un nou esdeveniment."); }
function createUser() { alert("Funció per crear un nou usuari."); }
function createTip() { alert("Funció per crear un consell sostenible nou."); }
function createCategory() { alert("Funció per crear una nova categoria."); }
