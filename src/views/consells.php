<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'php/cookiePerDefecte.php'; // Inclou el fitxer que crea la cookie per defecte
include '../connexio.php'; // Inclou el fitxer de connexió a la base de dades

// Inclou el controlador o arxiu que carrega els consells
include 'php/llistar_consells.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consells</title>
    <link rel="stylesheet" href="css/estilsDelIndex.css">
    <link rel="stylesheet" href="css/consells.css">
    <link rel="icon" href="imatges/IconaP2.png" type="image/png">
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

        <div class="Titul_principal">
            <h1 title="Titol principal">Consells</h1>
        </div>

    <h2>Llistat de Consells</h2>
    <table>
        <thead>
            <tr>
                <th>Títol</th>
                <th>Descripció Breu</th>
                <th>Text Explicatiu</th>
                <th>Etiquetes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consells as $consell): ?>
            <tr>
                <td><?php echo htmlspecialchars($consell['titol']); ?></td>
                <td><?php echo htmlspecialchars($consell['descripcio_breu']); ?></td>
                <td><?php echo htmlspecialchars($consell['text_explicatiu']); ?></td>
                <td><?php echo htmlspecialchars(implode(', ', json_decode($consell['etiquetes']))); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
      // Assigna el nom de l'usuari a una variable JavaScript
      var usuari = <?php echo isset($_SESSION['usuari']) ? json_encode($_SESSION['usuari']) : 'null'; ?>;
    </script>
    <script src="js/Index.js"></script>
</body>
</html>
