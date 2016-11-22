-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2016 às 02:28
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `billings`
--

INSERT INTO `billings` (`id`, `name`) VALUES
(1, 'Crédito Visa(Máquina)'),
(2, 'Crédito MasterCard(Máquina)'),
(3, 'Débito Visa(Máquina)'),
(4, 'Débito ´MasterCard(Máquina)'),
(5, 'Ticket Restaurante'),
(6, 'Sodexo'),
(7, 'Dinheiro (Informar o Valor para Troco no campo de Observações)');

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
(1, 'Pizzas Doces'),
(2, 'Pizzas Salgadas'),
(3, 'Bebidas'),
(4, 'Lanches'),
(5, 'Sobremesas'),
(6, 'Esfihas'),
(7, 'Beirutes'),
(8, 'Porções'),
(9, 'Panquecas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
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
(1, '3.20', 1);

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
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postalcodes`
--

CREATE TABLE `postalcodes` (
  `id` int(11) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postalcodes`
--

INSERT INTO `postalcodes` (`id`, `cep`, `location`, `district`, `city`, `state`) VALUES
(1, '03822000', 'Rua Olavo Egídio de Souza Aranha', 'Parque Císper', 'São Paulo', 'SP'),
(2, '03817010', 'Rua Barra de Santa Rosa', 'Parque Císper', 'São Paulo', 'SP'),
(3, '03817000', 'Rua Caiçara do Rio do Vento', 'Parque Císper', 'São Paulo', 'SP'),
(4, '03817180', 'Rua Veríssimo', 'Parque Císper', 'São Paulo', 'SP'),
(5, '03823020', 'Rua Cisper', 'Vila Nova Teresa', 'São Paulo', 'SP'),
(6, '03823000', 'Rua Wenceslau Guimarães', 'Parque Císper', 'São Paulo', 'SP'),
(7, '03821060', 'Rua Senador Elói de Souza', 'Vila Sílvia', 'São Paulo', 'SP'),
(8, '03821010', 'Rua Nova Palmeira', 'Vila Sílvia', 'São Paulo', 'SP');

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
(1, 2, 'Pizza de Mussarela', 'Pizza sabor mussarela, com fatias de tomate, molho de tomate e azeitonas.', '30.00', 'img/products/22_11_16_02_02_21/mussarela.jpg', 99, 1),
(2, 2, 'Pizza de Carne Seca', 'Pizza sabor carne seca com catupiry.', '40.00', 'img/products/22_11_16_02_03_00/carne-seca.jpg', 99, 1),
(3, 2, 'Pizza de Calabresa', 'Pizza sabor calabresa em formato de rodelas, com molho de tomate e cebola fatiada.', '30.00', 'img/products/22_11_16_02_03_45/calabresa.jpg', 99, 1),
(4, 2, 'Pizza de Atum', 'Pizza sabor atum, com rodelas de cebola e azeitonas pretas.', '35.00', 'img/products/22_11_16_02_04_33/atum.jpg', 99, 1),
(5, 3, 'Refrigerante Coca Cola 2L', 'Refrigerante sabor coca.', '10.00', 'img/products/22_11_16_02_05_12/coca-cola-2l.jpg', 50, 1),
(6, 3, 'Refrigerante Coca Cola 300Ml', 'Refrigerante sabor coca.', '6.00', 'img/products/22_11_16_02_05_57/coca-cola-300ml.jpg', 60, 1),
(7, 3, 'Refrigerante Guaraná Antartcia 300Ml', 'Refrigerante sabor guaraná.', '6.00', 'img/products/22_11_16_02_06_32/guarana-antartica-300ml.jpg', 60, 1),
(8, 3, 'Refrigerante Fanta Laranja 300Ml', 'Refrigerante sabor laranja.', '6.00', 'img/products/22_11_16_02_06_57/fanta-laranja-300ml.jpg', 60, 1),
(9, 3, 'Refrigerante Soda Antartica 300Ml', 'Refrigerante sabor soda.', '6.00', 'img/products/22_11_16_02_07_53/soda-antartica.jpg', 60, 1),
(10, 3, 'Refrigerante Dolly Guaraná 2L', 'Refrigerante sabor guaraná.', '7.00', 'img/products/22_11_16_02_08_21/dolly-guarana-2l.jpg', 80, 1),
(11, 4, 'X Bacon', 'Hamburguer de 500mg, bacon, queijo, tomate, alfaçe, molho especial barbecue e pão de 200g.', '15.00', 'img/products/22_11_16_02_09_38/x-bacon.jpg', 60, 1),
(12, 4, 'X Salada', 'Hamburguer de 300mg, queijo, tomate, alfaçe, molho especial barbecue e pão de 200g.', '13.00', 'img/products/22_11_16_02_10_56/x-burguer.jpg', 90, 1),
(13, 1, 'Pizza de Banana', 'Pizza sabor banana com doce de leite.', '32.00', 'img/products/22_11_16_02_12_00/banana-chocolate.jpg', 99, 1),
(14, 1, 'Pizza de Brigadeiro', 'Pizza sabor chcolate confeitada com brigadeiro.', '32.00', 'img/products/22_11_16_02_12_27/brigadeiro.jpg', 99, 1),
(15, 1, 'Pizza de Doce de Leite', 'Pizza sabor doce de leite.', '32.00', 'img/products/22_11_16_02_13_05/doce-de-leite.jpg', 99, 1);

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
(1, 'Admin', 'Admin', 'admin@lapizza.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, '11951569500', 1);

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
-- Indexes for table `itens`
--
ALTER TABLE `itens`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
