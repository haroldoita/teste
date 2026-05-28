CREATE DATABASE controle_financeiro;

USE controle_financeiro;

CREATE TABLE movimentacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(10),
    descricao VARCHAR(100),
    valor DECIMAL(10,2),
    data DATE
);
