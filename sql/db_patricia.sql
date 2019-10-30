-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30/10/2019 às 17:58
-- Versão do servidor: 10.1.35-MariaDB
-- Versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_patricia_novo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_doenca`
--

CREATE TABLE `tb_doenca` (
  `idtb_doenca` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_doenca`
--

INSERT INTO `tb_doenca` (`idtb_doenca`, `nome`) VALUES
(1, 'Diabetes'),
(2, 'CoraÃ§Ã£o'),
(3, 'HipertensÃ£o'),
(4, 'Colesterol');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_doente`
--

CREATE TABLE `tb_doente` (
  `idtb_doente` int(11) NOT NULL,
  `tb_doenca_idtb_doenca` int(11) NOT NULL,
  `tb_idoso_idtb_idoso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_evento`
--

CREATE TABLE `tb_evento` (
  `idtb_evento` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_frequencia`
--

CREATE TABLE `tb_frequencia` (
  `idtb_frequencia` int(11) NOT NULL,
  `tb_idoso_idtb_idoso` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_historico`
--

CREATE TABLE `tb_historico` (
  `idtb_historico` int(11) NOT NULL,
  `tb_idoso_idtb_idoso` int(11) NOT NULL,
  `data` varchar(45) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_idoso`
--

CREATE TABLE `tb_idoso` (
  `idtb_idoso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `ponto_referencia` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `nis` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `outras_doencas` varchar(255) DEFAULT NULL,
  `medicacoes` varchar(255) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `contato_familiar` varchar(45) DEFAULT NULL,
  `nome_familiar` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'ativo',
  `data_expedicao` varchar(50) DEFAULT NULL,
  `orgao_expedidor` varchar(50) DEFAULT NULL,
  `ja_saiu` varchar(1) DEFAULT NULL,
  `intolerancia` varchar(255) DEFAULT NULL,
  `profile_src` varchar(255) DEFAULT NULL,
  `xerox_src` varchar(255) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_observacao`
--

CREATE TABLE `tb_observacao` (
  `idtb_observacao` int(11) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `mes` varchar(11) NOT NULL,
  `ano` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_doenca`
--
ALTER TABLE `tb_doenca`
  ADD PRIMARY KEY (`idtb_doenca`);

--
-- Índices de tabela `tb_doente`
--
ALTER TABLE `tb_doente`
  ADD PRIMARY KEY (`idtb_doente`),
  ADD KEY `fk_tb_doente_tb_doenca1_idx` (`tb_doenca_idtb_doenca`),
  ADD KEY `fk_tb_doente_tb_idoso1_idx` (`tb_idoso_idtb_idoso`);

--
-- Índices de tabela `tb_evento`
--
ALTER TABLE `tb_evento`
  ADD PRIMARY KEY (`idtb_evento`);

--
-- Índices de tabela `tb_frequencia`
--
ALTER TABLE `tb_frequencia`
  ADD PRIMARY KEY (`idtb_frequencia`),
  ADD KEY `fk_tb_frequencia_tb_idoso_idx` (`tb_idoso_idtb_idoso`);

--
-- Índices de tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD PRIMARY KEY (`idtb_historico`),
  ADD KEY `fk_tb_historico_tb_idoso1_idx` (`tb_idoso_idtb_idoso`);

--
-- Índices de tabela `tb_idoso`
--
ALTER TABLE `tb_idoso`
  ADD PRIMARY KEY (`idtb_idoso`);

--
-- Índices de tabela `tb_observacao`
--
ALTER TABLE `tb_observacao`
  ADD PRIMARY KEY (`idtb_observacao`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_doenca`
--
ALTER TABLE `tb_doenca`
  MODIFY `idtb_doenca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_doente`
--
ALTER TABLE `tb_doente`
  MODIFY `idtb_doente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_evento`
--
ALTER TABLE `tb_evento`
  MODIFY `idtb_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_frequencia`
--
ALTER TABLE `tb_frequencia`
  MODIFY `idtb_frequencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  MODIFY `idtb_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_idoso`
--
ALTER TABLE `tb_idoso`
  MODIFY `idtb_idoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_observacao`
--
ALTER TABLE `tb_observacao`
  MODIFY `idtb_observacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_doente`
--
ALTER TABLE `tb_doente`
  ADD CONSTRAINT `fk_tb_doente_tb_doenca1` FOREIGN KEY (`tb_doenca_idtb_doenca`) REFERENCES `tb_doenca` (`idtb_doenca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_doente_tb_idoso1` FOREIGN KEY (`tb_idoso_idtb_idoso`) REFERENCES `tb_idoso` (`idtb_idoso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_frequencia`
--
ALTER TABLE `tb_frequencia`
  ADD CONSTRAINT `fk_tb_frequencia_tb_idoso` FOREIGN KEY (`tb_idoso_idtb_idoso`) REFERENCES `tb_idoso` (`idtb_idoso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD CONSTRAINT `fk_tb_historico_tb_idoso1` FOREIGN KEY (`tb_idoso_idtb_idoso`) REFERENCES `tb_idoso` (`idtb_idoso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
