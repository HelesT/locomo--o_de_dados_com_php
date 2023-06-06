<?php
include("conecta.php");

// Verifica qual botão "Excluir" foi clicado
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $buttonName = 'excluir_' . $id;

    if (isset($_POST[$buttonName])) {
        // Exclui o conteúdo do banco de dados
        try {
            $sql = "DELETE FROM conteudos WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redireciona de volta à página recuperar.php
            header("Location: recuperar.php");
            exit();
        } catch (PDOException $erro) {
            echo "Erro ao excluir o conteúdo: " . $erro->getMessage();
        }
    } else {
        echo "ID inválido.";
    }
} else {
    echo "ID inválido.";
}
?>