<?php
function ctrlAnuncis($request, $response, $container) {
    $response->setTemplate("Anuncis.php");
    return $response;
}
