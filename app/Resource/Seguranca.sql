CREATE TABLE SegurancaUsuario (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `isAtivo` boolean not NULL,
  tipo varchar(1) not null, #C:Clérigo,M:Membro
  isRoot boolean,
  isTrocarSenha boolean,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `SegurancaUsuario` (`id`, `nome`, `cpf`, `email`, `senha`, `isAtivo`, `tipo`, `isRoot`, `isTrocarSenha`, `isExcluido`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) VALUES (NULL, 'Paulo', '72300752204', 'paulo@inovarnaweb.com.br', '$2y$10$YztZkcMN44ovP03876pZIegOEMxrGGs8URfpbDmKvBfAb0IOZA48C', '1', 'C', '1', '0', '0', '-1', '2019-10-10 00:00:00', '-1', '2019-10-10 00:00:00');
INSERT INTO `SegurancaUsuario` (`id`, `nome`, `cpf`, `email`, `senha`, `isAtivo`, `tipo`, `isRoot`, `isTrocarSenha`, `isExcluido`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) VALUES (NULL, 'Sebastiao Calegari Filho', '89714911672', 'sebastiaocalegari@gmail.com', '$2y$10$RAtxPEzrmhJVTIAPoESAKeFc7ZXGKKylzttOc8rj6SPU6M3BDwdAW', '1', 'C', '1', '0', '0', '-1', '2019-10-10 00:00:00', '-1', '2019-10-10 00:00:00');


CREATE TABLE SegurancaPerfil (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


#data de expiracao do perfil
CREATE TABLE SegurancaUsuario_Instituicao (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  segurancaUsuarioId int not null,
  instituicaoId int not null,
  segurancaPerfilId int not null,
  isCadastraUsuario boolean,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE SegurancaController
(
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
  `acao` varchar(50) NOT NULL,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE SegurancaPerfil_Controller (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  segurancaPerfilId int not null,
  segurancaControllerId int not null,

  isExcluido boolean not null,


  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegurancaMenu` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segMenuId` int,
  `nome` varchar(50) NOT NULL,
  `ordem` int not null,
  `icone` varchar(50) NOT NULL,
  `tipo` varchar(1) NOT NULL, #interno, externo
  `url` varchar(255) NOT NULL,
  `target` varchar(10) NOT NULL,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegurancaAuditoria` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segurancaUsuarioId` int,
  `dataAcao` datetime,
  `tabela` varchar(100),
  `objetoAnterior` json,
  `objetoNovo` json,

  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegurancaAcao` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  segurancaUsuarioId int not null,
  tipo varchar(1) not null, #E:Entrada,S:Saída,T:Troca de Senha,N:Solicitou nova senha
  ip varchar(50) not null,
  dataAcao datetime not null,
  dispositivo varchar(50),
  navegador varchar(50),

  
  isExcluido boolean not null,
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Instituição",
1,
"business",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);


INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Configurações",
1,
"settings_applications",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);



INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Clérigo",
1,
"assignment_ind",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);


INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Secretaria",
1,
"face",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);


INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Tesouraria",
1,
"monetization_on",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);


INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Relatórios",
1,
"insert_drive_file",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);


INSERT INTO `SegurancaMenu`
(
`segurancaMenuId`,
`nome`,
`ordem`,
`icone`,
`tipo`,
`url`,
`target`,
`isExcluido`,
`criadoPor`,
`criadoEm`,
`alteradoPor`,
`alteradoEm`)
VALUES
(
null,
"Segurança",
1,
"security",
"I",
"#",
"_self",
0,
-1,
now(),
-1,
now()
);



INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Escolaridade','listar',0,-1,now(),-1,now()),
('Escolaridade','create',0,-1,now(),-1,now()),
('Escolaridade','insert',0,-1,now(),-1,now()),
('Escolaridade','load',0,-1,now(),-1,now()),
('Escolaridade','update',0,-1,now(),-1,now()),
('Escolaridade','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Usuario','listar',0,-1,now(),-1,now()),
('Usuario','create',0,-1,now(),-1,now()),
('Usuario','insert',0,-1,now(),-1,now()),
('Usuario','load',0,-1,now(),-1,now()),
('Usuario','update',0,-1,now(),-1,now()),
('Usuario','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Curso','listar',0,-1,now(),-1,now()),
('Curso','create',0,-1,now(),-1,now()),
('Curso','insert',0,-1,now(),-1,now()),
('Curso','load',0,-1,now(),-1,now()),
('Curso','update',0,-1,now(),-1,now()),
('Curso','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FuncaoIgrejaLocal','listar',0,-1,now(),-1,now()),
('FuncaoIgrejaLocal','create',0,-1,now(),-1,now()),
('FuncaoIgrejaLocal','insert',0,-1,now(),-1,now()),
('FuncaoIgrejaLocal','load',0,-1,now(),-1,now()),
('FuncaoIgrejaLocal','update',0,-1,now(),-1,now()),
('FuncaoIgrejaLocal','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('IgrejaSetor','listar',0,-1,now(),-1,now()),
('IgrejaSetor','create',0,-1,now(),-1,now()),
('IgrejaSetor','insert',0,-1,now(),-1,now()),
('IgrejaSetor','load',0,-1,now(),-1,now()),
('IgrejaSetor','update',0,-1,now(),-1,now()),
('IgrejaSetor','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SituacaoMembro','listar',0,-1,now(),-1,now()),
('SituacaoMembro','create',0,-1,now(),-1,now()),
('SituacaoMembro','insert',0,-1,now(),-1,now()),
('SituacaoMembro','load',0,-1,now(),-1,now()),
('SituacaoMembro','update',0,-1,now(),-1,now()),
('SituacaoMembro','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('TipoAtuacaoMembro','listar',0,-1,now(),-1,now()),
('TipoAtuacaoMembro','create',0,-1,now(),-1,now()),
('TipoAtuacaoMembro','insert',0,-1,now(),-1,now()),
('TipoAtuacaoMembro','load',0,-1,now(),-1,now()),
('TipoAtuacaoMembro','update',0,-1,now(),-1,now()),
('TipoAtuacaoMembro','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('TipoInstituicao','listar',0,-1,now(),-1,now()),
('TipoInstituicao','create',0,-1,now(),-1,now()),
('TipoInstituicao','insert',0,-1,now(),-1,now()),
('TipoInstituicao','load',0,-1,now(),-1,now()),
('TipoInstituicao','update',0,-1,now(),-1,now()),
('TipoInstituicao','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('TipoPrebenda','listar',0,-1,now(),-1,now()),
('TipoPrebenda','create',0,-1,now(),-1,now()),
('TipoPrebenda','insert',0,-1,now(),-1,now()),
('TipoPrebenda','load',0,-1,now(),-1,now()),
('TipoPrebenda','update',0,-1,now(),-1,now()),
('TipoPrebenda','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ValorPrebenda','listar',0,-1,now(),-1,now()),
('ValorPrebenda','create',0,-1,now(),-1,now()),
('ValorPrebenda','insert',0,-1,now(),-1,now()),
('ValorPrebenda','load',0,-1,now(),-1,now()),
('ValorPrebenda','update',0,-1,now(),-1,now()),
('ValorPrebenda','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Instituicao','listar',0,-1,now(),-1,now()),
('Instituicao','create',0,-1,now(),-1,now()),
('Instituicao','insert',0,-1,now(),-1,now()),
('Instituicao','load',0,-1,now(),-1,now()),
('Instituicao','update',0,-1,now(),-1,now()),
('Instituicao','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Clerigo','listar',0,-1,now(),-1,now()),
('Clerigo','create',0,-1,now(),-1,now()),
('Clerigo','insert',0,-1,now(),-1,now()),
('Clerigo','load',0,-1,now(),-1,now()),
('Clerigo','update',0,-1,now(),-1,now()),
('Clerigo','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoCargo','listar',0,-1,now(),-1,now()),
('ClerigoCargo','create',0,-1,now(),-1,now()),
('ClerigoCargo','insert',0,-1,now(),-1,now()),
('ClerigoCargo','load',0,-1,now(),-1,now()),
('ClerigoCargo','update',0,-1,now(),-1,now()),
('ClerigoCargo','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoDependente','listar',0,-1,now(),-1,now()),
('ClerigoDependente','create',0,-1,now(),-1,now()),
('ClerigoDependente','insert',0,-1,now(),-1,now()),
('ClerigoDependente','load',0,-1,now(),-1,now()),
('ClerigoDependente','update',0,-1,now(),-1,now()),
('ClerigoDependente','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoFuncaoMinisterial','listar',0,-1,now(),-1,now()),
('ClerigoFuncaoMinisterial','create',0,-1,now(),-1,now()),
('ClerigoFuncaoMinisterial','insert',0,-1,now(),-1,now()),
('ClerigoFuncaoMinisterial','load',0,-1,now(),-1,now()),
('ClerigoFuncaoMinisterial','update',0,-1,now(),-1,now()),
('ClerigoFuncaoMinisterial','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoNomeacao','listar',0,-1,now(),-1,now()),
('ClerigoNomeacao','create',0,-1,now(),-1,now()),
('ClerigoNomeacao','insert',0,-1,now(),-1,now()),
('ClerigoNomeacao','load',0,-1,now(),-1,now()),
('ClerigoNomeacao','update',0,-1,now(),-1,now()),
('ClerigoNomeacao','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoPrebenda','listar',0,-1,now(),-1,now()),
('ClerigoPrebenda','create',0,-1,now(),-1,now()),
('ClerigoPrebenda','insert',0,-1,now(),-1,now()),
('ClerigoPrebenda','load',0,-1,now(),-1,now()),
('ClerigoPrebenda','update',0,-1,now(),-1,now()),
('ClerigoPrebenda','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoRendaEclesiastica','listar',0,-1,now(),-1,now()),
('ClerigoRendaEclesiastica','create',0,-1,now(),-1,now()),
('ClerigoRendaEclesiastica','insert',0,-1,now(),-1,now()),
('ClerigoRendaEclesiastica','load',0,-1,now(),-1,now()),
('ClerigoRendaEclesiastica','update',0,-1,now(),-1,now()),
('ClerigoRendaEclesiastica','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoRendaEclesiasticaPlanoConta','listar',0,-1,now(),-1,now()),
('ClerigoRendaEclesiasticaPlanoConta','create',0,-1,now(),-1,now()),
('ClerigoRendaEclesiasticaPlanoConta','insert',0,-1,now(),-1,now()),
('ClerigoRendaEclesiasticaPlanoConta','load',0,-1,now(),-1,now()),
('ClerigoRendaEclesiasticaPlanoConta','update',0,-1,now(),-1,now()),
('ClerigoRendaEclesiasticaPlanoConta','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoStatus','listar',0,-1,now(),-1,now()),
('ClerigoStatus','create',0,-1,now(),-1,now()),
('ClerigoStatus','insert',0,-1,now(),-1,now()),
('ClerigoStatus','load',0,-1,now(),-1,now()),
('ClerigoStatus','update',0,-1,now(),-1,now()),
('ClerigoStatus','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('ClerigoTransferencia','listar',0,-1,now(),-1,now()),
('ClerigoTransferencia','create',0,-1,now(),-1,now()),
('ClerigoTransferencia','insert',0,-1,now(),-1,now()),
('ClerigoTransferencia','load',0,-1,now(),-1,now()),
('ClerigoTransferencia','update',0,-1,now(),-1,now()),
('ClerigoTransferencia','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('Membro','listar',0,-1,now(),-1,now()),
('Membro','create',0,-1,now(),-1,now()),
('Membro','insert',0,-1,now(),-1,now()),
('Membro','load',0,-1,now(),-1,now()),
('Membro','update',0,-1,now(),-1,now()),
('Membro','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaAcao','listar',0,-1,now(),-1,now()),
('SegurancaAcao','create',0,-1,now(),-1,now()),
('SegurancaAcao','insert',0,-1,now(),-1,now()),
('SegurancaAcao','load',0,-1,now(),-1,now()),
('SegurancaAcao','update',0,-1,now(),-1,now()),
('SegurancaAcao','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('MembroFormacaoEclesiastica','listar',0,-1,now(),-1,now()),
('MembroFormacaoEclesiastica','create',0,-1,now(),-1,now()),
('MembroFormacaoEclesiastica','insert',0,-1,now(),-1,now()),
('MembroFormacaoEclesiastica','load',0,-1,now(),-1,now()),
('MembroFormacaoEclesiastica','update',0,-1,now(),-1,now()),
('MembroFormacaoEclesiastica','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('MembroMinisterial','listar',0,-1,now(),-1,now()),
('MembroMinisterial','create',0,-1,now(),-1,now()),
('MembroMinisterial','insert',0,-1,now(),-1,now()),
('MembroMinisterial','load',0,-1,now(),-1,now()),
('MembroMinisterial','update',0,-1,now(),-1,now()),
('MembroMinisterial','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('MembroRolPermanente','listar',0,-1,now(),-1,now()),
('MembroRolPermanente','create',0,-1,now(),-1,now()),
('MembroRolPermanente','insert',0,-1,now(),-1,now()),
('MembroRolPermanente','load',0,-1,now(),-1,now()),
('MembroRolPermanente','update',0,-1,now(),-1,now()),
('MembroRolPermanente','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroPlanoConta','listar',0,-1,now(),-1,now()),
('FinanceiroPlanoConta','create',0,-1,now(),-1,now()),
('FinanceiroPlanoConta','insert',0,-1,now(),-1,now()),
('FinanceiroPlanoConta','load',0,-1,now(),-1,now()),
('FinanceiroPlanoConta','update',0,-1,now(),-1,now()),
('FinanceiroPlanoConta','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroBanco','listar',0,-1,now(),-1,now()),
('FinanceiroBanco','create',0,-1,now(),-1,now()),
('FinanceiroBanco','insert',0,-1,now(),-1,now()),
('FinanceiroBanco','load',0,-1,now(),-1,now()),
('FinanceiroBanco','update',0,-1,now(),-1,now()),
('FinanceiroBanco','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroCaixa','listar',0,-1,now(),-1,now()),
('FinanceiroCaixa','create',0,-1,now(),-1,now()),
('FinanceiroCaixa','insert',0,-1,now(),-1,now()),
('FinanceiroCaixa','load',0,-1,now(),-1,now()),
('FinanceiroCaixa','update',0,-1,now(),-1,now()),
('FinanceiroCaixa','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroCotaConsolidadaMensal','listar',0,-1,now(),-1,now()),
('FinanceiroCotaConsolidadaMensal','create',0,-1,now(),-1,now()),
('FinanceiroCotaConsolidadaMensal','insert',0,-1,now(),-1,now()),
('FinanceiroCotaConsolidadaMensal','load',0,-1,now(),-1,now()),
('FinanceiroCotaConsolidadaMensal','update',0,-1,now(),-1,now()),
('FinanceiroCotaConsolidadaMensal','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroCotaOrcamentaria','listar',0,-1,now(),-1,now()),
('FinanceiroCotaOrcamentaria','create',0,-1,now(),-1,now()),
('FinanceiroCotaOrcamentaria','insert',0,-1,now(),-1,now()),
('FinanceiroCotaOrcamentaria','load',0,-1,now(),-1,now()),
('FinanceiroCotaOrcamentaria','update',0,-1,now(),-1,now()),
('FinanceiroCotaOrcamentaria','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroLancamento','listar',0,-1,now(),-1,now()),
('FinanceiroLancamento','create',0,-1,now(),-1,now()),
('FinanceiroLancamento','insert',0,-1,now(),-1,now()),
('FinanceiroLancamento','load',0,-1,now(),-1,now()),
('FinanceiroLancamento','update',0,-1,now(),-1,now()),
('FinanceiroLancamento','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('FinanceiroPlanoContabil','listar',0,-1,now(),-1,now()),
('FinanceiroPlanoContabil','create',0,-1,now(),-1,now()),
('FinanceiroPlanoContabil','insert',0,-1,now(),-1,now()),
('FinanceiroPlanoContabil','load',0,-1,now(),-1,now()),
('FinanceiroPlanoContabil','update',0,-1,now(),-1,now()),
('FinanceiroPlanoContabil','delete',0,-1,now(),-1,now());


INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaAuditoria','listar',0,-1,now(),-1,now()),
('SegurancaAuditoria','create',0,-1,now(),-1,now()),
('SegurancaAuditoria','insert',0,-1,now(),-1,now()),
('SegurancaAuditoria','load',0,-1,now(),-1,now()),
('SegurancaAuditoria','update',0,-1,now(),-1,now()),
('SegurancaAuditoria','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaController','listar',0,-1,now(),-1,now()),
('SegurancaController','create',0,-1,now(),-1,now()),
('SegurancaController','insert',0,-1,now(),-1,now()),
('SegurancaController','load',0,-1,now(),-1,now()),
('SegurancaController','update',0,-1,now(),-1,now()),
('SegurancaController','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaMenu','listar',0,-1,now(),-1,now()),
('SegurancaMenu','create',0,-1,now(),-1,now()),
('SegurancaMenu','insert',0,-1,now(),-1,now()),
('SegurancaMenu','load',0,-1,now(),-1,now()),
('SegurancaMenu','update',0,-1,now(),-1,now()),
('SegurancaMenu','delete',0,-1,now(),-1,now());
INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaPerfil','listar',0,-1,now(),-1,now()),
('SegurancaPerfil','create',0,-1,now(),-1,now()),
('SegurancaPerfil','insert',0,-1,now(),-1,now()),
('SegurancaPerfil','load',0,-1,now(),-1,now()),
('SegurancaPerfil','update',0,-1,now(),-1,now()),
('SegurancaPerfil','delete',0,-1,now(),-1,now());

INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaUsuario','listar',0,-1,now(),-1,now()),
('SegurancaUsuario','create',0,-1,now(),-1,now()),
('SegurancaUsuario','insert',0,-1,now(),-1,now()),
('SegurancaUsuario','load',0,-1,now(),-1,now()),
('SegurancaUsuario','update',0,-1,now(),-1,now()),
('SegurancaUsuario','delete',0,-1,now(),-1,now()),
('SegurancaUsuario','trocarsenha',0,-1,now(),-1,now()),
('SegurancaUsuario','formTrocarSenha',0,-1,now(),-1,now());


INSERT INTO `SegurancaController`
(`nome`,`acao`,`isExcluido`,`criadoPor`,`criadoEm`,`alteradoPor`,`alteradoEm`)
VALUES
('SegurancaUsuario_Instituicao','create',0,-1,now(),-1,now()),
('SegurancaUsuario_Instituicao','insert',0,-1,now(),-1,now()),
('SegurancaUsuario_Instituicao','load',0,-1,now(),-1,now()),
('SegurancaUsuario_Instituicao','update',0,-1,now(),-1,now()),
('SegurancaUsuario_Instituicao','delete',0,-1,now(),-1,now());