<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Suposem que ja has verificat les credencials de l'usuari (usuari i contrasenya)
$usuari = $_POST['UsuariR'];
$contrasenya = $_POST['ContrasenyaR'];

if (validarUsuari($usuari, $contrasenya)) {
    $_SESSION['usuari'] = $usuari; // Guarda l'usuari a la sessió
    setcookie('usuari_registrat', 'true', time() + (86400 * 30), "/"); // Canvia la cookie a "true"
    header('Location: ../index.php'); // Redirigeix a la pàgina d'inici
    exit();
} else {
    echo "Credencials incorrectes.";
}

function validarUsuari($usuari, $contrasenya) {
    // Aquí implementaries la lògica per validar l'usuari amb la base de dades
    return true; // Per a aquest exemple, assumim que sempre és correcte
}
?>

