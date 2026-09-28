CREATE DATABASE gestao_brinquedos;

USE gestao_brinquedos;

CREATE TABLE brinquedos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    faixa_etaria VARCHAR(50) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL
);

INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade) VALUES
('Carrinho de Controle Remoto', 'Veículos', '5 a 8 anos', 89.90, 15),
('Boneca Fala Muito', 'Bonecas', '3 a 6 anos', 59.50, 10),
('Quebra-cabeça 100 peças', 'Jogos', '6 a 10 anos', 34.90, 25),
('Blocos de Montar', 'Educativos', '4 a 8 anos', 79.00, 0);