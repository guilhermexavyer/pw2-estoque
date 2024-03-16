create table categoria (
	id int primary key not null auto_increment,
    nome varchar(50) not null
);

create table produto (
	id int primary key not null auto_increment,
    nome varchar(50) not null,
    descricao varchar(100) not null,
    categoria varchar(100) not null,
    preco float not null,
    
    categoria_id int,
    foreign key (categoria_id) references categoria(id)
);

create table estoque (
	id int primary key not null auto_increment,
    produto varchar(50) not null,
    quantidade int not null,
    
    produto_id int,
    foreign key (produto_id) references produto(id)
);

create table usuario (
    id int primary key not null auto_increment,
	login varchar(50) not null,
    nome varchar(50) not null,
    senha varchar(100) not null
);

select * from usuario;