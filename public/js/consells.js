document.addEventListener("DOMContentLoaded", function () {
    const consells = [
        {
            titol: "Reduir l'ús de plàstic",
            descripcio: "Aprèn com evitar l'ús excessiu de plàstics a la vida diària.",
            text: "## Reduir l'ús de plàstic\nEvitar els plàstics d'un sol ús ajuda a **reduir residus** i protegeix el medi ambient. Opcions:\n- Porta bosses reutilitzables\n- Utilitza ampolles de vidre",
            etiquetes: ["#plàstic", "#mediambient", "#sostenibilitat"]
        }
    ];

    const consellsList = document.getElementById("consells-list");
    const consellForm = document.getElementById("consell-form");

    // Funció per mostrar consells
    function renderConsells() {
        consellsList.innerHTML = ''; // Buidem la llista
        consells.forEach(consell => {
            const consellDiv = document.createElement("div");
            consellDiv.className = "consell";
            consellDiv.innerHTML = `
                <h2>${consell.titol}</h2>
                <p class="descripcio">${consell.descripcio}</p>
                <div class="text">${marked.parse(consell.text)}</div>
                <p class="etiquetes">${consell.etiquetes.join(" ")}</p>
            `;
            consellsList.appendChild(consellDiv);
        });
    }

    // Renderitza els consells inicials
    renderConsells();

    // Event del formulari per afegir un consell nou
    consellForm.addEventListener("submit", function (e) {
        e.preventDefault();

        // Recollim les dades del formulari
        const nouConsell = {
            titol: document.getElementById("titol").value,
            descripcio: document.getElementById("descripcio").value,
            text: document.getElementById("text").value,
            etiquetes: document.getElementById("etiquetes").value.split(',').map(tag => `#${tag.trim()}`)
        };

        // Afegim el nou consell a la llista
        consells.push(nouConsell);

        // Renderitzem els consells actualitzats
        renderConsells();

        // Reiniciem el formulari
        consellForm.reset();
    });
});
