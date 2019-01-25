-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Maio-2017 às 09:15
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE `candidato` (
  `id_candidato` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `numero` int(13) NOT NULL,
  `partido` varchar(20) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id_candidato`, `nome`, `numero`, `partido`, `cargo`) VALUES
(50, 'Mariana Lins', 24, 'PTR', 'Presidente'),
(51, 'kaio CÃ©sar', 34, 'PAD', 'Presidente'),
(52, 'Luciano Novais', 12, 'PDC', 'Presidente'),
(53, 'Gabriel Carvalho', 56, 'PTU', 'Presidente'),
(69, 'Bruno Miqueias', 17, 'PGF', 'Presidencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eleitor`
--

CREATE TABLE `eleitor` (
  `id_eleitor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `numero` varchar(17) NOT NULL,
  `voto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eleitor`
--

INSERT INTO `eleitor` (`id_eleitor`, `nome`, `numero`, `voto`) VALUES
(5, 'Edson Diaquino', '11474836834979', 1),
(7, 'Carlos Vieira', '21474816226189', 1),
(9, 'David Pereira', '21474836422423', 1),
(10, 'Felipe Jóse', '10474836422733', 1),
(11, 'lucas', '12342555522422', 1),
(12, 'Daniel Vieira', '11498364261233', 1),
(13, 'Daniel Ferreira', '12234764761235', 1),
(14, 'Marcos Alba', '21474836071222', 1),
(20, 'Junior Luiz', '11474836345345', 1),
(21, 'Fabiano', '21474836479999', 0),
(22, 'Weligton', '21474126272367', 1),
(23, 'Gabriel Dantas Modesto', '12348868621134', 0),
(24, 'Felipe Daniel', '12587868587577', 0),
(25, 'Luciano Novais', '32425252546464', 0),
(26, 'Kaio  Victor', '24878789798797', 0),
(27, 'Thales Vinicius', '87897896742760', 0),
(28, 'Samuel Xavier ', '27689978098222', 0),
(29, 'Rafael Ugo', '83222214463664', 0),
(30, 'Elicio Viera', '98989210098832', 1),
(31, 'Paulo Saraiva', '67587648965982', 1),
(32, 'Fernado Fenandes', '89609790797907', 0),
(33, 'Beto Bernato', '35161634636463', 1),
(34, 'Tiago Vieira', '90080987097097', 1),
(35, 'Nael Luz', '46373744585858', 1),
(36, 'Carlos Alberto', '24444489794636', 1),
(37, 'Bruno Miqueias', '98989878578242', 0),
(38, 'Sergio Marcos', '46364626477889', 0),
(39, 'Francisco Rocha', '46264626475745', 0),
(40, 'Macio Beto', '12322444242445', 0),
(41, 'Italo Costa', '32425263465757', 0),
(42, 'Ugo Linhares', '89798769506790', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacao`
--

CREATE TABLE `votacao` (
  `id_voto` int(2) NOT NULL,
  `voto` varchar(50) NOT NULL,
  `Partido` varchar(50) NOT NULL,
  `id_candidatos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `votacao`
--

INSERT INTO `votacao` (`id_voto`, `voto`, `Partido`, `id_candidatos`) VALUES
(115, '2', 'PTR', 50),
(116, '2', 'PAD', 51),
(117, '4', 'PDC', 52),
(118, '2', 'PTU', 53),
(145, '12', 'PGF', 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `partido` (`partido`);

--
-- Indexes for table `eleitor`
--
ALTER TABLE `eleitor`
  ADD PRIMARY KEY (`id_eleitor`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `numero_2` (`numero`),
  ADD UNIQUE KEY `numero_4` (`numero`),
  ADD KEY `numero_3` (`numero`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `votacao`
--
ALTER TABLE `votacao`
  ADD PRIMARY KEY (`id_voto`),
  ADD KEY `id_candidatos` (`id_candidatos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `eleitor`
--
ALTER TABLE `eleitor`
  MODIFY `id_eleitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `votacao`
--
ALTER TABLE `votacao`
  MODIFY `id_voto` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;