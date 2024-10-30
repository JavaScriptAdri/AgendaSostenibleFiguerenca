<?php
function ctrlAnuncis($request, $response, $container) {
    $response->setTemplate("anuncis.php");
    return $response;
}
