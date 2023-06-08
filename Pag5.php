<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorvelivery-carrinho</title>
    <link rel="icon" href="Logo2.png" type="image/png">
    <link rel="stylesheet" href="Pag5.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
    <script src="jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="fale_conoscodiv" id="fale_conoscodiv" style="top: -100%;">
        <div class="row100">
            <input type="text" id="mensagem" class="caixadetexto">
            <button onclick="Enviar();" class="enviartexto">Enviar</button>
        </div>
        <div id="resposta" class="resposta"></div>
    </div>
    <div class="cabecalho">
        <div class="cabecalho1">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="Pag3.html" width="40px">
                <img src="Linha.png" width="350px">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="Pag3.html" width="40px">
                <img src="Logo2.png" width="105px" style="margin-top: 25px;">
            </a>
        </div>
        <div class="cabecalho2">
            <input type="checkbox" id="chec">
            <nav>
                <ul>
                    <a href="Pag3.html">Início</a><font color="red">//</font>
                    <a href="Cardapio.html">Cardápio</a><font color="red">//</font>
                    <a href="lojas.html">Lojas</a><font color="red">//</font>
                    <button onclick="animar();" style="background: none;border: none;padding: 0;font: inherit;cursor: pointer;text-decoration: none;color: rgb(35, 200, 200);">Fale Conosco</button>
                </ul>
            </nav>
            <label for="chec">
                <img src="3barra.png" width="40px">
            </label>
        </div>
        <div class="cabecalho3">
            <a href="Pag5.html" width="40px">
                <img src="carrinho.png" width="40px" >
            </a>
        </div>
    </div>
    <div class="D0">
        <div class="D2">
            <font style="color: black;font-family: 'Source Sans Pro', sans-serif;font-size: 60px;margin-left: 10%;">Carrinho</font>
        </div>
        <div class="D1">
            <div class="aba_produtos">
            
            <?php
include("conecta.php");

// Recupera o conteúdo do banco de dados
$sql = "SELECT id, texto FROM conteudos";
$result = $pdo->query($sql);

// Inicia a variável para armazenar o conteúdo
$conteudo = "";

if ($result->rowCount() > 0) {
    // Exibe o conteúdo recuperado
    while ($row = $result->fetch()) {
        $conteudo .= "<p>" . $row["texto"] . "</p>";
        $conteudo .= "<form action='excluir.php' method='post'>";
        $conteudo .= "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        $conteudo .= "<input type='submit' name='excluir_" . $row["id"] . "' value='Excluir'>";
        $conteudo .= "</form>";
    }
} else {
    $conteudo = "Você não possui itens no carrinho.";
}
?>
<?php echo $conteudo; ?>

            </div>
            <div class="aba_compra">
                <a href="confirmação_endereço.html">
                    <div class="finalizar_compra">
                        <font style="color: black;font-family: 'Source Sans Pro', sans-serif;font-size: 40px;color: white;">Finalizar</font>
                    </div>
                </a>
                <div class="total_compra">
                    <font style="color: black;font-family: 'Source Sans Pro', sans-serif;font-size: 40px;color: white;">R$17,00</font>
                </div>
            </div>
        </div>
        <div class="D5"></div>
    </div>
    <script>
        topico = "nyltoneduardoconstancio";  // Variável que ficará no servidor MQTT
  
        // Conexão:
        client = new Paho.MQTT.Client("broker.hivemq.com", Number(8000), "");

        // Funções executadas quando a conexão é perdida e quando uma mensagem chega:
        client.onConnectionLost = ConexaoPerdida;
        client.onMessageArrived = MensagemRecebida;

        // Função chamada quando a conexão for realizada:
        client.connect({onSuccess:Conectar});

        // A função Conectar deve criar a variável (tópico) no computador remoto:
        function Conectar() {
            client.subscribe(topico);  // Tópico (variável) criado no servidor MQTT
        }

        function ConexaoPerdida(responseObject) {
            if (responseObject.errorCode !== 0) {
                resposta.innerHTML += "Desconectado";
            }
        }

        // Função executada quando a variável (tópico) no servidor receber uma mensagem:
        function MensagemRecebida(message) {
            resposta.innerHTML += "<br><br>" + message.payloadString; 
            resposta.scrollTo(0, document.body.scrollHeight);
        }

        function Enviar() {
            texto = mensagem.value;

            message = new Paho.MQTT.Message(texto);
            message.destinationName = topico;
            client.send(message);
        }

        var clique = 0;

        function animar() {
            clique = clique + 1;
            if (clique == 1) {
                $(".fale_conoscodiv").animate({top:'10%'}, 500);
            }
            if (clique == 2) {
                clique = 0;
                $(".fale_conoscodiv").animate({top:'-50%'}, 500);
            }
        }
    </script>
</body>
</html>