<?php
include 'php/controlLogin.php';
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessió</title>
    <link rel="stylesheet" href="css/login.css">
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
    <div class="login-container">
        <h2>Iniciar Sessió</h2>
        <form action="php/controlLogin.php" method="POST" class="login-form">
            <input type="text" name="nom_dusuari" placeholder="Nom d'usuari" required>
            <input type="password" name="contrasenya" placeholder="Contrasenya" required>
            <button type="submit">Iniciar Sessió</button>
        </form>
    </div>
</body>
</html>
