
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 14/06/2017 às 18:56:22
-- Versão do Servidor: 10.1.24-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u458657949_cac`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `couriers`
--

CREATE TABLE IF NOT EXISTS `couriers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courier` varchar(255) NOT NULL,
  `average` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `averagebr` int(11) NOT NULL,
  `sumbr` int(11) NOT NULL,
  `counterbr` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Estrutura da tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `br` int(11) NOT NULL,
  `house` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  `average` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
