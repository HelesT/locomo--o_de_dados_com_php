<?php

include("conecta.php");

// Recupera o conteúdo do banco de dados
$sql = "SELECT id, texto FROM conteudos";
$result = $pdo->query($sql);

if ($result->rowCount() > 0) {
    // Exibe o conteúdo recuperado em outro HTML
    while ($row = $result->fetch()) {
        echo "<p>" . $row["texto"] . "</p>";
        echo "<form action='excluir.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='excluir_" . $row["id"] . "' value='Excluir'>";
        echo "</form>";
    }
} else {
    echo "Nenhum conteúdo encontrado.";
}
?>
