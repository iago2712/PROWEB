<?php
require_once '../db.php';

$conn = getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
 
    $nome   = $conn->real_escape_string(trim($_POST['name']));
    $senha  = $conn->real_escape_string(trim($_POST['passw']));
    
    $sql = "SELECT nome, senha FROM trainer WHERE nome = '$nome'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0){

        $user   = $result->fetch_assoc();

        if ($senha === $user['senha']){
            echo "Login Realizado com sucesso";
        } else {
            echo "Login falhou";
        }
    } 
    else {
        echo "Usuário não encontrado!";
    }
} else {
    echo "Método de aquisição invalido";
}
$conn -> close();
?>