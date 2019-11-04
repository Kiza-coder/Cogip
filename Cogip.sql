-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Nov 03, 2019 at 06:59 PM
-- Server version: 10.4.2-MariaDB-1:10.4.2+maria~bionic
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cogip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `country` varchar(60) CHARACTER SET utf8 NOT NULL,
  `VAT` varchar(80) CHARACTER SET utf8 NOT NULL,
  `id_type_companies` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `country`, `VAT`, `id_type_companies`) VALUES
(1, 'belcacomm', 'begleu', 'hjguygf87', 1),
(2, 'kefk', 'Bresil', '56789okjb', 2),
(3, 'haribo', 'Danemark', '234rt', 1),
(4, 'Tefal', 'Pologne', '56789i', 2),
(5, 'dfghj', 'dfghg', 'dfgyuj', 1),
(6, 'hp', 'uk', '1234rty', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(80) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'ben', 'bou', 'benbou@jo.com'),
(2, 'Ben', 'kok', 'lla@lo.dl');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_companies`
--

CREATE TABLE `contacts_companies` (
  `id` int(11) NOT NULL,
  `id_contacts` int(5) NOT NULL,
  `id_companies` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `number` varchar(40) CHARACTER SET utf8 NOT NULL,
  `id_companies` int(5) NOT NULL,
  `id_contacts` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `number`, `id_companies`, `id_contacts`) VALUES
(1, '2019-10-29', '23456', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_companies` varchar(8) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_companies`) VALUES
(1, 'client'),
(2, 'provider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_compagny_type` (`id_type_companies`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_companies`
--
ALTER TABLE `contacts_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contactcompagny_compagny` (`id_companies`),
  ADD KEY `FK_contactcompagny_contacts` (`id_contacts`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_invoice_contact` (`id_contacts`),
  ADD KEY `FK_invoice_compagny` (`id_companies`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts_companies`
--
ALTER TABLE `contacts_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `FK_compagny_type` FOREIGN KEY (`id_type_companies`) REFERENCES `type` (`id`);

--
-- Constraints for table `contacts_companies`
--
ALTER TABLE `contacts_companies`
  ADD CONSTRAINT `FK_contactcompagny_compagny` FOREIGN KEY (`id_companies`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `FK_contactcompagny_contacts` FOREIGN KEY (`id_contacts`) REFERENCES `companies` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `FK_invoice_compagny` FOREIGN KEY (`id_companies`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `FK_invoice_contact` FOREIGN KEY (`id_contacts`) REFERENCES `contacts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
