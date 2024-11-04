<?php
    if (!isset($_COOKIE['cookie_randomizer'])) {
        header('Location: login.html');
        exit();
    }
?>

<html>
    <head>
        <title>PROJETO-WILLIAM IAGO</title>
        <link rel="stylesheet" href="static/card.css">
        <style>
            
        </style>
    </head>
    <body >
        <div>
            <div id="tabela" class="card-container">
                <!-- Os dados serão inseridos aqui -->
            </div>
        </div>
        <button class='button' id="botao" onclick="consultarBanco()">Entre e veja sua incrível coleção</button>
    </body>
    
    <script>
    function esconderBotao() {
        document.getElementById('meuBotao').style.display = 'none';
    }
    function consultarBanco() {
        fetch('../api/func1')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na resposta da rede');
                }
                return response.text();
            })
            .then(text => {
                const obj = JSON.parse(text);
                console.log(obj);
                if(obj.length > 0) {
                    const p = document.getElementById('tabela');
                    p.innerHTML = ''; // Limpa tabela
                    const rows = obj.map(item => `                         
                                <div class="card">
                                    <div class="card-head">
                                        <div class="card-type">${item.type}</div> <!-- Tipo do Pokémon -->
                                        <img src="data:image/jpeg;base64,${item.img}" class="card-img">
                                        <h3>${item.nome}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>${item.descricao}</p>
                                    </div>
                                    <div class="card-stats">
                                        <p class="stat attack-icon">Nível: ${item.nivel}</p> <!-- Nível -->
                                    </div>
                                </div>
                    `).join('');
                    p.innerHTML = rows;
                }
            })
            .catch(error => {
                document.getElementById('output').innerHTML = '<p>Erro: ' + error.message + '</p>';
            });
        document.getElementById('botao').style.display = 'none';
    }
</script>
</html>