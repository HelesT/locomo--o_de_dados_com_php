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
    $conteudo = "Nenhum conteúdo encontrado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Armazenar Conteúdo</title>
    <link rel="stylesheet" href="Pag5.css" type="text/css">
</head>
<body>
    <div id="divEspecifica">
        <?php echo $conteudo; ?>
    </div>
</body>
</html>
