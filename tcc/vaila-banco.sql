-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Ago-2021 às 22:44
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
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cd_cidade` int(3) UNSIGNED NOT NULL,
  `id_estado` int(20) NOT NULL,
  `nm_cidade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cd_cidade`, `id_estado`, `nm_cidade`) VALUES
(1, 1, 'Aruaña'),
(2, 1, 'Uruaçu'),
(3, 1, 'Cidade de Goiás'),
(4, 1, 'Porangatu'),
(5, 1, 'Cocalzinho de Goiás'),
(6, 1, 'Goiânia'),
(7, 1, 'Cristalina'),
(8, 1, 'Salto Corumbá'),
(9, 1, 'Alto Paraíso'),
(10, 1, 'Pirenópolis'),
(11, 1, 'Cavalcante'),
(12, 1, 'Formosa'),
(13, 1, 'Chapado dos Veadeiro'),
(14, 1, 'Mambaí'),
(15, 1, 'Caldas Novas'),
(16, 2, 'Cuiabá'),
(17, 2, 'Chapada dos Guimarõe'),
(18, 2, 'Alta Floresta'),
(19, 2, 'Areanápolis'),
(20, 2, 'Sorriso'),
(21, 2, 'Cáceres'),
(22, 2, 'Nobres'),
(23, 2, 'Jaciara'),
(24, 2, 'Poconé'),
(25, 2, 'Primavera do Leste'),
(26, 2, 'Vila Bela da Santíss'),
(27, 2, 'Portal do Araguaia'),
(28, 2, 'Serra do Roncador'),
(29, 2, 'Barra do Garças'),
(30, 3, 'Campo Grande'),
(31, 3, 'Jardim'),
(32, 3, 'Bonito'),
(33, 3, 'Corumbá'),
(34, 3, 'Costa Rica'),
(35, 3, 'Pantanal'),
(36, 3, 'Bodoquena'),
(37, 3, 'Miranda'),
(38, 3, 'Ponta Porã'),
(39, 3, 'Aquidauana'),
(40, 4, 'Rio Branco'),
(41, 4, 'Cruzeiro do Sul'),
(42, 5, 'Macapá'),
(43, 5, 'Santana'),
(44, 6, 'Alter do Chão'),
(45, 6, 'Belém'),
(46, 7, 'Porto Velho'),
(47, 7, 'Guajará-Mirim'),
(48, 8, 'Uiramitã'),
(49, 8, 'Boa Vista'),
(50, 9, 'Palmas'),
(51, 9, 'Araguaína'),
(52, 10, 'Parintins'),
(53, 9, 'Manaus');

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
  `id_regiao` int(20) NOT NULL,
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
(10, 3, 'Amazonas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `cd_favorito` int(10) UNSIGNED NOT NULL,
  `id_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `cd_imagem` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `id_ponto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `cd_ponto` int(10) UNSIGNED NOT NULL,
  `id_cidade` varchar(20) NOT NULL DEFAULT '',
  `nm_ponto` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto-roteiro`
--

CREATE TABLE `ponto-roteiro` (
  `cd_ponto-roteiro` int(10) UNSIGNED NOT NULL,
  `id_ponto` varchar(20) NOT NULL,
  `id_roteiro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `roteiro`
--

CREATE TABLE `roteiro` (
  `cd_roteiro` int(100) UNSIGNED NOT NULL,
  `id_clima` int(20) NOT NULL,
  `id_tipo` int(20) NOT NULL,
  `id_ponto` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'Cidade'),
(8, 'Família');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` int(3) UNSIGNED NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Nillie', 'triliche@gmail.com', '000'),
(2, 'WEWE', 'badguy@gmail.com', '111'),
(3, 'Pipolho', 'badguy@gmail.com', '111'),
(4, 'Helena', 'helenasars@gmail.com', '222');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cd_cidade`);

--
-- Índices para tabela `clima`
--
ALTER TABLE `clima`
  ADD PRIMARY KEY (`cd_clima`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cd_estado`);

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
-- Índices para tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`cd_ponto`);

--
-- Índices para tabela `ponto-roteiro`
--
ALTER TABLE `ponto-roteiro`
  ADD PRIMARY KEY (`cd_ponto-roteiro`);

--
-- Índices para tabela `regiao`
--
ALTER TABLE `regiao`
  ADD PRIMARY KEY (`cd_regiao`);

--
-- Índices para tabela `roteiro`
--
ALTER TABLE `roteiro`
  ADD PRIMARY KEY (`cd_roteiro`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cd_tipo`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
