<?php
session_start();
session_unset();
session_destroy();

// Eliminar la cookie d'autenticació
setcookie("auth_token", "", time() - 3600, "/");

header("Location: login.php");
exit();
