<?php
function ctrlConsells($request, $response, $container) {
    $response->setTemplate("consells.php");
    return $response;
}
