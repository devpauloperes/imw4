
--
-- Estrutura da tabela Usuario
--

DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario (
  id int(11) NOT NULL AUTO_INCREMENT,
  hash varchar(255),
  nome varchar(100) NOT NULL,
  cpf varchar(11) NOT NULL,
  email varchar(255),
  celular varchar(16),
  senha varchar(40),
  isAtivo int,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO `Usuario` (`id`, hash, `nome`, `cpf`, `email`, `celular`, `senha`, `isAtivo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES (NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Paulo Peres', '72300752204', 'devpauloperes@gmail.com', '92981864177', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '2022-05-04 10:23:42', '1', '2022-05-04 10:23:42', '1', NULL);



DROP TABLE IF EXISTS TipoInstituicao;
CREATE TABLE IF NOT EXISTS TipoInstituicao (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  cor varchar(7),
  sigla varchar(1) not null,
  hierarquia int NOT NULL,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS Usuario_Instituicao;
CREATE TABLE IF NOT EXISTS Usuario_Instituicao (
  id int(11) NOT NULL AUTO_INCREMENT,
  usuarioId int not null,
  instituicaoId int not null,
  perfilId int not null,
  isCadastraUsuario tinyint(1) not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;


DROP TABLE IF EXISTS Instituicao;
CREATE TABLE IF NOT EXISTS Instituicao (
  id int(11) NOT NULL AUTO_INCREMENT,
  
  nome varchar(100) NOT NULL,
  cnpj varchar(14),
  email varchar(255),
  dataAbertura datetime,
  dataFechamento datetime,

  tipoInstituicaoId int NOT NULL,
  instituicaoId int,    
    
  cep varchar(20),
  endereco varchar(255),
  numero varchar(20),
  complemento varchar(255),
  bairro varchar(255),
  cidade varchar(255),
  estado varchar(2),
  pais varchar(30),
  telefone varchar(20),
    
  pastorId int,
  tesoureiroId int,

  isAtivo boolean NOT NULL,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

