<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Produtos_sorvetes.css">
</head>
<body>
    <div class="bloco chococream">
        <div class="bloco2">
            <div class="Partição1"><img src="chococream.png" class="sorvete-produto-exemplo" width="300px"></div>
            <div class="Partição2">
                <font color="white" style="font-size: 35px;">chococream</font><br><br><br>
                <font color="white" style="font-size: 22px;">Tamanho:</font>
                <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 19px;">
                    <option style="font-size: 22px;">Pequeno</option>
                    <option style="font-size: 22px">Normal</option>
                    <option style="font-size: 22px">Grande</option>
                    <option style="font-size: 22px">Gigante</option>
                </select><br><br>
                <font color="white" style="font-size: 22px;">Acompanhamento:</font>
                <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 19px;">
                    <option style="font-size: 22px;">Leite em pó</option>
                    <option style="font-size: 22px">Canudo de chocolate</option>
                    <option style="font-size: 22px">Nozes</option>
                    <option style="font-size: 22px">Creme</option>
                </select><br><br><br>
                <font color="white" style="font-size: 35px;">R$17,00</font>
            </div>
            <div class="Partição3">                           
                <form method="POST">
                    <button type="submit" name="adicionarChococream" class="adicionar chococream"><img src="adicionar.png"></button>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Verificar se o botão foi clicado
    if (isset($_POST['adicionarChococream'])) {
        // Conteúdo HTML a ser adicionado
        $conteudo = '<div class="bloco chococream">
        <div class="bloco2" style="width:695px;heigth=236px">
            <div class="Partição1"><img src="chococream.png" class="sorvete-produto-exemplo" width="300px"></div>
            <div class="Partição2" style="width: 310px;height: 162px;font-size:162px">
                <span color="white" style="font-size: 20px;">chococream</span><br>
                <font color="white" style="font-size: 10px;">Tamanho:</font>
                <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 19px;">
                    <option style="font-size: 10px;">Pequeno</option>
                    <option style="font-size: 10px">Normal</option>
                    <option style="font-size: 10px">Grande</option>
                    <option style="font-size: 10px">Gigante</option>
                </select><br>
                <font color="white" style="font-size: 10px;">Acompanhamento:</font>
                <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 19px;">
                    <option style="font-size: 10px;">Leite em pó</option>
                    <option style="font-size: 10px">Canudo de chocolate</option>
                    <option style="font-size: 10px">Nozes</option>
                    <option style="font-size: 10px">Creme</option>
                </select><br>
                <font color="white" style="font-size: 10px;">R$17,00</font>
            </div>
            <div class="Partição3"></div>
        </div>
    </div>';

        include("conecta.php");

        if ($conexao) {
            // Preparar a consulta SQL para inserir o conteúdo na tabela
            $consulta = "INSERT INTO conteudos (texto) VALUES ('$conteudo')";

            // Executar a consulta
            $resultado = mysqli_query($conexao, $consulta);

            // Verificar se a consulta foi executada com sucesso
            if ($resultado) {
                echo "<p>Conteúdo adicionado com sucesso!</p>";
            } else {
                echo "<p>Erro ao adicionar conteúdo: " . mysqli_error($conexao) . "</p>";
            }

            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
        } else {
            echo "<p>Erro na conexão com o banco de dados: " . mysqli_connect_error() . "</p>";
        }
    }
    ?>
</body>
</html>
