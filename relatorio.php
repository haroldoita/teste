<?php
include 'conexao.php';

$sql = "SELECT * FROM movimentacoes ORDER BY data DESC";
$result = $conn->query($sql);

$totalReceita = 0;
$totalDespesa = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Relatório</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Relatório Financeiro</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Tipo</th>
    <th>Descrição</th>
    <th>Valor</th>
    <th>Data</th>
    <th>Ações</th>
</tr>

<?php
// Verifica se a consulta retornou algum registro no banco
if ($result->num_rows > 0) {

    // Percorre todos os registros encontrados
    while($row = $result->fetch_assoc()) {

        // Verifica se o tipo da movimentação é receita
        if ($row['tipo'] == "receita") {
            // Soma o valor ao total de receitas
            $totalReceita += $row['valor'];
        } else {
            // Caso seja despesa, soma ao total de despesas
            $totalDespesa += $row['valor'];
        }

        // Exibe uma linha da tabela com os dados do banco
        echo "<tr>
                <!-- Exibe o ID do registro -->
                <td>{$row['id']}</td>

                <!-- Exibe o tipo: receita ou despesa -->
                <td>{$row['tipo']}</td>

                <!-- Exibe a descrição -->
                <td>{$row['descricao']}</td>

                <!-- Exibe o valor formatado -->
                <td>R$ {$row['valor']}</td>

                <!-- Exibe a data -->
                <td>{$row['data']}</td>

                <!-- Coluna de ações -->
                <td>
                    <!-- Link para excluir o registro passando o ID -->
                    <a href='excluir.php?id={$row['id']}'
                       onclick=\"return confirm('Tem certeza que deseja excluir?')\">
                       
                       <!-- Texto do botão -->
                       Excluir
                    </a>
                </td>
              </tr>";
    }

} else {
    // Caso não exista nenhum registro, mostra mensagem na tabela
    echo "<tr><td colspan='6'>Nenhum registro encontrado</td></tr>";
}
?>

</table>

<h3>Total Receita: R$ <?php echo number_format($totalReceita, 2, ',', '.'); ?></h3>
<h3>Total Despesa: R$ <?php echo number_format($totalDespesa, 2, ',', '.'); ?></h3>
<h3>Saldo: R$ <?php echo number_format(($totalReceita - $totalDespesa), 2, ',', '.'); ?></h3>

<a href="index.html">Voltar</a>

</body>
</html>