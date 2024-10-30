<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Elimina les dades de sessió
unset($_SESSION['usuari']); // Elimina la sessió de l'usuari

// Elimina la cookie d'usuari
setcookie('usuari_registrat', '', time() - 3600, "/"); // Estableix la cookie a un temps passat

// Redirigeix a la pàgina d'inici
header('Location: ../index.php');
exit();
?>
