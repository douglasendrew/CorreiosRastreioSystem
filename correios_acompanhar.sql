-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jan-2022 às 16:21
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `correios_acompanhar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `correspondencias`
--

CREATE TABLE `correspondencias` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `ac` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `pessoa_responsavel` varchar(255) NOT NULL,
  `tipo_envio` varchar(255) NOT NULL,
  `ar` varchar(255) NOT NULL,
  `data_envio` varchar(255) NOT NULL,
  `cod_rastreio` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `data_create` varchar(255) NOT NULL,
  `data_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `correspondencias`
--

INSERT INTO `correspondencias` (`id`, `nome_empresa`, `ac`, `cep`, `endereco`, `complemento`, `pessoa_responsavel`, `tipo_envio`, `ar`, `data_envio`, `cod_rastreio`, `usuario`, `data_create`, `data_update`) VALUES
(1, 'Excelent Soluções', 'Douglas Sousa', '16.201-170', 'Rua Joaquim Ciciliati 1069', 'Em frente a escola Herminio', 'Joãozinho', 'SEDEX', 'n/a', '29/01/2023', 'QI560867216BR', '', '1643468181', '1643468916');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `correspondencias`
--
ALTER TABLE `correspondencias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `correspondencias`
--
ALTER TABLE `correspondencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
