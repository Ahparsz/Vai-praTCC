-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2021 às 02:36
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vaila-banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente`
--

CREATE TABLE `ambiente` (
  `cd_ambiente` int(1) UNSIGNED NOT NULL,
  `nm_ambiente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ambiente`
--

INSERT INTO `ambiente` (`cd_ambiente`, `nm_ambiente`) VALUES
(1, 'rural'),
(2, 'urbano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cd_cidade` int(3) UNSIGNED NOT NULL,
  `id_estado` int(20) UNSIGNED NOT NULL,
  `nm_cidade` varchar(20) NOT NULL,
  `id_clima` int(11) UNSIGNED NOT NULL,
  `id_tipo` int(11) UNSIGNED NOT NULL,
  `id_ambiente` int(11) UNSIGNED NOT NULL,
  `info` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cd_cidade`, `id_estado`, `nm_cidade`, `id_clima`, `id_tipo`, `id_ambiente`, `info`, `foto`) VALUES
(1, 1, 'Aruaña', 2, 2, 1, '0', ''),
(2, 1, 'Aruaña', 2, 7, 1, '0', ''),
(3, 1, 'Uruaçu', 2, 2, 2, '0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clima`
--

CREATE TABLE `clima` (
  `cd_clima` int(1) UNSIGNED NOT NULL,
  `nm_clima` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clima`
--

INSERT INTO `clima` (`cd_clima`, `nm_clima`) VALUES
(1, 'frio'),
(2, 'calor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `cd_estado` int(3) UNSIGNED NOT NULL,
  `id_regiao` int(20) UNSIGNED NOT NULL,
  `nm_estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`cd_estado`, `id_regiao`, `nm_estado`) VALUES
(1, 5, 'Goiás'),
(2, 5, 'Mato Grosso'),
(3, 5, 'Mato Grosso do Sul'),
(4, 3, 'Acre'),
(5, 3, 'Amapá'),
(6, 3, 'Pará'),
(7, 3, 'Rondônia'),
(8, 3, 'Roraima'),
(9, 3, 'Tocantins'),
(10, 3, 'Amazonas'),
(11, 2, 'Santa Catarina'),
(12, 2, 'Rio Grande do Sul'),
(13, 2, 'Paraná'),
(14, 1, 'São Paulo'),
(15, 1, 'Rio de Janeiro'),
(16, 1, 'Minas Gerais'),
(17, 4, 'Ceará');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `cd_favorito` int(10) UNSIGNED NOT NULL,
  `id_usuario` varchar(20) NOT NULL,
  `id_cidade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `cd_imagem` int(10) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info`
--

CREATE TABLE `info` (
  `cd_info` int(10) UNSIGNED NOT NULL,
  `nm_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `cd_regiao` int(100) UNSIGNED NOT NULL,
  `nm_regiao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`cd_regiao`, `nm_regiao`) VALUES
(1, 'Sudeste'),
(2, 'Sul'),
(3, 'Norte'),
(4, 'Nordeste'),
(5, 'Centro-Oeste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `cd_tipo` int(3) UNSIGNED NOT NULL,
  `nm_tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`cd_tipo`, `nm_tipo`) VALUES
(1, 'Praia'),
(2, 'Carnaval'),
(3, 'Ano Novo'),
(4, 'Natal'),
(5, 'Natureza'),
(6, 'Cidade'),
(7, 'Família');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `ativo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nome`, `user`, `email`, `senha`, `nivel`, `ativo`) VALUES
(1, 'Ademiros', 'adm', 'adm@gmail.com', 'quinteto', 2, 1),
(2, 'Nillie', 'nilie', 'nillie@gmail.com', '000000', 1, 1),
(3, 'Aba', 'aba', 'aba', 'aba', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`cd_ambiente`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cd_cidade`),
  ADD KEY `fk_cidadeclima` (`id_clima`),
  ADD KEY `fk_cidadetipo` (`id_tipo`),
  ADD KEY `fk_cidadeambiente` (`id_ambiente`);

--
-- Índices para tabela `clima`
--
ALTER TABLE `clima`
  ADD PRIMARY KEY (`cd_clima`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cd_estado`),
  ADD UNIQUE KEY `cd_estado` (`cd_estado`),
  ADD KEY `fk_estadoregiao` (`id_regiao`);

--
-- Índices para tabela `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`cd_favorito`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`cd_imagem`);

--
-- Índices para tabela `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`cd_info`);

--
-- Índices para tabela `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`cd_regiao`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cd_tipo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nivel` (`nivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `cd_estado` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `cd_favorito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidadeambiente` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`cd_ambiente`),
  ADD CONSTRAINT `fk_cidadeclima` FOREIGN KEY (`id_clima`) REFERENCES `clima` (`cd_clima`),
  ADD CONSTRAINT `fk_cidadetipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`cd_tipo`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_estadoregiao` FOREIGN KEY (`id_regiao`) REFERENCES `regiao` (`cd_regiao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
