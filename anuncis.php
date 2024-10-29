<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="anuncis.css">
    <title>Anuncis Classificats</title>
</head>
<body>
    <header>
        <h1>Anuncis Classificats</h1>
    </header>
    
    <main>
        <section id="create_ad">
            <h2>Crear Anunci</h2>
            <form id="ad_form">
                <label for="title">Títol:</label>
                <input type="text" id="title" required>

                <label for="description">Descripció:</label>
                <textarea id="description" rows="5" required></textarea>

                <label for="images">Imatges:</label>
                <input type="file" id="images" accept="image/*" multiple>

                <label for="category">Categoria:</label>
                <select id="category">
                    <option value="mobles">Mobles</option>
                    <option value="vehicles">Vehicles</option>
                    <option value="electrodomestics">Electrodomèstics</option>
                    <option value="tecnologia">Tecnologia</option>
                </select>

                <label for="status">Estat:</label>
                <select id="status">
                    <option value="esborrany">Esborrany</option>
                    <option value="public">Públic</option>
                    <option value="caducat">Caducat</option>
                    <option value="esborrat">Esborrat</option>
                </select>

                <button type="submit">Crear Anunci</button>
            </form>
        </section>

        <section id="ad_list">
            <h2>Anuncis Existents</h2>
            <div id="ads"></div>
        </section>
    </main>

    <script src="anuncis.js"></script>
</body>
</html>
