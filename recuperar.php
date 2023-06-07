<?php
include("conecta.php");

// Recupera o conteúdo do banco de dados
$sql = "SELECT id, texto FROM conteudos";
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
    // Exibe o conteúdo recuperado em outro HTML
    while ($row = $result->fetch()) {
        echo "<div class='conteudo'>";
        echo "<p>" . $row["texto"] . "</p>";
        echo "<form action='excluir.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='excluir_" . $row["id"] . "' value='Excluir'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "Nenhum conteúdo encontrado.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Armazenar Conteúdo</title>
    <link rel="stylesheet" href="produtos.css" type="text/css">
    <style>
        /* Estilos CSS personalizados */
        .conteudo {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
</body>
</html>
