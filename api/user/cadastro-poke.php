<?php
    if (!isset($_COOKIE['cookie_randomizer'])) {
        header('Location: login.html');
        exit(); 
    }
?>

<?php
require_once '../db.php';

$conn = getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome_poke          = $conn->real_escape_string(trim($_POST['name']));
    $descricao_poke     = $conn->real_escape_string(trim($_POST['descricao']));
    $nivel              = $conn->real_escape_string(trim($_POST['nivel']));
    $type               = $conn->real_escape_string(trim($_POST['type']));
    $imgTmp            = $_FILES['img']['tmp_name'];
    $img               = base64_encode(file_get_contents($imgTmp));
    $valor_cookie      = $_COOKIE['cookie_randomizer'];

    $sql = "INSERT INTO pokemon (nome, descricao, img, nivel) values ('$nome_poke', '$descricao_poke', '$img', '$nivel')";

    if ($conn->query($sql) === TRUE) {
        $pokemonid = $conn->insert_id;
        $sql2 = "INSERT INTO poke_type (id_poke, id_type) VALUES ('$pokemonid', '$type')";
        $conn->query($sql2);
        $sql3 = "SELECT id FROM trainer WHERE nome = '$valor_cookie'";
        $result = $conn->query($sql3);
        if ($result->num_rows > 0){
            $user_id = $result->fetch_assoc();
            $user_id = $user_id['id'];
            $sql4 = "INSERT INTO poke_trainer (id_poke, id_trainer) VALUES ('$pokemonid', '$user_id')";
            if ($conn->query($sql4) === TRUE) {
                header('Location: ../../projeto/cadastro_poke.php');
                exit();
            }
        }
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
} else {
    echo "Metodo de requiscao invalido!";
}
$conn -> close();
?>