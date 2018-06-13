-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 10-Jun-2018 às 17:12
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
  `foi_afetado` varchar(5) NOT NULL,
  PRIMARY KEY (`id_efeitos`),
  KEY `cod_greve` (`cod_greve`),
  KEY `cod_greve_2` (`cod_greve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `greve`
--

CREATE TABLE IF NOT EXISTS `greve` (
  `id_greve` int(10) NOT NULL AUTO_INCREMENT,
  `nome_greve` varchar(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `ano` int(4) NOT NULL,
  PRIMARY KEY (`id_greve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opiniao`
--

CREATE TABLE IF NOT EXISTS `opiniao` (
  `id_opiniao` int(10) NOT NULL AUTO_INCREMENT,
  `cod_greve` int(11) NOT NULL,
  `concordar_discordar` varchar(10) NOT NULL,
  `esperado` varchar(300) NOT NULL,
  PRIMARY KEY (`id_opiniao`),
  KEY `cod_greve` (`cod_greve`),
  KEY `cod_greve_2` (`cod_greve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
