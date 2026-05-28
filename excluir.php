<?php
include 'conexao.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare("
        DELETE FROM movimentacoes
        WHERE id = :id
    ");

    $stmt->bindValue(':id', $id);

    if ($stmt->execute()) {

        echo "Registro excluído com sucesso!";

    } else {

        echo "Erro ao excluir.";

    }

}

echo "<br><a href='relatorio.php'>Voltar</a>";
?>