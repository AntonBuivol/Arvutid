-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: d123170.mysql.zonevs.eu
-- Loomise aeg: Mai 06, 2024 kell 09:13 EL
-- Serveri versioon: 10.4.32-MariaDB-log
-- PHP versioon: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `d123170_andmebaas`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `arvutitellimused`
--

CREATE TABLE `arvutitellimused` (
  `id` int(11) NOT NULL,
  `kirjeldus` text DEFAULT ' ',
  `korpus` bit(1) DEFAULT NULL,
  `kuvar` bit(1) DEFAULT NULL,
  `pakitud` bit(1) DEFAULT b'0',
  `tellimusNR` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `arvutitellimused`
--

INSERT INTO `arvutitellimused` (`id`, `kirjeldus`, `korpus`, `kuvar`, `pakitud`, `tellimusNR`) VALUES
(143, 'Mul on vaja must kuvar.', b'0', b'1', b'0', NULL),
(144, 'Ma tahan valge korpus', b'1', b'0', b'0', NULL),
(145, 'Mul on vaja sinine korpus ja 4K kuvar!!!', b'1', b'1', b'0', NULL);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `arvutitellimused`
--
ALTER TABLE `arvutitellimused`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `arvutitellimused`
--
ALTER TABLE `arvutitellimused`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
