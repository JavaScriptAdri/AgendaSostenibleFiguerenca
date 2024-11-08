<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'php/cookiePerDefecte.php'; // Inclou el fitxer que crea la cookie per defecte
include '../connexio.php'; // Inclou el fitxer de connexió a la base de dades
include 'php/controlRegistre.php';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra't</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/estilsDelIndex.css">
    <link rel="stylesheet" href="css/anuncis.css">
</head>
<body>
        <div class="top_llegenda">
            <img src="imatges/IconaP2.png" alt="Agenda Sostenible Figuerenca" title="Agenda Sostenible Figuerenca">
            <a href="index.php"><button title="Home" class="Home">Home</button></a>
            <a href="index.php?r=anuncis"><button title="Anuncis" class="Anuncis">Anuncis</button></a>
            <a href="index.php?r=consells"><button title="Consells" class="Consells">Consells</button></a> 
            <a href="index.php?r=esdeveniments"><button title="Buscador Esdeveniments" class="EsdevenimentsBuscador">Buscador esdeveniments</button></a> 
            <a href="index.php?r=login"><button title="Iniciar sessió" class="Iniciar sessió"> Iniciar sessió</button></a>
            <a href="index.php?r=register"><button title="Registrar-se" class="Registrar">Registrar-se</button></a>           
       </div>
    <div class="register-container">
        <h2>Registra't</h2>
        <form action="php/register.php" method="POST" class="register-form">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="cognoms" placeholder="Cognoms" required>
            <input type="text" name="nom_dusuari" placeholder="Nom d'usuari" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit">Registrar-se</button>
        </form>
    </div>
</body>
</html>
