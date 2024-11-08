<?php
// Nom i valor per defecte de la cookie
$cookieName = "usuari_defecte";
$cookieValue = "visitant";
$cookieExpiration = time() + (365 * 24 * 60 * 60); // 1 any

// Comprova si la cookie ja està configurada
if (!isset($_COOKIE[$cookieName])) {
    // Si la cookie no existeix, crea-la amb els valors per defecte
    setcookie($cookieName, $cookieValue, $cookieExpiration, "/"); // '/' fa que la cookie sigui accessible a tot el lloc
}

// Opcional: assigna el valor de la cookie a una variable per utilitzar-lo
$usuariDefecte = $_COOKIE[$cookieName] ?? $cookieValue;
?>
