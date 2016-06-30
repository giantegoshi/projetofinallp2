-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2016 às 10:04
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_projetolp2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
`id` int(4) NOT NULL,
  `email` varchar(80) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `email`, `descricao`) VALUES
(3, 'teste@teste.teste', 'Teste de contato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE IF NOT EXISTS `formacao` (
`id` int(4) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`id`, `titulo`, `descricao`) VALUES
(1, 'Instituição de Ensino Médio', 'E.E. Infante Dom Henrique\r\nSituação: Finalizado em Dezembro de 2013'),
(2, 'Instituição de Ensino Técnico', 'ETEC Professor Horácio Augusto da Silveira\r\nCurso: Técnico em Informática\r\nSituação: Finalizado em Dezembro de 2013'),
(6, 'Instituição de Ensino Superior', 'IFSP – Instituto Federal de Educação, Ciência e Tecnologia de São Paulo – Campus Guarulhos\r\nCurso: Tecnologia em Análise e Desenvolvimento de Sistemas\r\nSituação: Cursando\r\nInício em 07/2014\r\nTérmino previsto em 07/2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `home`
--

CREATE TABLE IF NOT EXISTS `home` (
`id` int(4) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `home`
--

INSERT INTO `home` (`id`, `titulo`, `descricao`) VALUES
(1, 'Bem vindo ao meu site', 'Acesse o menu acima para mais informações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(4) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `descricao`) VALUES
(1, 'Sobre'),
(2, 'Formacao'),
(3, 'Trabalho'),
(4, 'Contato'),
(5, 'PDF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menuadmin`
--

CREATE TABLE IF NOT EXISTS `menuadmin` (
  `id` int(4) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menuadmin`
--

INSERT INTO `menuadmin` (`id`, `descricao`) VALUES
(1, 'Sobre'),
(2, 'Formacao'),
(3, 'Trabalho'),
(4, 'Contato'),
(5, 'Usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE IF NOT EXISTS `sobre` (
`id` int(4) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` text NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`id`, `nome`, `descricao`, `image`) VALUES
(1, 'Gian Seiji Tegoshi', 'Idade: 19 anos\r\nEstado civil: Solteiro', 'perfil.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE IF NOT EXISTS `trabalho` (
`id` int(4) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id`, `titulo`, `descricao`) VALUES
(1, 'Instituição: Arquivo Público do Estado de São Paulo - APESP', 'Função: Estagiário – Novembro/2015 a Maio/2016\r\nAtuação na área de desenvolvimento de sistemas e atualização do site, sendo desenvolvido uma ferramenta de busca para o site da instituição, atualização da Revista Digital do Arquivo Público do Estado de São Paulo, desenvolvimento de um sistema para o controle do acervo de arquivos, desenvolvimento de uma galeria para a exposição sobre Júlio Prestes realizada no Arquivo Público do Estado de São Paulo e desenvolvimento de um sistema para o controle de atendimento da instituição');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(4) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(90) NOT NULL,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `pergunta`, `resposta`) VALUES
(1, 'Gian Seiji Tegoshi', 'admin', 'admin', 'Primeiro nome do professor da matéria de lp2', 'Reinaldo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacao`
--
ALTER TABLE `formacao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuadmin`
--
ALTER TABLE `menuadmin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sobre`
--
ALTER TABLE `sobre`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabalho`
--
ALTER TABLE `trabalho`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `formacao`
--
ALTER TABLE `formacao`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sobre`
--
ALTER TABLE `sobre`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trabalho`
--
ALTER TABLE `trabalho`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
