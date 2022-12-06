

CREATE TABLE IF NOT EXISTS concilio_informativos (
  id int(11) NOT NULL AUTO_INCREMENT,
  concilioId int not null,
  dataInforme datetime,
  nome varchar(100) not null,
  subtitulo varchar(255),
  texto text,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS concilio_pasta_relatorio (
  id int(11) NOT NULL AUTO_INCREMENT,
  concilioId int not null,
  nome varchar(100) not null,
  ordem int,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS concilio_relatorio (
  id int(11) NOT NULL AUTO_INCREMENT,
  pastaId int not null,
  nome varchar(100) not null,
  descricao text,
  arquivo varchar(200) not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS concilio_conciliares (
  id int(11) NOT NULL AUTO_INCREMENT,
  concilioId int not null,
  nome varchar(200) not null,
  cpf varchar(16),
  celular varchar(16),
  email varchar(200),
  cidade varchar(200),
  estado varchar(200),
  Distrito varchar(200), 
  Igreja varchar(200),
  senha varchar(40),
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS concilio_contador_click_relatorio (
  id int(11) NOT NULL AUTO_INCREMENT,
  concilioId int not null,
  relatorioId int not null,
  usuarioId int not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;