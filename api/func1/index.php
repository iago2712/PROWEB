<?php
// /api/func1/index.php
require_once '../db.php';

$conn = getDbConnection();


if (isset($_COOKIE['cookie_randomizer'])){
    $trainer_name = $_COOKIE['cookie_randomizer'];
    $sql = "SELECT p.nome, p.nivel, p.img, p.descricao, tt.nome as type
                FROM pokemon p, trainer t, poke_trainer pt, poke_type pkt, ttype tt
                    WHERE p.id = pt.id_poke AND t.id = pt.id_trainer
                        AND pkt.id_poke =p.id AND pkt.id_type = tt.id
                            AND t.nome = '$trainer_name'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($rows);

}
$conn->close();
?>