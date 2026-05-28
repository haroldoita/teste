<?php
// Inclui o arquivo responsável pela conexão com o banco de dados
include 'conexao.php';

// Recebe o tipo da movimentação enviado pelo formulário (POST)
$tipo = $_POST['tipo'];

// Recebe a descrição da movimentação
$descricao = $_POST['descricao'];

// Recebe o valor da movimentação
$valor = $_POST['valor'];

// Recebe a data da movimentação
$data = $_POST['data'];

// Cria o comando SQL para inserir os dados na tabela "movimentacoes"
$sql = "INSERT INTO movimentacoes (tipo, descricao, valor, data)
        VALUES ('$tipo', '$descricao', '$valor', '$data')";

// Executa o comando SQL no banco de dados
if ($conn->query($sql) === TRUE) {
    // Se deu certo, exibe mensagem de sucesso
    echo "Registro salvo com sucesso!<br>";
    
    // Link para voltar à página de cadastro
    echo "<a href='cadastro.html'>Voltar</a>";
} else {
    // Se deu erro, exibe a mensagem de erro do banco
    echo "Erro: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>