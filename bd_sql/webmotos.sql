-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09/09/2020 às 18:33
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webmotos`
--
CREATE DATABASE IF NOT EXISTS `webmotos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webmotos`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `motos`
--

CREATE TABLE IF NOT EXISTS `motos` (
  `id_moto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'foto_moto.jpg',
  `fila_compra` char(1) NOT NULL DEFAULT 'N',
  `venda_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_moto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `motos`
--

INSERT INTO `motos` (`id_moto`, `tipo`, `marca`, `modelo`, `preco`, `foto`, `fila_compra`, `venda_id`) VALUES
(1, 'SPORT', 'HONDA', 'CBR 650R', '4999.99', 'foto_moto.jpg', 'N', NULL),
(2, 'CITY', 'HONDA', 'BIZ110I', '6999.99', 'foto_moto.jpg', 'N', NULL),
(3, 'SCOOTER', 'HONDA', 'ELITE 125', '3599.99', 'foto_moto.jpg', 'N', NULL),
(6, 'SCOOTER', 'YAMAHA', 'NEO 125 UBS 2021', '9999.99', 'IMG_2_MOTO_YAMAHA_NEO 125 UBS 2021.jpg', 'N', NULL),
(7, 'CITY', 'YAMAHA', 'FACTOR 125I UBS 2021', '12000.00', 'IMG_3_MOTO_FACTOR 125I UBS 2021.jpg', 'N', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone_contato` varchar(20) DEFAULT NULL,
  `perfil_usr` varchar(30) NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `imagem_usr` varchar(150) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `nome`, `email`, `cpf`, `telefone_contato`, `perfil_usr`, `login`, `senha`, `status`, `imagem_usr`) VALUES
(1, 'Administrador', 'admininstrador@mail.com', '000.000.00-01', '61885202470', 'ADMINISTRADOR', 'admin', '1', 'A', 'images/admin.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `data_venda` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `fk1_vendas_usuarios` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk1_vendas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usr`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
