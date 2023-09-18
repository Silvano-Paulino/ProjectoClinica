-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2023 às 21:22
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendar`
--
CREATE DATABASE IF NOT EXISTS `agendamento` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agendamento`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `servico_idServico` int(11) NOT NULL,
  `data` date NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `telefone` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensagem` text,
  `codigo` varchar(70) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `servico_idServico`, `data`, `nome`, `telefone`, `email`, `mensagem`, `codigo`, `estado`) VALUES
(27, 1, '2023-03-24', 'Jonathan Cavimbi', '987 654 312', 'silvanocavimbi20@gmail.com ', 'Com certeza.', 'WM181624', 0),
(28, 1, '2023-03-24', 'Jonathan Cavimbi', '987 654 312', 'silvanocavimbi20@gmail.com ', 'oibdyubffuyjm', 'PF331840', 0),
(29, 1, '2023-03-24', 'Jonathan Cavimbi', '987 654 312', 'silvanocavimbi20@gmail.com ', 'dfgfdgvcvsfgsfdds', '57134400', 0),
(30, 1, '2023-03-24', 'Jonathan Cavimbi', '987 654 312', 'silvanocavimbi20@gmail.com ', 'rtrtfdfsfsfs', '80784003', 0),
(31, 3, '2023-03-24', 'Jonathan ', '987 654 312', 'silvanocavimbi20@gmail.com  ', 'kfdsnissoi', '8874134', 0),
(32, 4, '2023-05-04', 'Jonathan Ivandro', '978 654 321', 'silvanocavimbi20@gmail.com', 'lsfnfduks', '592999', 0),
(33, 3, '2023-03-30', 'Kendra Da GlÃ³ria', '923 456 568', 'kendra@gmail.com', 'Senhor doctor me atenda bem.', '204238', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `area` varchar(70) DEFAULT NULL,
  `img` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`idMedico`, `nome`, `area`, `img`) VALUES
(1, 'Dr. Stein Albert', 'Cardiologista', 'doctor_1.jpg'),
(2, 'Dr. Rick Melvin', 'Odontologista', 'doctor_2.jpg'),
(3, 'Dr. Rebecca Steffany', 'Ortopedista', 'doctor_3.jpg'),
(4, 'Dr. Naomi Maddison', 'Neurologista', 'doctor_1.jpg'),
(5, 'Dr. Alex Yoshida', 'Ortopedista', 'doctor_2.jpg'),
(6, 'Dr. Kate Beckett', 'Cardiologista', 'doctor_3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `idServico` int(11) NOT NULL,
  `servico` varchar(70) DEFAULT NULL,
  `img` varchar(70) DEFAULT NULL,
  `descricao` text,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`idServico`, `servico`, `img`, `descricao`, `status`) VALUES
(1, 'Cardiologia', 'Design-sem-nome-1030x1030.png', 'Lhe forneceremos o melhor tratamento de cardiologia para si, cuide do seu coraÃ§Ã£o.', 1),
(2, 'Odontologia', 'jonathan-borba-Gt4CWOnHdEE-unsplash.jpg', 'Forneceremos para si um tratamento genial a sua saÃºde bocal, para ter um lindo sorriso.', 1),
(3, 'Neurologia', 'download.jfif', 'A tua saÃºde Ã© muito importante para nos, faÃ§a jÃ¡ a sua consulta de neurologia. ', 1),
(4, 'Ortopedia', '1523279299sem-t-tulo-1.jpg', 'Temos uma equipe mÃ©dica capacitados para cuidar de qualquer problema locomotor.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefone` varchar(80) DEFAULT NULL,
  `senha` varchar(120) DEFAULT NULL,
  `foto` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUser`, `nivel`, `nome`, `email`, `telefone`, `senha`, `foto`) VALUES
(1, 'admin', 'Paulo Sapalo', 'paulo@gmail.com', '923456578', '81dc9bdb52d04dc20036dbd8313ed055', '140726_baby.png'),
(2, 'cliente', 'Eduardo Soares', 'eduardo@gmail.com', '934 565 345', '827ccb0eea8a706c4c34a16891f84e7b', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `fk_consulta_servico1` (`servico_idServico`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`idServico`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_servico1` FOREIGN KEY (`servico_idServico`) REFERENCES `servico` (`idServico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
