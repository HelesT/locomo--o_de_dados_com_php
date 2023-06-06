<?php

include("conecta.php");

// Verifica se o conteúdo foi enviado
if (isset($_POST['conteudo'])) {
    $conteudo = $_POST['conteudo'];

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
        <textarea name="conteudo" rows="4" cols="50" placeholder="Digite o conteúdo..."></textarea><br>
        <input type="submit" value="Armazenar">
    </form>
</body>
</html>

