-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25-Maio-2024 às 16:31
-- Versão do servidor: 8.0.32
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int NOT NULL,
  `nome` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `servico` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_agendamento` enum('Recusado','Confirmado','Pendente','Encerrado') COLLATE utf8mb4_general_ci DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `nome`, `numero`, `servico`, `data`, `hora`, `email`, `status_agendamento`) VALUES
(3, 'Marcos', '13991234567', 'Corte de Cabelo', '2024-04-05', '15:30:00', 'marcos@hotmail.com', 'Encerrado'),
(4, 'Yasmin', '13997654321', 'Botox e corte de cabelo', '2024-04-25', '09:00:00', 'yasmin@gmail.com', 'Encerrado'),
(5, 'Fulano', '1399123456', 'Corte de Cabelo', '2024-04-28', '17:00:00', 'fulano@gmail.com', 'Recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `id` int NOT NULL,
  `nome_salao` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `nome_barbeiro` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varbinary(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `barbeiro`
--

INSERT INTO `barbeiro` (`id`, `nome_salao`, `email`, `nome_barbeiro`, `senha`) VALUES
(1, 'Barbearia', 'admin@admin', 'Admin', 0x3132333435363738);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
