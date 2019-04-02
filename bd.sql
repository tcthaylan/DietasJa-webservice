 /* 
 * Usuarios
 * Dietas
 * Refeicoes
 * Alimentos
 */
create database nome_projeto
default character set utf8
default collate utf8_general_ci;

create table usuarios(
	id int primary key auto_increment,
	nome varchar(100) not null,
	email varchar(100) unique not null,
	password varchar(32) not null,
	hash varchar(32) null,
	altura float(3, 2) not null,
	peso float(5, 2) not null
)default charset=utf8;

create table dietas(
	id int primary key auto_increment,
	id_usuario int not null,
)default charset=utf8;

create table refeicoes(
	id int primarykey auto_increment,
	id_dieta int not null,
	nome varchar(100) not null
)default charset=utf8;

/*Valor nutricional por grama*/
create table alimentos(
	id int primary key auto_increment,
	nome varchar(100) not null,
	calorias float(5, 2) not null,
	proteinas float(5, 2) not null,
	gorduras_totais float(5, 2) not null,
	gorduras_saturadas float(5, 2) not null,
	fibra_alimentar float(5, 2) not null,
	sodio float(5, 2) not null
)default charset=utf8;

create table refeicoes_alimentos(
	id_refeicao int not null,
	id_alimento int not null,
	qtd_gramas float(5, 2) not null
)default charset=utf8;