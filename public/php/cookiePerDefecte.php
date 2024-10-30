<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Si no hi ha un usuari registrat, crea la cookie per defecte
if (!isset($_SESSION['usuari'])) {
    setcookie('usuari_registrat', 'false', time() + (86400 * 30), "/"); // Cookie per defecte
}
?>
