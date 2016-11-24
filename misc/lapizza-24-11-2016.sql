-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Nov-2016 às 02:50
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
  `name_billing` varchar(255) DEFAULT NULL,
  `message` text,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `subtotal_price`, `tax_vat`, `total_price`, `date`, `name_user`, `address_user`, `number_user`, `postal_code_user`, `phone_user`, `name_billing`, `message`, `status`) VALUES
(1, 2, '38.00', '3.20', '41.20', '2016-11-24 01:16:26', 'André Romário', 'Rua Olavo Egídio de Souza Aranha', '1948 ', '03822000', '11219219998', 'Débito Visa(Máquina)', 'Blablabla', 'Em Preparo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
