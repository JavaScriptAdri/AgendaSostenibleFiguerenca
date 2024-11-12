<?php
function ctrlConsells($request, $response, $container) {
    $response->setTemplate("Consells.php");
    return $response;
}
