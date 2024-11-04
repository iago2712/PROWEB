
<html>
    <head>
        <title>PUCdex</title>
        <link rel="stylesheet" href="static/cadastro.css">
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
        <img src="../img/LOGO.png" alt="Imagem pulsante" class="imagem-pulsante">
        <form action="../api\user\cadastro.php", method="post">
            <input class='name' id="name" placeholder="Nome" name="name">
            <input class='senha' id="passw" placeholder="Senha" name="passw" type="password" >
            <input class='idade' id="idade" placeholder="Idade" name="Idade">
            <input class='email' id="email" placeholder="Email" name="email">
            <button class='button' type="submit">Cadastre-se!</button>
        </form>

        <script>
        
        </script>
    </body>

</html> 


