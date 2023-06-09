<?php
date_default_timezone_set('America/Sao_Paulo');

// CONEXÃO COM A BASE DE DADOS: verifique sempre o dbname
try {
    $pdo = new PDO("mysql:dbname=sorvelivery;host=localhost;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "ERRO NA CONEXÃO: <br>" . $erro->getMessage();
}

// Verificar se o botão foi clicado
if (isset($_POST['adicionarChococream'])) {
    // Conteúdo HTML a ser adicionado
    $conteudo = '<div class="bloco chococream">
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
            <div class="Partição3"></div>
        </div>
    </div>';

    if ($pdo) {
        try {
            // Preparar a consulta SQL para inserir o conteúdo na tabela
            $consulta = "INSERT INTO conteudos (texto) VALUES (?)";
            $stmt = $pdo->prepare($consulta);
            $stmt->execute([$conteudo]);
        } catch (PDOException $erro) {
            echo "<p>Erro ao adicionar conteúdo: " . $erro->getMessage() . "</p>";
        }
    } else {
        echo "<p>Erro na conexão com o banco de dados.</p>";
    }
}
?>
