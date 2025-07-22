-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jul-2025 às 07:24
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consumiveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` int(50) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `data_registo` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `email`, `telefone`, `endereco`, `status`, `data_registo`) VALUES
(1, 'Carlos Junior', 'otaljuninho@gmail.com', 841234567, 'Mozal', 1, '0000-00-00 00:00:00'),
(2, 'Bonifácio Ambrósio', 'bonas@gmail.com', 847589629, 'Cidade da Matola', 1, '2025-07-12 00:00:00'),
(3, 'teste', 'teste@gmail.com', 845621476, 'Boane', 1, '0000-00-00 00:00:00'),
(4, 'Maria', 'mara@gmail.com', 845621476, 'Pessene', 1, '0000-00-00 00:00:00'),
(5, 'Zebedeu', 'zebas@gmail.com', 845621476, 'mahotas', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data` date DEFAULT NULL,
  `fornecedor` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_users`, `nome`, `descricao`, `data`, `fornecedor`, `quantidade`) VALUES
(1, NULL, 'tonnel', 'para impressora', NULL, NULL, NULL),
(2, NULL, 'Tonner', 'A vida', '2025-07-07', 'hp', NULL),
(3, NULL, 'Resma', 'Resma para impressoras', '2025-07-07', 'Dell', NULL),
(4, NULL, 'Laptop HP', 'i7, 11th, 512ssd, 16ram', '2025-07-08', 'HP', 3),
(8, NULL, 'Conectores', 'RJ45', '2025-07-15', '<br />\r\n<b>Warning</b>:  Undefined array key', 20),
(9, NULL, 'Mouses', 'Mouses para o departamento de informatica', '2025-07-21', '1', 5),
(10, NULL, '123', 'Para o Mec', '2025-07-21', '1', 5),
(11, NULL, 'Canetas', 'Canets Bic para o departamento de TIC\'s', '2025-07-21', '3', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes`
--

CREATE TABLE `requisicoes` (
  `id` int(11) NOT NULL,
  `nome_user` varchar(50) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `fornecedor` varchar(50) NOT NULL,
  `data_requisicao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `requisicoes`
--

INSERT INTO `requisicoes` (`id`, `nome_user`, `producto`, `quantidade`, `fornecedor`, `data_requisicao`) VALUES
(1, 'Carlos Júnior ', 'Tonner', 2, '2', '2025-07-15'),
(2, 'Carlos Júnior ', 'Tonner', 2, '2', '2025-07-15'),
(3, 'Carlos Júnior ', 'Resma', 2, '2', '2025-07-15'),
(4, 'Matsobas', 'Disco', 5, '1', '2025-07-15'),
(5, 'Aly Faque', 'Pao', 5, '2', '2025-07-15'),
(6, 'Matsobas', 'Disco', 5, '1', '2025-07-15'),
(7, 'Admin', 'Tonner', 5, '1', '2025-07-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `Username`, `Email`, `Password`, `tipo`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin123', 'Administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_users` (`id_users`);

--
-- Índices para tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `requisicoes`
--
ALTER TABLE `requisicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
