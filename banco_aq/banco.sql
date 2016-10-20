DROP DATABASE IF EXISTS acessmotos;

CREATE DATABASE acessmotos;

USE acessMotos;

CREATE TABLE pais (
id INT NOT NULL AUTO_INCREMENT,
nome varchar(50),
sigla varchar(3),
PRIMARY KEY(id)
);

CREATE TABLE estado (
id INT NOT NULL AUTO_INCREMENT,
nome varchar(50) NOT NULL,
sigla varchar(2) NOT NULL,
idPais INT NOT NULL,
PRIMARY KEY(id),

CONSTRAINT fk_estado_pais
    FOREIGN KEY (idPais)
    REFERENCES pais (id)
);

CREATE TABLE cidade (
id INT NOT NULL AUTO_INCREMENT,
nome varchar(50),
idEstado int NOT NULL,
PRIMARY KEY(id),

CONSTRAINT fk_cidade_estado
    FOREIGN KEY (idEstado)
    REFERENCES estado (id)
);


CREATE TABLE cep (
	id INT NOT NULL AUTO_INCREMENT,
	CEP varchar(8) NOT NULL,
	PRIMARY KEY(id)
	);

CREATE TABLE endereco (
id INT NOT NULL AUTO_INCREMENT,
logradouro varchar(50),
bairro varchar(50),
numero INT NOT NULL,
idCep int NOT NULL,
PRIMARY KEY(id),

	CONSTRAINT fk_endereco_cep
    FOREIGN KEY (idCep)
    REFERENCES cep (id)
);

CREATE TABLE usuarios(
id INT NOT NULL AUTO_INCREMENT,
nome varchar(50) NOT NULL,
email varchar(50) NOT NULL,
senha varchar(32),
dataNascimento date NOT NULL,
cpf varchar(11) NOT NULL,
telefone varchar(20),
nivel int,
PRIMARY KEY(id)
);

CREATE TABLE user_has_endereco (
idEndereco INT NOT NULL,
idUsuario INT NOT NULL,

CONSTRAINT fk_user_endereco
    FOREIGN KEY (idEndereco)
    REFERENCES endereco (id),

    CONSTRAINT fk_user_usuario
    FOREIGN KEY (idUsuario)
    REFERENCES usuarios (id)
);

CREATE TABLE categorias(
id INT NOT NULL AUTO_INCREMENT,
descricao varchar(50) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE marca(
id INT NOT NULL AUTO_INCREMENT,
descricao varchar(50) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE produtos(
id INT NOT NULL AUTO_INCREMENT,
descricao varchar(50) NOT NULL,
estoqueMinimo int DEFAULT 5,
valorCompra double (4,2),
foto varchar(100),
destaque INT,
valorVenda double (4,2),
quantidade INT,
idMarca INT,
idCategoria INT,
PRIMARY KEY(id),

CONSTRAINT fk_produto_marca
    FOREIGN KEY (idMarca)
    REFERENCES marca (id),

CONSTRAINT fk_produto_categoria
    FOREIGN KEY (idCategoria)
    REFERENCES categorias (id)
);

CREATE TABLE formaPag(
	id int NOT NULL AUTO_INCREMENT,
	descricao varchar(50),
	PRIMARY KEY(id)
);

CREATE TABLE transportadora(
id INT NOT NULL AUTO_INCREMENT,
nome varchar(50),
cnpj varchar(15),
idEndereco int,
telefone varchar(20),
email varchar(50),
PRIMARY KEY(id),

CONSTRAINT fk_transportadora_endereco
    FOREIGN KEY (idEndereco)
    REFERENCES endereco (id)
);


CREATE TABLE pedido(
id INT NOT NULL AUTO_INCREMENT,
data date not null,
valorTotal double(4,2),
quantidadeVolumes int,
idPag int,
status varchar(50) DEFAULT "Aguardando Pagamento",
idTransportadora INT,
PRIMARY KEY(id),

CONSTRAINT fk_venda_formPag
    FOREIGN KEY (idPag)
    REFERENCES formaPag (id),

CONSTRAINT fk_pedido_transportadora
    FOREIGN KEY (idTransportadora)
    REFERENCES transportadora (id)

);

CREATE TABLE itemPedido(
idPedido INT,
descricao varchar(50),
valorUn double(4,2),
idProduto int,

CONSTRAINT fk_produto_itemPedido
    FOREIGN KEY (idProduto)
    REFERENCES produtos (id),

CONSTRAINT fk_pedido_itemPedido
    FOREIGN KEY (idPedido)
    REFERENCES pedido (id)

);

CREATE TABLE venda(
	id INT NOT NULL AUTO_INCREMENT,
	data date not null,
	idUsuario int,	
	idPedido INT,
	total double(9,2),
	PRIMARY KEY(id),

	CONSTRAINT fk_venda_usuario
    FOREIGN KEY (idUsuario)
    REFERENCES usuarios (id),

    CONSTRAINT fk_venda_pedido
    FOREIGN KEY (idPedido)
    REFERENCES pedido (id)
);


