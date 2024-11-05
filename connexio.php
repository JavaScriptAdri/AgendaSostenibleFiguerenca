<?php
$host = 'db';
$dbname = 'agenda_figuerenca';
$user = 'user';
$password = 'user_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexió amb èxit!";
} catch (PDOException $e) {
    echo "Error de connexió: " . $e->getMessage();
}
?>
