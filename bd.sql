create database banco;
	use database banco;

	create table barbeiro(
			id int primary kay auto_increment,
			nome_salao varchar(50),
			email varchar (80),
			nome_barbeiro varchar(60),
			cnpj varchar(20),
			senha varbinary(20)
		);