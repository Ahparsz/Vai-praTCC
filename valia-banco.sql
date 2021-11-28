-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2021 às 01:03
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
-- Banco de dados: `valia-banco`
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
(1, 'Rural'),
(2, 'Urbano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cd_cidade` int(3) UNSIGNED NOT NULL,
  `id_estado` int(20) UNSIGNED NOT NULL,
  `nm_cidade` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `coordenadas` int(20) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cd_cidade`, `id_estado`, `nm_cidade`, `info`, `coordenadas`, `foto`) VALUES
(1, 1, 'Aruaña', '0', 0, ''),
(2, 1, 'Uruaçu', '0', 0, ''),
(3, 1, 'Cidade de Goiás', '0', 0, ''),
(4, 1, 'Porangatu', '0', 0, ''),
(5, 1, 'Cocalzinho de Goiás', '0', 0, ''),
(6, 1, 'Goiânia', '0', 0, ''),
(7, 1, 'Cristalina', '0', 0, ''),
(8, 1, 'Caldas Novas', '0', 0, ''),
(9, 1, 'Salto Corumbá', '0', 0, ''),
(10, 1, 'Alto Paraíso', '0', 0, ''),
(11, 1, 'Pirenópolis', '0', 0, ''),
(12, 1, 'Cavalcante', '0', 0, ''),
(13, 1, 'Formosa', '0', 0, ''),
(14, 1, 'Chapado dos Veadeiro', '0', 15, ''),
(16, 1, 'Mambaí', '0', 0, ''),
(17, 2, 'Cuiabá', '0', 0, ''),
(18, 2, 'Chapada dos Guimarõe', '0', 0, ''),
(19, 2, 'Alta Floresta', '0', 0, ''),
(20, 2, 'Areanápolis', '0', 0, ''),
(21, 2, 'Sorriso', '0', 0, ''),
(22, 2, 'Cáceres', '0', 0, ''),
(23, 2, 'Nobres', '0', 0, ''),
(24, 2, 'Jaciara', '0', 0, ''),
(25, 2, 'Poconé', '0', 0, ''),
(26, 2, 'Juína', '0', 0, ''),
(27, 2, 'Primavera do Leste', '0', 0, ''),
(28, 2, 'Vila Bela da Santíss', '0', 0, ''),
(29, 2, 'Portal do Araguaia', '0', 0, ''),
(30, 2, 'Serra do Roncador', '0', 0, ''),
(31, 2, 'Barra do Garças', '0', 0, ''),
(32, 3, 'Campo Grande', '0', 0, ''),
(33, 3, 'Jardim', '0', 0, ''),
(34, 3, 'Bonito', '0', 0, ''),
(35, 3, 'Corumbá', '0', 0, ''),
(36, 3, 'Costa Rica', '0', 0, ''),
(39, 3, 'Pantanal', '0', 0, ''),
(43, 3, 'Bodoquena', '0', 0, ''),
(44, 3, 'Miranda', '0', 0, ''),
(47, 3, 'Ponta Porã', '0', 0, ''),
(50, 3, 'Aquidauana', '0', 0, ''),
(52, 4, 'Rio Branco', '0', 0, ''),
(53, 4, 'Cruzeiro do Sul', '0', 0, ''),
(54, 5, 'Macapá', '0', 0, ''),
(55, 5, 'Santana', '0', 0, ''),
(56, 6, 'Alter do Chão', '0', 0, ''),
(57, 6, 'Belém', '0', 0, ''),
(58, 7, 'Porto Velho', '0', 0, ''),
(59, 7, 'Guarajará-Mirim', '0', 0, ''),
(60, 8, 'Uiramitã', '0', 0, ''),
(61, 8, 'Boa Vista', '0', 0, ''),
(62, 9, 'Palmas', '0', 0, ''),
(63, 9, 'Araguaína', '0', 0, ''),
(64, 9, 'Manaus', '0', 0, ''),
(65, 10, 'Parintins', '0', 0, ''),
(67, 16, 'Ouro Preto', 'Ouro Preto é uma cid', 0, ''),
(122, 14, 'Itanhaém', 'É UMA CIDADE SUPIMPA', 1111111, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadeambiente`
--

CREATE TABLE `cidadeambiente` (
  `id_cidade` int(3) UNSIGNED NOT NULL,
  `id_ambiente` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidadeambiente`
--

INSERT INTO `cidadeambiente` (`id_cidade`, `id_ambiente`) VALUES
(1, 1),
(30, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadeclima`
--

CREATE TABLE `cidadeclima` (
  `id_cidade` int(3) UNSIGNED NOT NULL,
  `id_clima` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidadeclima`
--

INSERT INTO `cidadeclima` (`id_cidade`, `id_clima`) VALUES
(1, 2),
(34, 1),
(34, 2),
(30, 1),
(30, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadetipo`
--

CREATE TABLE `cidadetipo` (
  `id_cidade` int(20) UNSIGNED NOT NULL,
  `id_tipo` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidadetipo`
--

INSERT INTO `cidadetipo` (`id_cidade`, `id_tipo`) VALUES
(1, 2),
(1, 7),
(30, 4),
(30, 5);

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
(1, 'Frio'),
(2, 'Calor');

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
(17, 1, 'Espírito Santo'),
(22, 4, 'Bahia'),
(23, 4, 'Sergipe'),
(24, 4, 'Sergipe'),
(26, 3, 'Jundia'),
(27, 3, 'Jundia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `cd_favorito` int(10) UNSIGNED NOT NULL,
  `id_cidade` int(20) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`cd_favorito`, `id_cidade`, `id_usuario`) VALUES
(1, 16, 5),
(2, 55, 5),
(3, 53, 2),
(5, 31, 5),
(8, 67, 5),
(16, 122, 5),
(19, 10, 5),
(22, 67, 1),
(23, 122, 1),
(24, 122, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE `regiao` (
  `cd_regiao` int(100) UNSIGNED NOT NULL,
  `nm_regiao` varchar(200) NOT NULL,
  `info` text NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`cd_regiao`, `nm_regiao`, `info`, `foto`) VALUES
(1, 'Sudeste', 'O sudeste do Brasil é uma das cinco divisões regionais do nosso país.\r\n                O sudeste é uma das menores regiões do Brasil, ocupando 11% do território. Entretanto, é a região mais povoada, com uma densidade populacional de 90 habitantes por quilômetro quadrado.\r\n                É nela que estão grandes centros como São Paulo e Rio de Janeiro, duas cidades globais, que exercem influência sobre todo o território nacional.', NULL),
(2, 'Sul', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', NULL),
(3, 'Norte', 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB', NULL),
(4, 'Nordeste', 'CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC', NULL),
(5, 'Centro-Oeste', 'VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV', NULL);

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
(7, 'Família'),
(8, 'Cachoeira'),
(9, 'Fazenda'),
(10, 'Histórico');

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
  `ativo` int(1) NOT NULL DEFAULT 1,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nome`, `user`, `email`, `senha`, `nivel`, `ativo`, `foto`) VALUES
(1, 'Ademiros', 'adm', 'adm@gmail.com', 'quinteto', 2, 1, ''),
(2, 'Nillie', 'nilie', 'nillie@gmail.com', '000000', 1, 1, ''),
(3, 'Aba', 'aba', 'aba', 'aba', 1, 1, ''),
(4, 'Nillie', 'NILIESW', 'nill@gmail.com', '12', 1, 1, ''),
(5, 'Yakko', 'yako', 'yako@gmail.com', '123', 1, 1, ''),
(9, 'QWE', 'qwe', 'qwe@gmail.com', '123', 1, 1, NULL),
(11, 'Dora Aventureira', 'dora', 'dora@gmail.com', 'mochila', 1, 1, NULL),
(14, 'mily', 'mily', 'mily@gmail.com', 'dog', 1, 1, NULL),
(15, '123', '123', '123@gmail.com', '456', 1, 1, NULL),
(16, 'uyghdj', 'koji', 'sdsd@gmail.com', 'sdwd', 1, 1, NULL),
(17, 'dwdsasc', 'qwerthj', 'lucienezanirato@gmail.com', '123', 1, 1, NULL),
(18, 'Ababa', 'ababa', 'ababa@gmail.com', '123', 1, 1, NULL);

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
  ADD KEY `fk_cidadeestado` (`id_estado`);

--
-- Índices para tabela `cidadeambiente`
--
ALTER TABLE `cidadeambiente`
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `id_ambiente` (`id_ambiente`);

--
-- Índices para tabela `cidadeclima`
--
ALTER TABLE `cidadeclima`
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `id_clima` (`id_clima`);

--
-- Índices para tabela `cidadetipo`
--
ALTER TABLE `cidadetipo`
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `id_tipo` (`id_tipo`);

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
  ADD PRIMARY KEY (`cd_favorito`),
  ADD KEY `fk_cidadefavorito` (`id_cidade`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cd_cidade` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `cd_estado` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `cd_favorito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidadeestado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`cd_estado`);

--
-- Limitadores para a tabela `cidadeambiente`
--
ALTER TABLE `cidadeambiente`
  ADD CONSTRAINT `cidadeambiente_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`cd_cidade`),
  ADD CONSTRAINT `cidadeambiente_ibfk_2` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`cd_ambiente`);

--
-- Limitadores para a tabela `cidadeclima`
--
ALTER TABLE `cidadeclima`
  ADD CONSTRAINT `cidadeclima_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`cd_cidade`),
  ADD CONSTRAINT `cidadeclima_ibfk_2` FOREIGN KEY (`id_clima`) REFERENCES `clima` (`cd_clima`);

--
-- Limitadores para a tabela `cidadetipo`
--
ALTER TABLE `cidadetipo`
  ADD CONSTRAINT `cidadetipo_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`cd_cidade`),
  ADD CONSTRAINT `cidadetipo_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`cd_tipo`);

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `fk_estadoregiao` FOREIGN KEY (`id_regiao`) REFERENCES `regiao` (`cd_regiao`);

--
-- Limitadores para a tabela `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_cidadefavorito` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`cd_cidade`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
