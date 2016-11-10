-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2016 às 22:05
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapizza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `adjunct` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `postalcode` varchar(8) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `blank` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `url`, `link`, `blank`, `status`) VALUES
(1, 'Promoção', 'img/banners/06_11_16_22_25_23/1472582385458.jpg', '#', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `billings`
--

INSERT INTO `billings` (`id`, `name`) VALUES
(1, 'Crédito MasterCard'),
(2, 'Débito MasterCard'),
(3, 'Crédito Visa'),
(4, 'Débito Visa'),
(5, 'Vale Refeição Ticket'),
(6, 'Vale Refeição Sodexo'),
(8, 'Dinheiro (Especificar troco em OBSERVAÇÕES)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Pizzas Salgadas'),
(2, 'Pizzas Doces'),
(3, 'Bebidas'),
(4, 'Sobremesas'),
(5, 'Lanches');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensorder`
--

CREATE TABLE `itensorder` (
  `id_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `tax_vat` decimal(10,2) DEFAULT NULL,
  `store_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `options`
--

INSERT INTO `options` (`id`, `tax_vat`, `store_status`) VALUES
(1, '3.50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `subtotal_price` decimal(10,2) DEFAULT NULL,
  `tax_vat` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `name_user` varchar(45) DEFAULT NULL,
  `address_user` varchar(45) DEFAULT NULL,
  `number_user` varchar(45) DEFAULT NULL,
  `postal_code_user` varchar(45) DEFAULT NULL,
  `phone_user` varchar(45) DEFAULT NULL,
  `name_billing` varchar(45) DEFAULT NULL,
  `transshipment` decimal(10,2) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `Orderscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postalcodes`
--

CREATE TABLE `postalcodes` (
  `id` int(11) NOT NULL,
  `cep` int(8) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `id_categorie`, `name`, `description`, `price`, `image`, `quantity`, `status`) VALUES
(5, 2, 'Pizza de Brigadeiro', 'Tradicional brigadeiro e chocolate granulado.', '39.00', 'img/products/05_11_16_01_34_18/pizzasdoces_brigadeiro.jpg', 99, 1),
(6, 3, 'Refrigerante Coca Cola 300ml', 'Refrigerante sabor coca cola.', '6.00', 'img/products/05_11_16_01_34_57/imagens-imagens-coca-cola-14.jpg', 99, 1),
(7, 3, 'Refrigerante Guaraná 300ml', 'Refrigerante sabor guaraná.', '6.00', 'img/products/05_11_16_01_35_36/ANTARCTICA.jpg', 99, 1),
(8, 5, 'X Bacon', 'Hambúrguer, bacon, alface, tomate e pão com gergelim.', '11.00', 'img/products/05_11_16_01_37_34/baconcheeseburger1.jpg', 99, 1),
(9, 5, 'X Salada', 'Hambúrguer, alface, tomate e pão com gergelim.', '9.00', 'img/products/05_11_16_01_38_01/1366199720.jpg', 99, 1),
(10, 1, 'Pizza de Mussarela', 'Pizza sabor mussarela com molho de tomate e massa tradicional.', '36.00', 'img/products/05_11_16_01_41_01/pizzassalgadas_mussarela.jpg', 99, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `email`, `password`, `picture`, `type`, `phone`, `status`) VALUES
(1, 'Teste Testeiro', 'aaaaa', 'decol@aaa.com', 'asasasas', '', 0, '121212121', 1),
(2, 'Teste Testeiro', 'aaaaa', 'decol@aaa.com', 'asasasa', '', 0, '121212121', 1),
(3, NULL, NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', '', 0, NULL, 1),
(4, 'Teste Testeiro', 'aaaaa', 'decol@aaaaa.com', '444254a2c0e1ec18964f5c3ce6e943b4', '', 0, '121212121', 1),
(5, 'Rafael Souza Cruz', 'rafinha', 'rafinha@eniac.com', '1a36591bceec49c832079e270d7e8b73', '', 0, '11981212888', 1),
(6, 'akmkamakmakma', '111amkma', 'rafinha@eniac.com', '1a36591bceec49c832079e270d7e8b73', '', 0, '11', 1),
(7, 'Teste Testeiro', '111amkma', 'decol@decol.com.br', '77481bbe912034517015454048d36bdd', '', 0, '121212121', 1),
(8, 'Teste Testeiro', '1i29121', 'mamamia@gmail.com', '6d2d6549e89d80d5c91d517016be10fd', '', 0, '11919219291', 1),
(9, 'Teste Testeiro', 'aaaaa', 'decol@raiva.com.br', 'b994a9ac033191f40cde7355e9fc29f2', '', 0, '121212121', 1),
(10, 'Teste Testeiro 79', 'putinhas do noite 2', 'putinha@safadinha.com', '81359720173b495261df934ce2d0eaab', '', 0, '11969696969', 1),
(11, 'usercreate[name]', 'usercreate[user]', 'decol@saa.com', '42908c18c074d0f1977083a44341b1d7', '', 0, '1234567890', 1),
(12, 'akmkamakmakma', 'aaaa', 'decol@aaa.com.bri', '42908c18c074d0f1977083a44341b1d7', '', 0, '121212121', 1),
(13, 'Teste Testeiro', '111amkma', 'decolaa@skakak.com.br', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '1121212', 1),
(14, 'luan', 'luan', 'luan@werwr.com', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '1234566665', 1),
(15, 'André Romário Pereira', 'Administrador', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, '11951569506', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postalcodes`
--
ALTER TABLE `postalcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postalcodes`
--
ALTER TABLE `postalcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
