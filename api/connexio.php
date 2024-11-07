<?php
// Dades de connexió
$host = 'localhost';  // Canvia aquest valor si tens un altre servidor de base de dades
$dbname = 'agenda_figuerenca';
$user = 'admin';
$password = 'admin';

try {
    // Estableix la connexió amb PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de connexió: " . $e->getMessage();
    exit;  // Atura l'execució si hi ha error
}
?>
