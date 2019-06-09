-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2019 às 23:56
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojaze`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(40) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(12) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(14) CHARACTER SET latin1 NOT NULL,
  `endereco` varchar(40) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(40) CHARACTER SET latin1 NOT NULL,
  `complemento` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(40) CHARACTER SET latin1 NOT NULL,
  `estado` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cep` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tipo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cpf` varchar(14) CHARACTER SET latin1 NOT NULL,
  `salario` float NOT NULL,
  `cargo` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `codigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nome` varchar(140) CHARACTER SET latin1 NOT NULL,
  `administrador` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(140) CHARACTER SET latin1 NOT NULL,
  `preco` decimal(7,3) NOT NULL,
  `fabricante` varchar(140) CHARACTER SET latin1 NOT NULL,
  `desconto` decimal(4,2) DEFAULT '0.00',
  `quantidade` int(10) NOT NULL,
  `setor` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_funcionario` varchar(20) NOT NULL,
  `valor_total` decimal(7,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `vendaproduto`
--

CREATE TABLE `vendaproduto` (
  `id_venda` bigint(20) UNSIGNED NOT NULL,
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `quantidade` int(10) NOT NULL,
  `preco` decimal(7,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_cpf` (`cpf`) USING BTREE;

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PS` (`setor`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_SF` (`administrador`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_VC` (`id_cliente`),
  ADD KEY `fk_VF` (`id_funcionario`);

--
-- Indexes for table `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD PRIMARY KEY (`id_venda`,`id_produto`),
  ADD KEY `fk_VPP` (`id_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_UF` FOREIGN KEY (`cpf`) REFERENCES `usuarios` (`cpf`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_PS` FOREIGN KEY (`setor`) REFERENCES `setor` (`codigo`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_VC` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`cpf`),
  ADD CONSTRAINT `fk_VF` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`);

--
-- Limitadores para a tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD CONSTRAINT `fk_VPP` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `fk_VPV` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
