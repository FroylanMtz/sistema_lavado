-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2018 at 04:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_lavado`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `admin_id` int(11) NOT NULL,
  `nombreAdmin` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_bin NOT NULL,
  `foto` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `nombreCliente` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_bin NOT NULL,
  `calle` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `colonia` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cupones`
--

CREATE TABLE `cupones` (
 `cupon_id` varchar(7) COLLATE utf8_bin NOT NULL,
 `password` varchar(255) COLLATE utf8_bin NOT NULL,
 `cliente_id` int(11) NOT NULL,
 `premio_id` int(11) NOT NULL,
 `expiracion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `horario_id` int(11) NOT NULL,
  `horario` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `premios`
--

CREATE TABLE `premios` (
  `premio_id` int(11) NOT NULL,
  `nombrePremio` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL,
  `visitasRequeridas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `promociones`
--

CREATE TABLE `promociones` (
  `promocion_id` int(11) NOT NULL,
  `nombrePromocion` varchar(255) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE `visitas` (
  `visita_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cupon_id` varchar(7) COLLATE utf8_bin NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indexes for table `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`cupon_id`),
  ADD KEY `cupones_ibfk_1` (`cliente_id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`horario_id`);

--
-- Indexes for table `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`premio_id`);

--
-- Indexes for table `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`promocion_id`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`visita_id`),
  ADD KEY `visitas_ibfk_1` (`cupon_id`);

ADD PRIMARY KEY (`visita_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premios`
--
ALTER TABLE `premios`
  MODIFY `premio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promociones`
--
ALTER TABLE `promociones`
  MODIFY `promocion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `visita_id` int(11) NOT NULL AUTO_INCREMENT;


---- AUTO_INCREMENT for table `clientes`
ALTER TABLE `clientes`
MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT;


-- Constraints for dumped tables
--

--
-- Constraints for table `cupones`
--
ALTER TABLE `cupones`
  ADD CONSTRAINT `cupones_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE CASCADE;

ALTER TABLE `cupones`
  ADD CONSTRAINT `cupones_ibfk_2` FOREIGN KEY (`premio_id`) REFERENCES `premios` (`premio_id`) ON DELETE CASCADE;
--
-- Constraints for table `visitas`
--
 ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`cupon_id`) REFERENCES `cupones` (`cupon_id`) ON DELETE CASCADE;
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
