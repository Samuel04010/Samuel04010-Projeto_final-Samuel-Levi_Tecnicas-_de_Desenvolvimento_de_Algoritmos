
CREATE DATABASE IF NOT EXISTS farmacia;
USE farmacia;


CREATE TABLE fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(100) NOT NULL,
    cnpj VARCHAR(18) UNIQUE NOT NULL,
    telefone VARCHAR(15)
);


CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100) NOT NULL,
    codigo_barras VARCHAR(50) UNIQUE,
    preco_venda DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL,
    fornecedor_id_fornecedor INT NOT NULL,
    FOREIGN KEY (fornecedor_id_fornecedor) REFERENCES fornecedores(id_fornecedor) ON DELETE RESTRICT ON UPDATE CASCADE
);


INSERT INTO fornecedores (nome_fornecedor, cnpj, telefone) VALUES 
('Eurofarma Laboratórios', '06.840.457/0001-83', '(11) 98765-4321'),
('Medley Farmacêutica', '51.916.173/0001-00', '(11) 99887-7665');

INSERT INTO produtos (nome_produto, codigo_barras, preco_venda, quantidade_estoque, fornecedor_id_fornecedor) VALUES 
('Dipirona 500mg - 10 comp.', '7896004702159', 8.50, 150, 1),
('Amoxicilina 500mg - 21 comp.', '7898040325432', 45.99, 80, 2),
('Omeprazol 20mg - 30 cáps.', '7891234567890', 12.00, 200, 1);
