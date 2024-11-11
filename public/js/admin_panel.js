// Exemple de funció AJAX per crear un esdeveniment
function createEvent() {
    const title = prompt("Títol de l'esdeveniment:");
    const description = prompt("Descripció:");
    const date = prompt("Data (YYYY-MM-DD):");
    const location = prompt("Ubicació:");
    
    if (title && description && date && location) {
        fetch('/src/views/admin_functions.php?action=createEvent', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, description, date, location })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Esdeveniment creat amb èxit!");
                loadEvents(); // Funció per refrescar la llista d'esdeveniments
            } else {
                alert("Error en crear l'esdeveniment.");
            }
        });
    }
}

// Funció AJAX per crear un usuari
function createUser() {
    const username = prompt("Nom d'usuari:");
    const email = prompt("Correu electrònic:");
    const role = prompt("Rol de l'usuari (admin, usuari, etc.):");
    
    if (username && email && role) {
        fetch('/src/views/admin_functions.php?action=createUser', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, email, role })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Usuari creat amb èxit!");
                loadUsers(); // Funció per refrescar la llista d'usuaris
            } else {
                alert("Error en crear l'usuari.");
            }
        });
    }
}

// Funció AJAX per crear un consell sostenible
function createTip() {
    const tipContent = prompt("Contingut del consell:");
    
    if (tipContent) {
        fetch('/src/views/admin_functions.php?action=createTip', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ content: tipContent })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Consell creat amb èxit!");
                loadTips(); // Funció per refrescar la llista de consells
            } else {
                alert("Error en crear el consell.");
            }
        });
    }
}

// Funció AJAX per crear una categoria
function createCategory() {
    const categoryName = prompt("Nom de la categoria:");
    
    if (categoryName) {
        fetch('/src/views/admin_functions.php?action=createCategory', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: categoryName })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Categoria creada amb èxit!");
                loadCategories(); // Funció per refrescar la llista de categories
            } else {
                alert("Error en crear la categoria.");
            }
        });
    }
}

// Funció AJAX per crear un anunci classificat
function createClassified() {
    const title = prompt("Títol de l'anunci:");
    const description = prompt("Descripció:");
    const category = prompt("Categoria de l'anunci:");
    
    if (title && description && category) {
        fetch('/src/views/admin_functions.php?action=createClassified', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ title, description, category })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Anunci creat amb èxit!");
                loadClassifieds(); // Funció per refrescar la llista d'anuncis classificats
            } else {
                alert("Error en crear l'anunci.");
            }
        });
    }
}

// Funció AJAX per crear una categoria d'anuncis
function createClassifiedCategory() {
    const categoryName = prompt("Nom de la categoria d'anunci:");
    
    if (categoryName) {
        fetch('/src/views/admin_functions.php?action=createClassifiedCategory', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: categoryName })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Categoria d'anunci creada amb èxit!");
                loadClassifiedCategories(); // Funció per refrescar la llista de categories d'anuncis
            } else {
                alert("Error en crear la categoria d'anunci.");
            }
        });
    }
}
