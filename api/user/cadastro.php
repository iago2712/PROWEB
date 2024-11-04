
<?php
require_once '../db.php';

$conn = getDbConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome   = $conn->real_escape_string(trim($_POST['name']));
    $senha  = $conn->real_escape_string(trim($_POST['passw']));
    $idade  = $conn->real_escape_string(trim($_POST['idade']));
    $email  = $conn->real_escape_string(trim($_POST['email']));

    $sql = "INSERT INTO trainer (nome, idade, email, senha) values ('$nome', '$idade', '$email', '$senha')";
    
    if ($conn->query($sql) === TRUE) {
        
        header('Location: ../../projeto/login.html');
        exit();
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }



} else {
    echo "Método de requisção invalido!";
}

$conn -> close();
?>