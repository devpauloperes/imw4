
#
# Seg - Sistema de Segurança
# 
#
CREATE TABLE `SegMetodo` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegControle` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegPerfil` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL, 
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegNivel` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cor` varchar(10) NOT NULL,
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegPerfilControleMetodo` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segPerfilId` int,
  `segControleId` int,
  `segMetodoId` int,
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `SegUsuarioPerfil` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segUsuarioId` int,
  `SegPerfilId` int, 
 
  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegMenu` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segMenuId` int,
  `segNivelId` int,
  `nome` varchar(50) NOT NULL,
  `ordem` int not null,
  `icone` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(10) NOT NULL,

  `criadoPor` int(11) NOT NULL,
  `criadoEm` datetime NOT NULL,
  `alteradoPor` int(11) NOT NULL,
  `alteradoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `SegAuditoria` (
  `id` int(11) primary key AUTO_INCREMENT NOT NULL,
  `segUsuarioId` int,
  `dataAcao` datetime,
  `tabela` varchar(100),
  `objetoAnterior` text,
  `objetoNovo` text

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


#popular tabelas
INSERT INTO `SegMetodo` (`id`, `nome`, `url`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, 'Formulário de Inserção', 'create', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00');

INSERT INTO `SegMetodo` (`id`, `nome`, `url`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, 'Inserir Dados', 'insert', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    VALUES (NULL, 'Alterar Dados', 'update', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    VALUES (NULL, 'Visualizar Dados', 'load', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    VALUES (NULL, 'Remover Dados', 'delete', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00');

INSERT INTO `SegControle` (`id`, `nome`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, 'Usuario', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00');


INSERT INTO `SegNivel` (`id`, `nome`, `cor`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, 'Geral', '#cccccc',  '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    (NULL, 'Regional', '#cccccc','1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    (NULL, 'Distrital', '#cccccc','1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    (NULL, 'Igreja', '#cccccc', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00'),
    (NULL, 'Congregação', '#cccccc', '1', '2019-08-21 00:00:00', '1', '2019-08-21 00:00:00');

INSERT INTO `SegPerfil` (`id`, `nome`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, 'Administrador', '1', '2019-08-22 00:00:00', '1', '2019-08-22 00:00:00');

INSERT INTO `SegPerfilControleMetodo` (`id`, `segPerfilId`, `segControleId`, `segMetodoId`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, '1', '1', '1', '1', '2019-08-10 16:45:51', '1', '2019-08-22 00:00:00');

INSERT INTO `SegUsuarioPerfil` (`id`, `segUsuarioId`, `SegPerfilId`, `criadoPor`, `criadoEm`, `alteradoPor`, `alteradoEm`) 
    VALUES (NULL, '1', '1', '1', '2019-08-10 16:45:51', '1', '2019-08-22 00:00:00');