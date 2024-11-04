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
            setcookie("cookie_randomizer", $user['nome'], time() + 3600, "/");
            header('Location: ../../projeto/loby.php');
            exit();
        } else {
            header('Location: ../../projeto/loginerror1.html');
        }
    } 
    else {
        header('Location: ../../projeto/loginerror2.html');
    }
} else {
    header('Location: ../../projeto/loginerror3.html');
}
$conn -> close();
?>