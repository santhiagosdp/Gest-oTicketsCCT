-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Nov-2017 às 00:30
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `usuario` varchar(60) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `observacoes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`usuario`, `descricao`, `observacoes`) VALUES
('admin', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `usuario` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `saldoinicial` double NOT NULL,
  `saldoatual` double NOT NULL,
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`usuario`, `id`, `descricao`, `observacoes`, `saldoinicial`, `saldoatual`, `tipo`) VALUES
('admin', 3, 'bb', 'banco brasil', 3000, 0, 'corrente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` float NOT NULL,
  `certificado` varchar(150) NOT NULL,
  `ticket` float NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

CREATE TABLE `financeiro` (
  `usuario` varchar(60) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `dtemissao` date DEFAULT NULL,
  `dtpagamento` date DEFAULT NULL,
  `vlrbruto` double DEFAULT NULL,
  `vlrdesconto` double DEFAULT NULL,
  `vlrjuros` double DEFAULT NULL,
  `vlrliquido` double DEFAULT NULL,
  `conta` varchar(60) DEFAULT NULL,
  `observacoes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

CREATE TABLE `students` (
  `sno` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `fee` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `senha`) VALUES
('admim', 'admin'),
('admim', '21232f297a57a5a743894a0e4a801fc3'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendidos`
--

CREATE TABLE `vendidos` (
  `id` int(11) NOT NULL,
  `certificado` varchar(50) NOT NULL,
  `ticket` int(11) NOT NULL,
  `valor` float NOT NULL,
  `valor_pago` float NOT NULL,
  `modelo_pagto` varchar(20) NOT NULL,
  `num_boleto` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `contador` varchar(20) NOT NULL,
  `observação` varchar(200) NOT NULL,
  `agente_registro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendidos`
--

INSERT INTO `vendidos` (`id`, `certificado`, `ticket`, `valor`, `valor_pago`, `modelo_pagto`, `num_boleto`, `cliente`, `contador`, `observação`, `agente_registro`) VALUES
(1, 'teste123', 1111111111, 253, 253, 'debito', 0, 'teste cliente', 'teste contador', 'teste obs', 'admin'),
(2, 'teste123', 1111111111, 253, 253, 'debito', 0, 'teste cliente', 'teste contador', 'teste obs', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`usuario`,`descricao`);

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeiro`
--
ALTER TABLE `financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `vendidos`
--
ALTER TABLE `vendidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` float NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financeiro`
--
ALTER TABLE `financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vendidos`
--
ALTER TABLE `vendidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
