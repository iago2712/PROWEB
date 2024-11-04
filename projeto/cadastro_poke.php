<?php
    if (!isset($_COOKIE['cookie_randomizer'])) {
        header('Location: login.html');
        exit();
    }
?>

<html>

    <head>
        <title>PUCdex</title>
        <link rel="stylesheet" href="static/cadastro_poke.css">
    </head>

    <body>
        <div class="retangulo topo">
            <div class="circulo azul"></div>
            <div class="circulo vermelho"></div>
            <div class="circulo amarelo"></div>
            <div class="circulo verde"></div>
        </div>
        <div class="fundo">
            <img class="imagem-back" src="../img/fundolaboratorio.jpg">
        </div>
        <div class="retangulo baixo">
            <div class="retangulo-verde"></div> 
            <div class="retangulo-preto left"></div> 
            <div class="retangulo-preto right"></div> 
            <div class="cruz horizontal"></div> 
            <div class="cruz vertical"></div>
        </div>
        <img src="../img/cadastre.png" alt="Imagem pulsante" class="imagem-pulsante">

        <form action="../api\user\cadastro-poke.php", method="post" enctype="multipart/form-data">
            <input class='name' id="name" placeholder="Nome do Pokemon" name="name">
            <input class='descricao' id="descricao" placeholder="Descricao do pokemon:" name="descricao">
            <input class='img' id="img" name="img" type='file' accept='image/*' enctype="multipart/form-data" placeholder="Imagem para o pokemon:" required>
            <input class='nivel' id="nivel" placeholder="Nivel do pokemon:" name="nivel">
            <select class='types' name="type" id="type">
                <?php
                require_once '../api/db.php';
                $conn = getDbConnection();

                if ($conn->connect_error) {
                    die("Erro de conexão: " . $conn->connect_error);
                }
                $sql = "SELECT id, nome FROM ttype";
                $result = $conn->query($sql);
                if  ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tabela de tipos está vazia.</option>";
                }
                $conn->close();
                ?>
            </select>
            <button class='button' type="submit">Cadastre o Pokemon!</button>           
        </form>
        <a href="loby.php"><button class='voltar' type="submit">Voltar ao Lobby</button></a> 
        <script>
        </script>
    </body>

</html> 