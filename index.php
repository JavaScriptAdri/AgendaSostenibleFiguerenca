
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="IconaP2.png" type="image/png">
</head>
<body>
    <div>
    <img src="" alt="" title="">
    <button onclick="Iniciar_ocult()" title="Registre o inicia sesio">Inicia sesio</button>
    </div>
    <div id="Iniciar-ocult" class="Iniciar-ocult">
        <div class="ocult-content">
            <div>
                <button onclick="Ocult_registre()">X</button>
            </div>
            <h3>Inici de sesio</h3>
            <label for="Usuari">Usuari:</label>
            <input class="Usuari" id="Usuari" name="Usuari" type="text">
            <label for="Contrasenya">Contrasenya:</label>
            <input class="Contrasenya" id="Contrasenya" name="Contrasenya" type="text">
            
            <div class="button-center">
                <button onclick="">Accedeix</button>
                <label for="">No tens un comte?<button onclick="Registrar_ocult()">Registrat!</button></label>
            </div>
        </div>
    </div>
    <div id="Registrar-ocult" class="Registrar-ocult">
        <div class="ocult-content">
            <div>
                <button onclick="Ocult_registre()">X</button>
            </div>
            <h3>Registat</h3>
            <label for="">Usuari</label>
            <input type="text">
            <label for="">Contrasenya</label>
            <input type="text">
            <label for="">Repeteix la contrasenya</label>
            <input type="text">
            
            <div class="button-center">
                <button onclick="">Registrat</button>
                <label for="">Tens un comte?<button onclick="Iniciar_ocult()">Inicia sesio</button></label>
            </div>
        </div>
    </div>
    <div>
    <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
    </div>
    <div class="Titul_principal">
    <h1 title="Titul principal">Agenda Sostenible Figuerenca</h1>
    </div>
    <script src="Index.js"></script>
</body>
</html>

