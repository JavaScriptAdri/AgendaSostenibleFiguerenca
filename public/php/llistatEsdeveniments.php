<?php
// Connexió a la base de dades
$conn = new mysqli("172.19.0.2", "admin", "admin", "agenda_figuerenca_db");
// Comprovar connexió
if ($conn->connect_error) {
        die("Connexió fallida: " . $conn->connect_error);
    }
    
    // Executar la consulta per obtenir els esdeveniments
    $query = "SELECT id, titol, descripcio, data, hora, imatges FROM esdeveniments";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $titol = htmlspecialchars($row['titol']);
            $descripcio = htmlspecialchars($row['descripcio']);
            $data = htmlspecialchars($row['data']);
            $hora = htmlspecialchars($row['hora']);
            $imatges = json_decode($row['imatges'], true);
    
            // Si la imatge existeix, utilitza-la; en cas contrari, mostra una imatge predeterminada
            $imatgeSrc = isset($imatges[0]) ? 'imatges/' . htmlspecialchars($imatges[0]) : 'imatges/default.png';
    
            echo "
            <div class='esdeveniment'>
                <img src='$imatgeSrc' alt='Icona esdeveniment'>
                <div class='esdeveniment_detalls'>
                    <h3>$titol</h3>
                    <p>$descripcio</p>
                    <p>Data: $data, Hora: $hora</p>
                    <a href='#' class='saber_mes'>Saber més..</a>
                </div>
            </div>
            ";
        }
    } else {
        echo "<p>No s'han trobat esdeveniments.</p>";
    }
    
    // Tancar la connexió
    $conn->close();
    ?>