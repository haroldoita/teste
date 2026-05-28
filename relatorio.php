<?php
include 'conexao.php';

$result = $conn->query("
    SELECT * FROM movimentacoes
    ORDER BY data DESC
");

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

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

    if ($row['tipo'] == "receita") {
        $totalReceita += $row['valor'];
    } else {
        $totalDespesa += $row['valor'];
    }

    echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['tipo']}</td>
        <td>{$row['descricao']}</td>
        <td>R$ {$row['valor']}</td>
        <td>{$row['data']}</td>

        <td>
            <a href='excluir.php?id={$row['id']}'
            onclick=\"return confirm('Deseja excluir?')\">
            Excluir
            </a>
        </td>
    </tr>
    ";
}

?>

</table>

<h3>Total Receita:
R$ <?php echo number_format($totalReceita, 2, ',', '.'); ?>
</h3>

<h3>Total Despesa:
R$ <?php echo number_format($totalDespesa, 2, ',', '.'); ?>
</h3>

<h3>Saldo:
R$ <?php echo number_format(($totalReceita - $totalDespesa), 2, ',', '.'); ?>
</h3>

<a href="index.html">Voltar</a>

</body>
</html>