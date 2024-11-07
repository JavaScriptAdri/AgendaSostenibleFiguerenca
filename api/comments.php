<?php
include 'connexio.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtenir tots els comentaris
        $stmt = $pdo->query("SELECT * FROM comentaris");
        echo json_encode($stmt->fetchAll());
        break;
    case 'PUT':
        // Editar el contingut d'un comentari
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("UPDATE comentaris SET contingut = ?, estat = ? WHERE id = ?");
        $stmt->execute([$data['contingut'], $data['estat'], $data['id']]);
        echo json_encode(["message" => "Comentari actualitzat."]);
        break;
    case 'DELETE':
        // Eliminar un comentari
        $stmt = $pdo->prepare("DELETE FROM comentaris WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        echo json_encode(["message" => "Comentari eliminat."]);
        break;
}
?>
