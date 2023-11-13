-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13/11/2023 às 02:48
-- Versão do servidor: 8.0.32
-- Versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `nascimento`, `data`) VALUES
(8, 'Jorge Alemão', 'alemao@email.com', '31996825009', '1989-03-23', '2023-09-28 13:27:10'),
(10, 'Rogério Barros', 'rogerio@email.com', '31996825009', '1980-07-23', '2023-09-28 16:17:45'),
(15, 'Wilker Junio Coelho Pimenta', 'wiljcpimenta@gmail.com', '31996825009', '1989-03-23', '2023-11-12 23:36:07'),
(11, 'João Lima da Silva', 'joaolima@hotmail.com', '31996824054', '2002-04-14', '2023-09-29 01:28:50'),
(14, 'Alex Peixoto da Silva', 'alexps@gmail.com', '31995898998', '2004-04-02', '2023-10-09 14:37:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_de_servico`
--

CREATE TABLE `ordem_de_servico` (
  `id` int NOT NULL,
  `nome_os` varchar(255) DEFAULT NULL,
  `servico` text,
  `materiais` decimal(10,2) DEFAULT NULL,
  `mao_de_obra` decimal(10,2) DEFAULT NULL,
  `orcamento_total` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `ordem_de_servico`
--

INSERT INTO `ordem_de_servico` (`id`, `nome_os`, `servico`, `materiais`, `mao_de_obra`, `orcamento_total`, `date`) VALUES
(1, 'APEC SOC LTDA', 'SISTEMA DE GESTÃO', 5000.00, 1500.00, 6500.00, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices de tabela `ordem_de_servico`
--
ALTER TABLE `ordem_de_servico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
