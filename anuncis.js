document.getElementById('ad_form').addEventListener('submit', function(event) {
    event.preventDefault();

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const images = document.getElementById('images').files;
    const category = document.getElementById('category').value;
    const status = document.getElementById('status').value;

    const adItem = document.createElement('div');
    adItem.classList.add('ad-item');
    
    const imgElements = Array.from(images).map(file => {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file); // Generar URL temporal per a la imatge
        return img;
    });

    adItem.innerHTML = `
        <h3>${title}</h3>
        <p>${description}</p>
        <div>${imgElements.map(img => img.outerHTML).join('')}</div>
        <p>Categoria: ${category}</p>
        <p>Estat: ${status}</p>
    `;

    document.getElementById('ads').appendChild(adItem);

    // Reiniciar formulari
    document.getElementById('ad_form').reset();
});
