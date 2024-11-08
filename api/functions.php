<?php
// Incloure la connexió a la base de dades
include 'api/connexio.php';

// Funció per obtenir tots els anuncis
function getAllAnnouncements() {
    global $conn;
    $sql = "SELECT * FROM announcements ORDER BY date_posted DESC"; // Consulta SQL per obtenir els anuncis
    $result = $conn->query($sql);

    $announcements = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;  // Afegir cada anunci al array
        }
    }
    return $announcements;
}
?>
