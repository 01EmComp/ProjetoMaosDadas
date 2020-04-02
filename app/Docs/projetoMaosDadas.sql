-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 07:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetoMaosDadas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administradores`
--

CREATE TABLE `Administradores` (
  `idAdmin` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `login` varchar(30) COLLATE utf8_bin NOT NULL,
  `senha` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Cidades`
--

CREATE TABLE `Cidades` (
  `idCidade` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `cep` varchar(10) COLLATE utf8_bin NOT NULL,
  `uf` varchar(2) COLLATE utf8_bin NOT NULL,
  `img` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Produtores`
--

CREATE TABLE `Produtores` (
  `idProdutor` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `nomeSocial` varchar(200) COLLATE utf8_bin NOT NULL,
  `whatsapp` varchar(14) COLLATE utf8_bin NOT NULL,
  `endereco` text COLLATE utf8_bin NOT NULL,
  `formaPagamento` varchar(50) COLLATE utf8_bin NOT NULL,
  `formaEntrega` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(144) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ProdutoresTipos`
--

CREATE TABLE `ProdutoresTipos` (
  `id` int(11) NOT NULL,
  `idProdutor` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Tipos`
--

CREATE TABLE `Tipos` (
  `idTipo` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Tipos`
--

INSERT INTO `Tipos` (`idTipo`, `nome`, `descricao`, `img`) VALUES
(1, 'Bebidas e laticinios', '', 'tipo1.jpg'),
(2, 'Serviços', '', 'tipo2.jpg'),
(3, 'Pães', '', 'tipo3.jpg'),
(4, 'Frutas, Legumes e Verduras', '', 'tipo4.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `VisaoFiltroCidadeTipos`
-- (See below for the actual view)
--
CREATE TABLE `VisaoFiltroCidadeTipos` (
`idTipo` int(11)
,`nome` varchar(200)
,`descricao` text
,`img` varchar(100)
,`idCidade` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `VisãoGeralTiposProdutores`
-- (See below for the actual view)
--
CREATE TABLE `VisãoGeralTiposProdutores` (
`idTipo` int(11)
,`idProdutor` int(11)
,`idCidade` int(11)
,`img` varchar(50)
,`nome` varchar(200)
,`descricao` varchar(144)
,`whatsapp` varchar(14)
);

-- --------------------------------------------------------

--
-- Structure for view `VisaoFiltroCidadeTipos`
--
DROP TABLE IF EXISTS `VisaoFiltroCidadeTipos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VisaoFiltroCidadeTipos`  AS  select `Tipos`.`idTipo` AS `idTipo`,`Tipos`.`nome` AS `nome`,`Tipos`.`descricao` AS `descricao`,`Tipos`.`img` AS `img`,`Produtores`.`idCidade` AS `idCidade` from ((`Tipos` join `ProdutoresTipos`) join `Produtores`) where `Produtores`.`idProdutor` = `ProdutoresTipos`.`id` and `Tipos`.`idTipo` = `ProdutoresTipos`.`idTipo` ;

-- --------------------------------------------------------

--
-- Structure for view `VisãoGeralTiposProdutores`
--
DROP TABLE IF EXISTS `VisãoGeralTiposProdutores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `VisãoGeralTiposProdutores`  AS  (select `Tipos`.`idTipo` AS `idTipo`,`Produtores`.`idProdutor` AS `idProdutor`,`Cidades`.`idCidade` AS `idCidade`,`Produtores`.`img` AS `img`,`Produtores`.`nome` AS `nome`,`Produtores`.`descricao` AS `descricao`,`Produtores`.`whatsapp` AS `whatsapp` from (((`ProdutoresTipos` join `Produtores`) join `Cidades`) join `Tipos`) where `ProdutoresTipos`.`idProdutor` = `Produtores`.`idProdutor` and `ProdutoresTipos`.`idTipo` = `Tipos`.`idTipo` and `Produtores`.`idCidade` = `Cidades`.`idCidade`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `Cidades`
--
ALTER TABLE `Cidades`
  ADD PRIMARY KEY (`idCidade`);

--
-- Indexes for table `Produtores`
--
ALTER TABLE `Produtores`
  ADD PRIMARY KEY (`idProdutor`),
  ADD KEY `cidade` (`idCidade`);

--
-- Indexes for table `ProdutoresTipos`
--
ALTER TABLE `ProdutoresTipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtor` (`idProdutor`),
  ADD KEY `tipo` (`idTipo`);

--
-- Indexes for table `Tipos`
--
ALTER TABLE `Tipos`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administradores`
--
ALTER TABLE `Administradores`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cidades`
--
ALTER TABLE `Cidades`
  MODIFY `idCidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Produtores`
--
ALTER TABLE `Produtores`
  MODIFY `idProdutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProdutoresTipos`
--
ALTER TABLE `ProdutoresTipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tipos`
--
ALTER TABLE `Tipos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Produtores`
--
ALTER TABLE `Produtores`
  ADD CONSTRAINT `Produtores_ibfk_1` FOREIGN KEY (`idCidade`) REFERENCES `Cidades` (`idCidade`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ProdutoresTipos`
--
ALTER TABLE `ProdutoresTipos`
  ADD CONSTRAINT `ProdutoresTipos_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `Tipos` (`idTipo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ProdutoresTipos_ibfk_2` FOREIGN KEY (`idProdutor`) REFERENCES `Produtores` (`idProdutor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
