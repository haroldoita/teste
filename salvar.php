<?php
include 'conexao.php';

$tipo = $_POST['tipo'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];

// Prepara comando SQL
$stmt = $conn->prepare("
    INSERT INTO movimentacoes (tipo, descricao, valor, data)
    VALUES (:tipo, :descricao, :valor, :data)
");

$stmt->bindValue(':tipo', $tipo);
$stmt->bindValue(':descricao', $descricao);
$stmt->bindValue(':valor', $valor);
$stmt->bindValue(':data', $data);

// Executa
if ($stmt->execute()) {

    echo "
    <h2>Registro salvo com sucesso!</h2>
    <a href='cadastro.html'>Voltar</a>
    ";

} else {

    echo "Erro ao salvar.";

}
?>