alter table Instituicao add qtd_capacidade_lotacao int;
alter table Instituicao add qtd_membros int;
alter table Instituicao add qtd_congregados int;
alter table Instituicao add qtd_lideranca int;
alter table Instituicao add qtd_gceu int;

#sistema de votacao


CREATE TABLE IF NOT EXISTS concilio_votacao (
  id int(11) NOT NULL AUTO_INCREMENT,
  concilioId int not null,
  nome varchar(200) not null,
  corun int,
  isVotacaoAberta int not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS concilio_votacao_opcao (
  id int(11) NOT NULL AUTO_INCREMENT,
  votacaoId int not null,
  nome varchar(100) not null,
  descricao text,
  foto varchar(200),

  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

#nomeações do concilio 

create table if not exists concilio_nomeacoes(

    id int AUTO_INCREMENT,
    concilioId int not null,
    funcao_eclesiasticaId int not null,
    instituicaoId int not null, #secretaria, igreja, etc...
    clerigoId int not null,
    #duvida: como controlar o bienio da nomeacao
    PRIMARY KEY (id)
) ENGINE=InnoDB;

create table if not exists concilio_relatorios(

    id int AUTO_INCREMENT,
    concilioId int not null,
    funcao_eclesiasticaId int not null,
    instituicaoId int not null, #secretaria, igreja, etc...
    clerigoId int not null,
    documento varchar(200) not null,
    PRIMARY KEY (id)
) ENGINE=InnoDB;


create table if not exists clerigo_curriculo_tipo_capacitacao(
    id int AUTO_INCREMENT,
    nome varchar(100) not null,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

create table if not exists clerigo_curriculo_area_capacitacao(
    id int AUTO_INCREMENT,
    nome varchar(100) not null,
    PRIMARY KEY (id)
) ENGINE=InnoDB;


create table if not exists clerigo_curriculo(
    id int AUTO_INCREMENT,
    clerigoId int not null,
    tipoCapacitacaoId int, 
    areaCapacitacaoId int, #ministerial ou profissional 
    nome varchar(200) not null,
    cargaHoraria int not null,
    
    certificado varchar(200),
    PRIMARY KEY (id)
) ENGINE=InnoDB;

#duvida: a carteria pastoral deverá ser emitida apenas a pastores nomeados ou a qualquer pastor?
