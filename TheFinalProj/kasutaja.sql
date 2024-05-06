-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: d123170.mysql.zonevs.eu
-- Loomise aeg: Mai 06, 2024 kell 11:34 EL
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
-- Tabeli struktuur tabelile `kasutaja`
--

CREATE TABLE `kasutaja` (
  `id` int(11) NOT NULL,
  `kasutaja` varchar(30) DEFAULT NULL,
  `parool` varchar(100) DEFAULT NULL,
  `onAdmin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `kasutaja`
--

INSERT INTO `kasutaja` (`id`, `kasutaja`, `parool`, `onAdmin`) VALUES
(1, 'admin', 'su6FF4/MgjUAk', 1),
(21, 'asd', 'supw0suH3wXL2', 0),
(22, 'admin', 'su6FF4/MgjUAk', 0);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `kasutaja`
--
ALTER TABLE `kasutaja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `kasutaja`
--
ALTER TABLE `kasutaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
