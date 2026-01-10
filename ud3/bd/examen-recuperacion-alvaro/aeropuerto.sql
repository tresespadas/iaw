-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2026 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aeropuerto`
--

-- --------------------------------------------------------

--
-- Table structure for table `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `codigo_vuelo` varchar(10) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `aerolinea` varchar(50) NOT NULL,
  `puerta` varchar(5) NOT NULL,
  `hora_salida` time NOT NULL,
  `retraso` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vuelos`
--

INSERT INTO `vuelos` (`id`, `codigo_vuelo`, `destino`, `aerolinea`, `puerta`, `hora_salida`, `retraso`, `estado`) VALUES
(1, 'COD1234', 'Lugo', 'IBERIA', '13', '09:55:00', 3, 'retrasado'),
(2, 'COD5678', 'Málaga', 'EMIRATES', '1', '22:22:00', 0, 'a_tiempo'),
(3, 'COD1357', 'Lugo', 'SOUTHERN CHINA', '55', '13:28:00', 90, 'cancelado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
