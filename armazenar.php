<?php
include("conecta.php");

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {
    $conteudo = '1';

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
