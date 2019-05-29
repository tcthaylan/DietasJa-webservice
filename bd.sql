 /* 
 total alimento: todas as informações.
    - Quantidade X informações

 total refeição: kcal, carbo, proteina, gordura.
    - Alimento + alimento
	
 total dieta: kcal, carbo, proteina, gordura.
    - Refeição + refeição

 ===========================
 Sistema calcula imc
 Sistema calcula qtd calorias necessárias
 Usuario cria dieta
 Usuário cria refeições
 Usuário insere alimentos na refeição

 Refeição
	- call total
	- carb total
	- Proteinas total
	- lista de alimentos com quantidade gramas?
 * Usuarios
 * Dietas
 * Refeicoes
 * Alimentos
 */
create database dietasja
default character set utf8
default collate utf8_general_ci;

use dietasja;

create table users(
	id int primary key auto_increment,
	id_fator_atividade int not null,
	name varchar(100) not null,
	email varchar(100) unique not null,
	avatar varchar(100) null,
	pass varchar(32) not null,
	height float(3, 2) not null,
	weight float(5, 2) not null,
	sexo varchar(45) not null,
	data_nascimento date not null,
	imc float(5, 2) not null,
	tmb float(5, 2) not null,
	desejo varchar(45) not null,
	meta_calorica varchar(45) not null
)default charset=utf8;

create table fatorAtividade(
	id int primary key auto_increment,
	name varchar(45) not null,
	calories float(5, 2) not null
)default charset=utf8;


create table meals(
	id int primary key auto_increment,
	id_user int not null,
	name varchar(100) not null,
	horario time not null,
	instrucoes text null
)default charset=utf8;

create table meals_has_foods(
	id_meal int not null,
	id_food int not null,
	quantidade float(5, 2) not null
)default charset=utf8;

create table foods(
	id int primary key auto_increment,
	nome varchar(100) not null,
	porcao_gramas float(5, 2) null,
	unidade varchar(45) not null,
	calorias float(5, 2) not null,
	carboidratos float(5, 2) null,
	proteinas float(5, 2) null,
	gorduras_totais float(5, 2) null,
	gorduras_saturadas float(5, 2) null,
	gorduras_trans float(5, 2) null,
	fibra_alimentar float(5, 2) null,
	sodio float(5, 2) null,
	verificado int default 0
)default charset=utf8;
