<?php
// Aquesta és una simulació de dades
$esdeveniments = [
    [
        "id" => 1,
        "titol" => "Caminada per la Natura",
        "categoria" => "Exterior",
        "descripcio" => "Una caminada per gaudir de la natura.",
        "data_inici" => "2024-11-10",
        "data_final" => "2024-11-10",
        "latitud" => 41.3879,
        "longitud" => 2.16992,
        "imatge" => "caminada.jpg"
    ],
    // Més esdeveniments...
];

header('Content-Type: application/json');
echo json_encode($esdeveniments);
?>
