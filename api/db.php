<?php


// db.php
function getDbConnection() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banco1";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}


?>