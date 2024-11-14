<?php
// Connexió a la base de dades
$conn = new mysqli("172.19.0.2", "admin", "admin", "agenda_figuerenca_db");
// Comprovar connexió
if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}

// Executar la consulta per obtenir els consells
$query = "SELECT titol, descripcio_breu, text_explicatiu, etiquetes FROM consells";
$result = $conn->query($query);

$consells = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $consells[] = $row;
    }
} else {
    echo "No s'han trobat consells.";
}

// Tancar la connexió
$conn->close();
