<?php
include("conecta.php");

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $conteudo = '<div class="bloco">
    <div class="bloco2">
        <div class="Partição1"><img src="Casquinha.png" class="sorvete-produto-exemplo" width="176px"></div>
        <div class="Partição2">
            <font color="white" style="font-size: 22px;">Casquinha Hot Chilly Pappers</font><br><br>
            <font color="white" style="font-size: 15px;">Tamanho:</font>
            <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 12px;">
                <option style="font-size: 12px;">Pequeno</option>
                <option style="font-size: 12px;">Normal</option>
                <option style="font-size: 12px;">Grande</option>
                <option style="font-size: 12px;">Gigante</option>
            </select><br><br>
            <font color="white" style="font-size: 15px;">Acompanhamento:</font>
            <select class="tamanho_produto" style="border: 0px none; background-color:rgb(28, 221, 221); color: white; font-size: 12px;">
                <option style="font-size: 12px;">Leite em pó</option>
                <option style="font-size: 12px;">Canudo de chocolate</option>
                <option style="font-size: 12px;">Nozes</option>
                <option style="font-size: 12px;">Creme</option>
            </select><br><br><br>
            <div class="preco_compra">
                <font color="white" style="font-size: 15px;">R$17,00</font>
                <div class="compra" style="color: white;">
                    + | +
                </div>
            </div>
        </div>
    </div>
</div>';

    // Armazena o conteúdo na base de dados
    try {
        $sql = "INSERT INTO conteudos (texto) VALUES (:conteudo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->execute();

        // Redireciona de volta à página armazenar.php
        header("Location: armazenar.php");
        exit();
    } catch (PDOException $erro) {
        echo "Erro ao armazenar o conteúdo: " . $erro->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Armazenar Conteúdo</title>
</head>
<body>
    <h1>Armazenar Conteúdo</h1>
    <form action="armazenar.php" method="post">
        <button type="submit" name="submit" value="Armazenar">Armazenar</button>
    </form>
</body>
</html>
