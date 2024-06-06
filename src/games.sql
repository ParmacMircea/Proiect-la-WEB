-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: mysql_db
-- Timp de generare: iun. 03, 2024 la 05:51 PM
-- Versiune server: 8.3.0
-- Versiune PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `games`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `games`
--

CREATE TABLE `games` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `console` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `games`
--
ALTER TABLE `games`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
