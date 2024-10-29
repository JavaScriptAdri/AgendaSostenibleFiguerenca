<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/estilsDelIndex.css">
    <link rel="icon" href="imatges/IconaP2.png" type="image/png">
</head>
<body>
        <div id="Iniciar-ocult" class="Iniciar-ocult">
            <div class="ocult-content">
                <div>
                    <button onclick="Ocult_registre()">X</button>
                </div>
                <h3>Inici de sesio</h3>
                <label for="UsuariR">Usuari:</label>
                <input class="UsuariR" id="UsuariR" name="UsuariR" type="text" required placeholder="Usuari">
                <label for="ContrasenyaR">Contrasenya:</label>
                <input class="ContrasenyaR" id="ContrasenyaR" name="ContrasenyaR" type="text" required placeholder="Contrasenya">
                
                <div class="button-center">
                    <button onclick="LoginUsuaris()" title="Accedeix">Accedeix</button>
                    <label>No tens un comte?<button onclick="Registrar_ocult()">Registrat!</button></label>
                </div>
            </div>
        </div>
        <div id="Registrar-ocult" class="Registrar-ocult">
            <div class="ocult-content">
                <div>
                    <button onclick="Ocult_registre()">X</button>
                </div>

                <h3>Registat</h3>
                <label for="UsuariNR">Usuari:</label>
                <input class="UsuariNR" id="UsuariNR" name="UsuariNR" type="text" required placeholder="Usuari">
                <label for="ContrasenyaNR1">Contrasenya:</label>
                <input class="ContrasenyaNR1" id="ContrasenyaNR1" name="ContrasenyaNR1" type="text" required placeholder="Contrasenya">
                <label for="ContrasenyaNR2">Repeteix la contrasenya:</label>
                <input class="ContrasenyaNR2" id="ContrasenyaNR2" name="ContrasenyaNR2" type="text" required placeholder="Contrasenya">
                
                <div class="button-center">
                        <button onclick="RegistreUsuaris()" title="Registrat">Registrat</button>
                    <label>Tens un comte?<button onclick="Iniciar_ocult()">Inicia sesio</button></label>
                </div>
            </div>
        </div>
        <div>
            <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
            <a href="index.php"><button title="Home" class="Home">Home</button></a>
            <a href=""><button title="Anuncis" class="Anuncis">Anuncis</button></a>
            <a href=""><button title="Consells" class="Consells">Consells</button></a>
            <button onclick="Iniciar_ocult()" title="Registre o inicia sesio">Inicia sesio</button>              
       </div>

        <div class="Titul_principal">
            <h1 title="Titol principal">Agenda Sostenible Figuerenca</h1>
        </div>
    <script src="js/Index.js"></script>
</body>
</html>