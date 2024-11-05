<?php
// Connexió a la base de dades
include 'db_connection.php';

// Filtres
$name = $_GET['name'] ?? '';
$startDate = $_GET['start_date'] ?? '';
$endDate = $_GET['end_date'] ?? '';
$category = $_GET['category'] ?? '';

// Consulta SQL amb filtres
$query = "SELECT * FROM events WHERE 1";

if (!empty($name)) {
    $query .= " AND title LIKE '%$name%'";
}
if (!empty($startDate)) {
    $query .= " AND date >= '$startDate'";
}
if (!empty($endDate)) {
    $query .= " AND date <= '$endDate'";
}
if (!empty($category)) {
    $query .= " AND category = '$category'";
}

$result = mysqli_query($conn, $query);

// Generar la sortida HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='col-md-4'>
        <div class='card'>
            <img src='images/{$row['image']}' class='card-img-top' alt='{$row['title']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['title']}</h5>
                <p class='card-text'>{$row['description']}</p>
                <p><strong>Data:</strong> {$row['date']}</p>
                <p><strong>Categoria:</strong> {$row['category']}</p>
                <a href='event.php?id={$row['id']}' class='btn btn-primary'>Veure més</a>
            </div>
        </div>
    </div>";
}

mysqli_close($conn);
?>
