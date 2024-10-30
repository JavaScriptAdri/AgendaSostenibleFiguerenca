<?php
function ctrlEsdeveniments($request, $response, $container) {
    $response->setTemplate("esdeveniments.php");
    return $response;
}
