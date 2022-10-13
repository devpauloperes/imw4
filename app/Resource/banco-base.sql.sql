
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


DROP TABLE IF EXISTS Clerigo;
CREATE TABLE IF NOT EXISTS Clerigo (
  id int(11) NOT NULL AUTO_INCREMENT,
  
  tipoClerigoId int not null, -- PASTOR, REVERENDO, MISSIONARIA
  dataConsagracao datetime,
  dataOrdenacao datetime, -- somente para ministros
  nome varchar(255) not null,
  dataNascimento datetime not null,
  email varchar(200),
  nacionalidade varchar(100),
  escolaridadeId int,
  sexo varchar(1),
  foto varchar(255),
  racaId int,
  isPne int,

  estadoCivil varchar(1),
  nomeConjuge varchar(255),
  conjugeCPF varchar(11),
  conjugeRg varchar(50), 
  conjugeRgDataEmissao datetime,
  conjugeRegimeBens varchar(50), 
  
  nomePai varchar(255),
  nomeMae varchar(255),

  cpf varchar(11),
  rg varchar(30),
  dataEmissaoRg datetime,
  ctps varchar(50),
  dataEmissaoCtps datetime,
  pis varchar(50),
  tituloEleitoral varchar(50),
  tituloEleitoralZona varchar(20),
  tituloEleitoralSecao varchar(20),


  cep varchar(20),
  endereco varchar(255),
  numero varchar(20),
  complemento varchar(255),
  bairro varchar(255),
  cidade varchar(255),
  estado varchar(2),
  pais varchar(30),
  telefone varchar(20),
  celular varchar(20),
  isFilhos boolean,

  isAtivo boolean NOT NULL,
  dataInativo datetime,

  arquivoCtps varchar(255),
  arquivoPis varchar(255),
  arquivoRg varchar(255),
  arquivoCpf varchar(255),
  arquivoTituloEleitor varchar(255),
  arquivoCertidaoNascimentoCasamento varchar(255),
  arquivoComprovanteResidencia varchar(255),
  arquivoExtratoPrevidenciario varchar(255),

  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
) ENGINE=InnoDB;

-- Filhos

CREATE TABLE IF NOT EXISTS Filho (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) not null,
  dataNascimento datetime not null,
  cpf varchar(11),

  arquivoCertidaoNascimento varchar(255),
  arquivoRg varchar(255),
  arquivoCpf varchar(255),
  arquivoTituloEleitor varchar(255),
  arquivoCarteiraVacina varchar(255),
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
);

-- LIDERES REGIONAIS


CREATE TABLE IF NOT EXISTS FuncaoEclesiastica (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS TipoClerigo (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) not null,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS Comissao (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) not null,
  dataInicio datetime not null,
  dataFim datetime,
  descricao text,
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS Concilio (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(200) not null,
  numero varchar(20),
  dataInicio datetime not null,
  dataFim datetime not null,
  descricao text, 
  
  created_at datetime NOT NULL,
  created_by int NOT NULL,
  updated_at datetime,
  updated_by int,
  deleted_at datetime,

  PRIMARY KEY (id)
);

