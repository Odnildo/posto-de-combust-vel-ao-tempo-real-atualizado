-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jul-2024 às 18:35
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venda_de_carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(233) NOT NULL,
  `tipo` varchar(233) NOT NULL,
  `caminho` varchar(233) NOT NULL,
  `carro` varchar(233) NOT NULL,
  `preco` varchar(233) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `tipo`, `caminho`, `carro`, `preco`, `descricao`) VALUES
(1, 'IMG-20240708-WA0026.jpg', 'image/jpeg', '/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAA0JCgsKCA0LCgsODg0PEyAVExISEyccHhcgLikxMC4pLSwzOko+MzZGNywtQFdBRkxOUlNSMj5aYVpQYEpRUk//2wBDAQ4ODhMREyYVFSZPNS01T09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0//wgARCAJ0BLADASIAAhEBA', 'lambo', '12222', ' carro bonito e belo feio para o teu bolso e ainda tens o seguro'),
(3, 'pexels-mikebirdy-136872.jpg', 'image/jpeg', 'uploads/pexels-mikebirdy-136872.jpg', 'aa', '33333', ''),
(4, 'pexels-pixabay-164654.jpg', 'image/jpeg', 'uploads/pexels-pixabay-164654.jpg', 'ww', '555', ''),
(5, 'pexels-mikebirdy-116675.jpg', 'image/jpeg', 'img/pexels-mikebirdy-116675.jpg', 'mitsubichi', '1800', 'bom carro'),
(6, 'IMG-20240708-WA0027.jpg', 'image/jpeg', 'uploads/IMG-20240708-WA0027.jpg', 'mazda', '15800', 'bom carro e Ã©ficaz para a vida'),
(7, 'pexels-leonardo-luncasu-1230168729-23812850.jpg', 'image/jpeg', 'uploads/pexels-leonardo-luncasu-1230168729-23812850.jpg', 'urus', '122233', 'bom carro'),
(8, 'pexels-sebastianpichard-6894428.jpg', 'image/jpeg', 'uploads/pexels-sebastianpichard-6894428.jpg', 'Supra mk4', '123334', 'esportivo da toyota');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `carro` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id`, `pedido_id`, `carro`, `preco`) VALUES
(1, 1, 'Audi R8', '99999999.99'),
(2, 2, 'KIA Tellruning', '99999999.99'),
(4, 5, 'Audi R8', '99999999.99'),
(5, 6, 'Audi R8', '99999999.99'),
(6, 6, 'Lamborghini Urus 2', '99999999.99'),
(7, 7, 'Lamborghini Urus 2', '99999999.99'),
(8, 8, 'lambo', '12222.00'),
(9, 9, 'lambo', '12222.00'),
(10, 9, 'aa', '33333.00'),
(11, 10, 'Supra mk4', '123334.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `resposta` text,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `destinatario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `mensagem`, `resposta`, `criado_em`, `destinatario`) VALUES
(8, 'odmildo', 'ola', 'ola', '2024-07-22 15:46:20', 'admin'),
(9, 'mateus', 'tudo bem', 'ola', '2024-07-22 15:48:16', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `metodo_pagamento` enum('transferencia-bancaria','boleto') NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome`, `email`, `endereco`, `metodo_pagamento`, `total`, `criado_em`) VALUES
(1, 'ody', 'odmildox12@gmail.com', 'samba grand', 'transferencia-bancaria', '99999999.99', '2024-07-17 18:03:14'),
(2, 'mateus', 'odmildox12@gmail.com', 'sam ba', 'transferencia-bancaria', '99999999.99', '2024-07-17 18:11:27'),
(5, 'miro2', 'odmildox12@gmail.com', 'sam ba', 'transferencia-bancaria', '99999999.99', '2024-07-17 18:43:45'),
(6, 'jorge', 'jorge@gmail.com', 'Nova Vida', 'transferencia-bancaria', '99999999.99', '2024-07-17 23:09:33'),
(7, 'angolano', 'angola@gmail.com', 'morro bento', 'transferencia-bancaria', '99999999.99', '2024-07-20 13:44:55'),
(8, 'emerson', 'emerson@gmail.com', 'samba', 'transferencia-bancaria', '12222.00', '2024-07-22 12:34:00'),
(9, 'mateus', 'angola@gmail.com', 'sam ba', 'transferencia-bancaria', '45555.00', '2024-07-22 12:39:24'),
(10, 'hunday', 'angola@gmail.com', 'ilha de luanda', 'boleto', '123334.00', '2024-07-22 14:17:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `mensagem_id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `resposta` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(233) NOT NULL,
  `password` varchar(233) NOT NULL,
  `role` varchar(233) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `role`) VALUES
(1, 'jorge', '$2y$10$82Dj9OHUJjzC1gKi5vygKu6uYkaSGg0lgnzENWVKyPHZZ3zh/9nIe', 'admin'),
(2, 'marcos', '$2y$10$4KQctt8nZ0suQ6yb.LaWr.M2E0YtO3ZYgN7RwCdWazGzrZKxM3aYe', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mensagem_id` (`mensagem_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagens` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
