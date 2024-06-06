-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: mysql_db
-- Timp de generare: iun. 03, 2024 la 07:18 AM
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
-- Bază de date: `Login`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Login`
--

CREATE TABLE `Login` (
  `id` int NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_key` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `Login`
--

INSERT INTO `Login` (`id`, `nume`, `email`, `parola`, `token`, `token_key`, `role`) VALUES
(1, 'Mircea Parmac', 'mircea.parmac@gmail.com', '1234POPKmmnRPG', NULL, NULL, 'admin');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`,`token_key`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `Login`
--
ALTER TABLE `Login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
