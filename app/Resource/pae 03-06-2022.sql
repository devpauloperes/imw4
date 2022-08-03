-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Jun-2022 às 05:58
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Instituicao`
--

DROP TABLE IF EXISTS `Instituicao`;
CREATE TABLE IF NOT EXISTS `Instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dataAbertura` datetime DEFAULT NULL,
  `dataFechamento` date DEFAULT NULL,
  `tipoInstituicaoId` int(11) NOT NULL,
  `instituicaoId` int(11) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `pastorId` int(11) DEFAULT NULL,
  `tesoureiroId` int(11) DEFAULT NULL,
  `isAtivo` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Instituicao`
--

INSERT INTO `Instituicao` (`id`, `nome`, `cnpj`, `email`, `dataAbertura`, `dataFechamento`, `tipoInstituicaoId`, `instituicaoId`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `telefone`, `pastorId`, `tesoureiroId`, `isAtivo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'IMW Central de Manaus', '11111111111111', NULL, '2000-10-10 00:00:00', NULL, 8, NULL, '69077-747', 'Rua Professor Lázaro Gonçalves ', '164', '', 'Japiim', 'Manaus', 'AM', 'Brasil', '(55) 9 2981-8641', NULL, NULL, 1, '2022-05-20 10:03:29', 1, '2022-05-20 10:03:29', NULL, NULL),
(2, 'IMW Cidade Nova', '22222222222222', NULL, '2008-05-10 00:00:00', NULL, 8, NULL, '69077-747', 'Rua Professor Lázaro Gonçalves ', '1648', '', 'Japiim', 'Manaus', 'AM', 'Brasil', '', NULL, NULL, 1, '2022-05-20 10:04:29', 1, '2022-05-20 10:04:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Membro`
--

DROP TABLE IF EXISTS `Membro`;
CREATE TABLE IF NOT EXISTS `Membro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoaId` int(11) DEFAULT NULL,
  `numeroRolPermanente` int(11) NOT NULL,
  `anoConversao` int(11) NOT NULL,
  `dataBatismo` datetime NOT NULL,
  `profissao` varchar(200) DEFAULT NULL,
  `situacao` int(11) DEFAULT NULL,
  `instituicaoId` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Membro`
--

INSERT INTO `Membro` (`id`, `pessoaId`, `numeroRolPermanente`, `anoConversao`, `dataBatismo`, `profissao`, `situacao`, `instituicaoId`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, 1, 1998, '1220-09-01 00:00:00', '', 1, 1, '2022-05-20 13:47:45', 1, '2022-06-03 00:44:57', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `MembroCapacitacao`
--

DROP TABLE IF EXISTS `MembroCapacitacao`;
CREATE TABLE IF NOT EXISTS `MembroCapacitacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membroId` int(11) NOT NULL,
  `dataCapacitacao` datetime NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cargaHoraria` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `MembroCapacitacao`
--

INSERT INTO `MembroCapacitacao` (`id`, `membroId`, `dataCapacitacao`, `nome`, `cargaHoraria`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, '2021-12-10 00:00:00', 'Php avançado 2', 120, '2022-06-02 23:27:58', 1, '2022-06-02 23:30:08', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `MembroHistorico`
--

DROP TABLE IF EXISTS `MembroHistorico`;
CREATE TABLE IF NOT EXISTS `MembroHistorico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membroId` int(11) NOT NULL,
  `tipoHistorico` int(11) NOT NULL,
  `dataMovimentacao` datetime DEFAULT NULL,
  `instituicaoOrigemId` int(11) DEFAULT NULL,
  `instituicaoDestinoId` int(11) DEFAULT NULL,
  `descricao` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `MembroHistorico`
--

INSERT INTO `MembroHistorico` (`id`, `membroId`, `tipoHistorico`, `dataMovimentacao`, `instituicaoOrigemId`, `instituicaoDestinoId`, `descricao`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(2, 1, 0, '2021-11-01 00:00:00', 1, 2, 'Transferência a trabalho 2', '2022-05-20 14:17:39', 1, '2022-06-02 23:45:49', 1, NULL),
(3, 1, 0, '2022-05-23 00:00:00', NULL, 2, 'Teste de cadastro', '2022-05-23 14:31:18', 1, '2022-05-23 14:31:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pessoa`
--

DROP TABLE IF EXISTS `Pessoa`;
CREATE TABLE IF NOT EXISTS `Pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoPessoa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `estadoCivil` varchar(1) DEFAULT NULL,
  `nomeConjuge` varchar(255) DEFAULT NULL,
  `nomePai` varchar(255) DEFAULT NULL,
  `nomeMae` varchar(255) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `filhos` text,
  `isAtivo` tinyint(1) NOT NULL,
  `dataInativo` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Pessoa`
--

INSERT INTO `Pessoa` (`id`, `tipoPessoa`, `nome`, `dataNascimento`, `email`, `cpf`, `foto`, `estadoCivil`, `nomeConjuge`, `nomePai`, `nomeMae`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `telefone`, `celular`, `filhos`, `isAtivo`, `dataInativo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, 'Paulo Junior de Jesus Peres', '1121-10-08 00:00:00', 'paulojunior.com@gmail.com', '72300752204', '1654235097_ab0c093271f2ddd38872.png', '2', 'Carolina Maia da Silva Peres', 'Paulo Sergio Peres', 'Maria Jose da Silva', '69077-747', 'Rua Professor Lázaro Gonçalves ', '143', '', 'Japiim', 'Manaus', 'AM', 'Brasil', '(92) 9818-6417', '', 'Catarina Maia da Silva Peres', 0, NULL, '2022-05-20 13:47:45', 1, '2022-06-03 00:44:57', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `TipoInstituicao`
--

DROP TABLE IF EXISTS `TipoInstituicao`;
CREATE TABLE IF NOT EXISTS `TipoInstituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `sigla` varchar(1) NOT NULL,
  `hierarquia` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `TipoInstituicao`
--

INSERT INTO `TipoInstituicao` (`id`, `nome`, `cor`, `sigla`, `hierarquia`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'IGREJA GERAL', '.bg-light', 'G', 1, '2022-05-04 10:36:16', 1, '2022-05-04 10:36:16', NULL, NULL),
(2, 'REGIÃO', '.bg-info', 'R', 2, '2022-05-04 10:43:28', 1, '2022-05-04 10:43:28', NULL, NULL),
(3, 'ESTATISTICA', '.bg-light', 'E', 2, '2022-05-04 10:43:51', 1, '2022-05-04 10:45:06', 1, NULL),
(4, 'CONTABILIDADE', '.bg-warning', 'C', 2, '2022-05-04 10:45:39', 1, '2022-05-04 10:45:39', NULL, NULL),
(5, 'ÓRGÃO GERAL', '.bg-success', 'O', 3, '2022-05-04 10:47:09', 1, '2022-05-04 10:47:09', NULL, NULL),
(6, 'SECRETARIA', '.bg-info', 'S', 4, '2022-05-04 10:47:37', 1, '2022-05-04 10:47:37', NULL, NULL),
(7, 'DISTRITO', '.bg-dark', 'D', 5, '2022-05-04 10:48:41', 1, '2022-05-04 10:48:41', NULL, NULL),
(8, 'IGREJA LOCAL', '.bg-primary', 'I', 6, '2022-05-04 10:49:16', 1, '2022-05-04 10:49:16', NULL, NULL),
(9, 'CONGREGAÇÃO', '.bg-secondary', 'N', 7, '2022-05-04 10:49:53', 1, '2022-05-04 10:49:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `isAtivo` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Usuario`
--

INSERT INTO `Usuario` (`id`, `hash`, `nome`, `cpf`, `email`, `celular`, `senha`, `isAtivo`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Paulo Peres', '72300752204', 'devpauloperes@gmail.com', '92981864177', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2022-05-04 10:23:42', 1, '2022-05-04 10:23:42', 1, NULL),
(2, '8a784e5eb4f8f01536d7d7dad002b4b54c1970b3', 'Jamir (1 instituição)', '11111111111', 'jamir@imw.com.br', '(99) 9 9999-9999', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '2022-05-20 10:01:43', 1, '2022-05-20 11:41:28', 1, NULL),
(3, '64763dd7066c1c54d52a559456948c9f9cd7f0f4', 'Erik (sem instituição)', '22222222222', 'erik@imw.com.br', '(66) 6 6666-6666', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '2022-05-20 10:06:31', 1, '2022-05-20 11:43:10', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario_Instituicao`
--

DROP TABLE IF EXISTS `Usuario_Instituicao`;
CREATE TABLE IF NOT EXISTS `Usuario_Instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioId` int(11) NOT NULL,
  `instituicaoId` int(11) NOT NULL,
  `perfilId` int(11) NOT NULL,
  `isCadastraUsuario` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Usuario_Instituicao`
--

INSERT INTO `Usuario_Instituicao` (`id`, `usuarioId`, `instituicaoId`, `perfilId`, `isCadastraUsuario`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, '2022-05-20 10:04:53', 1, '2022-05-20 10:04:53', NULL, NULL),
(2, 1, 2, 4, 0, '2022-05-20 10:05:08', 1, '2022-05-20 10:05:08', NULL, NULL),
(3, 2, 2, 1, 1, '2022-05-20 10:05:27', 1, '2022-05-20 10:05:27', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
