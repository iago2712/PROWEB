<?php


// db.php
function getDbConnection() {

    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "pokemon";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    return $conn;
}


?>