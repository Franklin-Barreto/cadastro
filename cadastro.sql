create table paciente (
   id integer not null AUTO_INCREMENT,
	data datetime DEFAULT CURRENT_TIMESTAMP,
	email varchar(255),
	nome varchar(255),
	nome_mae varchar(255),
	nome_pai varchar(255),
	status boolean not null,
	primary key (id)
) engine=InnoDB;

create table endereco (
   id integer not null AUTO_INCREMENT,
	data datetime DEFAULT CURRENT_TIMESTAMP,
	nome_bairro varchar(255),
	rua varchar(255),
	status boolean not null,
	paciente_id integer not null,
	primary key (id),
	 INDEX par_ind (paciente_id),
    FOREIGN KEY (paciente_id)
        REFERENCES paciente(id)
        ON DELETE CASCADE
) engine=InnoDB;
