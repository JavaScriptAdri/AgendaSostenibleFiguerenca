<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consells de Sostenibilitat</title>
    <link rel="stylesheet" href="consells.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/4.0.10/marked.min.js"></script>
</head>
<body>
    <header>
        <h1>Consells de Sostenibilitat</h1>
        <p>Explora consells per a un estil de vida més sostenible o afegeix els teus propis consells.</p>
    </header>

    <main>
        <section id="add-consell">
            <h2>Afegeix un Consell de Sostenibilitat</h2>
            <form id="consell-form">
                <label for="titol">Títol:</label>
                <input type="text" id="titol" name="titol" required>

                <label for="descripcio">Descripció breu:</label>
                <input type="text" id="descripcio" name="descripcio" required>

                <label for="text">Text explicatiu (Markdown):</label>
                <textarea id="text" name="text" required></textarea>

                <label for="etiquetes">Etiquetes (separades per comes):</label>
                <input type="text" id="etiquetes" name="etiquetes">

                <button type="submit">Afegeix Consell</button>
            </form>
        </section>

        <section id="consells-list">
            <h2>Llistat de Consells</h2>
            <!-- Consells es carregaran aquí -->
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Consells de Sostenibilitat</p>
    </footer>

    <script src="consells.js"></script>
</body>
</html>
