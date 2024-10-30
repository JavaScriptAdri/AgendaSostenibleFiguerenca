<?php

function ctrlPerfil($request, $response, $container) {
    // Suposem que estàs obtenint el nom de l'usuari d'una cookie o d'una base de dades
    $usuari = $request->get(INPUT_GET, "usuari"); // Exemple: paràmetre de la URL o cookie

    $response->set("usuari", $usuari); // Enviem les dades a la vista
    $response->setTemplate("perfil.php"); // Indiquem la plantilla que ha de carregar

    return $response;
}
