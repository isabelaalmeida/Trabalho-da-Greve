-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Jun-2018 às 02:14
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `greve`
--
CREATE DATABASE IF NOT EXISTS `greve` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `greve`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `efeitos`
--

CREATE TABLE IF NOT EXISTS `efeitos` (
  `id_efeitos` int(10) NOT NULL AUTO_INCREMENT,
  `cod_greve` int(10) NOT NULL,
  `opcao_efeitos` varchar(5) NOT NULL,
  PRIMARY KEY (`id_efeitos`),
  KEY `cod_greve` (`cod_greve`),
  KEY `cod_greve_2` (`cod_greve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `efeitos`
--

INSERT INTO `efeitos` (`id_efeitos`, `cod_greve`, `opcao_efeitos`) VALUES
(3, 2, 'NÃ£o'),
(4, 2, 'Sim'),
(5, 1, 'NÃ£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `greve`
--

CREATE TABLE IF NOT EXISTS `greve` (
  `id_greve` int(10) NOT NULL AUTO_INCREMENT,
  `nome_greve` varchar(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `ano` int(4) NOT NULL,
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`id_greve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `greve`
--

INSERT INTO `greve` (`id_greve`, `nome_greve`, `motivo`, `ano`, `pais`) VALUES
(1, 'Caminhoneiros', 'CombustÃ­vel', 2018, 'Brasil'),
(2, 'Greve dos Professores', 'condiÃ§Ãµes precÃ¡rias', 2012, 'RÃºssia');

-- --------------------------------------------------------

--
-- Stand-in structure for view `info_consequencia_greve`
--
CREATE TABLE IF NOT EXISTS `info_consequencia_greve` (
`nome_greve` varchar(100)
,`id_efeitos` int(10)
,`opcao_efeitos` varchar(5)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `info_opiniao_greve`
--
CREATE TABLE IF NOT EXISTS `info_opiniao_greve` (
`nome_greve` varchar(100)
,`id_opiniao` int(10)
,`opcao` varchar(10)
,`opiniao` varchar(300)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `opiniao`
--

CREATE TABLE IF NOT EXISTS `opiniao` (
  `id_opiniao` int(10) NOT NULL AUTO_INCREMENT,
  `cod_greve` int(11) NOT NULL,
  `opcao` varchar(10) NOT NULL,
  `opiniao` varchar(300) NOT NULL,
  PRIMARY KEY (`id_opiniao`),
  KEY `cod_greve` (`cod_greve`),
  KEY `cod_greve_2` (`cod_greve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `opiniao`
--

INSERT INTO `opiniao` (`id_opiniao`, `cod_greve`, `opcao`, `opiniao`) VALUES
(2, 2, 'NÃ£o', 'Mundo'),
(5, 1, 'NÃ£o', 'hjjhvggv'),
(7, 1, 'Sim', 'Apoio os caminhoneiros'),
(8, 2, 'Sim', 'ola'),
(9, 2, 'NÃ£o', 'tseresrsrfaw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `id_pessoa` int(10) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(100) NOT NULL,
  `emprego` varchar(30) NOT NULL,
  `idade` int(2) NOT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `nome_pessoa`, `emprego`, `idade`) VALUES
(3, 'Nataly Raquel Camargo Freitas', 'FotÃ³grafa', 22),
(4, 'Isabela Almeida', 'Estudante do IF', 18),
(5, 'Isabela Almeida', 'Estudante do IF', 18),
(6, 'NathÃ¡lia Santana Santos', 'Estudante', 18),
(7, 'Nome 1', 'Analista financeiro', 24);

-- --------------------------------------------------------

--
-- Structure for view `info_consequencia_greve`
--
DROP TABLE IF EXISTS `info_consequencia_greve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_consequencia_greve` AS select `nome_greve` AS `nome_greve`,`efeitos`.`id_efeitos` AS `id_efeitos`,`efeitos`.`opcao_efeitos` AS `opcao_efeitos` from (`greve` join `efeitos` on((`id_greve` = `efeitos`.`cod_greve`)));

-- --------------------------------------------------------

--
-- Structure for view `info_opiniao_greve`
--
DROP TABLE IF EXISTS `info_opiniao_greve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_opiniao_greve` AS select `nome_greve` AS `nome_greve`,`opiniao`.`id_opiniao` AS `id_opiniao`,`opiniao`.`opcao` AS `opcao`,`opiniao`.`opiniao` AS `opiniao` from (`greve` join `opiniao` on((`id_greve` = `opiniao`.`cod_greve`)));

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `efeitos`
--
ALTER TABLE `efeitos`
  ADD CONSTRAINT `efeitos_ibfk_1` FOREIGN KEY (`cod_greve`) REFERENCES `greve` (`id_greve`);

--
-- Limitadores para a tabela `opiniao`
--
ALTER TABLE `opiniao`
  ADD CONSTRAINT `opiniao_ibfk_1` FOREIGN KEY (`cod_greve`) REFERENCES `greve` (`id_greve`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
