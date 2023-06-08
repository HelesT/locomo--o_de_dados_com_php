<?php
include("conecta.php");

$texto = $_POST['texto'] ?? '';
$texto = $conexao->real_escape_string($texto); // Evita SQL injection

$sql = "INSERT INTO conteudos (texto) VALUES ('$texto')";
if ($conexao->query($sql) === true) {
  echo "Dados inseridos com sucesso na tabela conteudos.";
} else {
  echo "Erro ao inserir dados: " . $conexao->error;
}

$conexao->close();
?>
