<?php
include 'connexio.php'; // Carrega el fitxer de connexió

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Obtenir un esdeveniment específic per ID
            $stmt = $pdo->prepare("SELECT * FROM esdeveniments WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            echo json_encode($stmt->fetch());
        } else {
            // Obtenir tots els esdeveniments ordenats per visualitzacions
            $stmt = $pdo->query("SELECT * FROM esdeveniments ORDER BY num_visualitzacions DESC");
            echo json_encode($stmt->fetchAll());
        }
        break;
    case 'POST':
        // Crear un nou esdeveniment
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("INSERT INTO esdeveniments (titol, latitud, longitud, descripcio, tipus, data, hora, id_categoria, id_usuari) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['titol'], $data['latitud'], $data['longitud'], $data['descripcio'], $data['tipus'], $data['data'], $data['hora'], $data['id_categoria'], $data['id_usuari']]);
        echo json_encode(["id" => $pdo->lastInsertId()]);
        break;
    case 'PUT':
        // Actualitzar un esdeveniment existent
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $pdo->prepare("UPDATE esdeveniments SET titol = ?, descripcio = ?, tipus = ?, data = ?, hora = ?, id_categoria = ?, id_usuari = ? WHERE id = ?");
        $stmt->execute([$data['titol'], $data['descripcio'], $data['tipus'], $data['data'], $data['hora'], $data['id_categoria'], $data['id_usuari'], $data['id']]);
        echo json_encode(["message" => "Esdeveniment actualitzat."]);
        break;
    case 'DELETE':
        // Eliminar un esdeveniment
        $stmt = $pdo->prepare("DELETE FROM esdeveniments WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        echo json_encode(["message" => "Esdeveniment eliminat."]);
        break;
}
?>
