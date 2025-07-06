-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2025 at 01:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovdog`
--

-- --------------------------------------------------------

--
-- Table structure for table `chiens`
--

CREATE TABLE `chiens` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `race` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_ajout` datetime DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chiens`
--

INSERT INTO `chiens` (`id`, `nom`, `age`, `race`, `photo`, `date_ajout`, `etat`) VALUES
(1, 'Rex', 3, 'Papillon', 'Papillon-On-White-01.avif', '2025-07-04 23:33:20', 0),
(2, 'Bella', 2, 'Berger', 'Berger.webp', '2025-07-04 23:40:51', 1),
(3, 'Max', 4, 'Pitbull', 'Pitbull.webp', '2025-07-04 23:40:51', 1),
(4, 'Luna', 1, 'Labrador', 'labrador.jpg', '2025-07-04 23:40:51', 1),
(5, 'Rocky', 5, 'Berger', 'Rocky.jpeg', '2025-07-04 23:40:51', 1),
(6, 'Pixie', 2, 'Saluki', 'chien_68686943b03af1.87402168.jpg', '2025-07-05 01:52:35', 1),
(7, 'Bella', 5, 'Husky Sibérien', 'chien_68686ace742aa2.35516005.jpeg', '2025-07-05 01:59:10', 1),
(8, 'lascan', 1, 'Chihuahua', 'chien_6869290e569861.89152115.jpg', '2025-07-05 15:30:54', 1),
(9, 'Prisca', 4, 'Chihuahua', 'chien_686929ab46c7c6.13617687.jpg', '2025-07-05 15:33:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chiens`
--
ALTER TABLE `chiens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chiens`
--
ALTER TABLE `chiens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
