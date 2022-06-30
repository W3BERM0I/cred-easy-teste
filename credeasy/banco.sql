create table cliente (
	id bigint not null auto_increment,
	cpf varchar(14) not null,
	nome varchar(255) not null,
	telefone int not null,
	endereco varchar(255) not null,
	profissao varchar(255) not null,
	renda decimal(10,2) not null,
	email varchar(255) not null,
	senha varchar(2048) default '' not null,
	tipo_usuario varchar(255) default 'CLIENTE' not null,
	primary key(id),
	unique(cpf)
);

create table emprestimo (
	id bigint not null auto_increment,
	data_solicitacao date not null,
	taxa_juros decimal(10,2) default 0 not null,
	valor decimal(10,2) not null,
	valor_pago decimal(10,2),
	data_quitacao date,
	status varchar(255) default 'SOLICITADO',
	cliente_id bigint not null,
	primary key(id),
	constraint emprestimo_cliente foreign key (cliente_id) references cliente(id)
);

create table parcela (
	id bigint not null auto_increment,
	numero int not null,
	valor decimal(10,2) not null,
	data_vencimento date not null,
	multa decimal(10,2),
	valor_pago decimal(10,2),
	status varchar(255) default 'ABERTA' not null,
	emprestimo_id bigint not null,
	primary key(id),
	constraint parcela_emprestimo foreign key (emprestimo_id) references emprestimo(id),
	unique (numero, emprestimo_id)
);

drop table emprestimo;