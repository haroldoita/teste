<?php
include 'conexao.php';

// Verifica se recebeu o ID
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Comando para deletar
    $sql = "DELETE FROM movimentacoes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso!<br>";
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }

} else {
    echo "ID não informado!";
}

echo "<br><a href='relatorio.php'>Voltar</a>";

$conn->close();
?>