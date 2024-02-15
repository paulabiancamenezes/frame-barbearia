-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/02/2024 às 20:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `numero` varchar(14) NOT NULL,
  `servico` varchar(50) DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `status_agendamento` enum('Recusado','Confirmado','Pendente','Encerrado') DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `nome`, `numero`, `servico`, `data`, `hora`, `email`, `status_agendamento`) VALUES
(1, 'RYAN SANTOS NUNES DE MATTOS', '13997244730', 'Corte de Cabelo', '2024-02-17', '15:30:00', 'ryan.legend66@gmail.', 'Encerrado'),
(2, 'Paula Bianca Menezes dos Santos', '13996051094', 'Progressiva', '2024-03-01', '15:30:00', 'manitinhu@gmail.com', 'Encerrado'),
(3, 'Júlia ', '1399605486', 'Progressiva', '2024-02-22', '15:30:00', 'julia@gmail.com', 'Encerrado'),
(4, 'Nayara', '13996051094', 'Manicure', '2024-02-26', '08:00:00', 'nayara@gmail.com', 'Recusado'),
(5, 'Nikolah More', '13996051094', 'Corte de Cabelo', '2024-03-02', '13:00:00', 'nikolah@gmail.com', 'Recusado'),
(6, 'Lucineia', '13996051094', 'Manicure', '2024-02-05', '12:00:00', 'neialinda@gmail.com', 'Encerrado'),
(7, 'Marcio Souza', '13996051094', 'Corte de Cabelo', '2024-12-01', '11:50:00', 'marcio@gmail.com', 'Confirmado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `id` int(11) NOT NULL,
  `nome_salao` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `nome_barbeiro` varchar(60) NOT NULL,
  `senha` varbinary(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `barbeiro`
--

INSERT INTO `barbeiro` (`id`, `nome_salao`, `email`, `nome_barbeiro`, `senha`) VALUES
(1, 'BarbeariaWs', 'barbearia@gmail.com', 'Paula Bianca', 0x672e632e6620696e20746f6b796f),
(2, 'barbearia Gaivota', 'barba@gmail.com', 'Barbearia Gaivota', 0x3132333435363738),
(3, 'Manicure', 'manicure@gmail.com', 'Roberta', 0x313233343536373839),
(4, 'Barbaiii', 'barba@barba', 'Paulo', 0x313233343536373839);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
