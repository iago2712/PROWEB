<?php
    if (!isset($_COOKIE['cookie_randomizer'])) {
        header('Location: login.html');
        exit(); 
    }
?>

<html>
    <head>
        <title>PUCdex</title>
        <link rel="stylesheet" href="static/loby.css">
    </head>
    <body>
        <div class="retangulo topo">
            <div class="circulo azul"></div>
            <div class="circulo vermelho"></div>
            <div class="circulo amarelo"></div>
            <div class="circulo verde"></div>
        </div>
        <div class="fundo">
            <img class="imagem-back" src="../img/fundo1.jpeg">
        </div>
        <div class="retangulo baixo">
            <div class="retangulo-verde"></div> 
            <div class="retangulo-preto left"></div> 
            <div class="retangulo-preto right"></div> 
            <div class="cruz horizontal"></div> 
            <div class="cruz vertical"></div>
        </div>
        <div>
            <a href="consultado.php"><button class="button-quarto" onclick="">Quarto</button></a>
            <a href="cadastro_poke.php"><button class="button-laboratório" onclick="">Laboratorio</button></a>
        </div>     
        <img src="../img/dica.png" class="imagem">
    </body>
</html>
