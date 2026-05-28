<?php

// Cria conexão com banco SQLite
$conn = new SQLite3('controle_financeiro.db');

// Cria tabela caso não exista
$conn->exec("
CREATE TABLE IF NOT EXISTS movimentacoes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tipo TEXT,
    descricao TEXT,
    valor REAL,
    data TEXT
)
");

?>