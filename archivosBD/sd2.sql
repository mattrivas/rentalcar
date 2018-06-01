-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2018 at 11:29 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1-log
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencia`
--

CREATE TABLE `agencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) NOT NULL DEFAULT 'General Pico',
  `provincia` varchar(100) NOT NULL DEFAULT 'La Pampa',
  `pais` varchar(100) NOT NULL DEFAULT 'Argentina'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agencia`
--

INSERT INTO `agencia` (`id`, `nombre`, `ciudad`, `provincia`, `pais`) VALUES
(1, 'Agencia 1', 'General Pico', 'La Pampa', 'Argentina'),
(2, 'Agencia 2', 'General Pico', 'La Pampa', 'Argentina'),
(3, 'Agencia 3', 'General Pico', 'La Pampa', 'Argentina'),
(4, 'Agencia 4', 'General Pico', 'La Pampa', 'Argentina'),
(5, 'Agencia 5', 'General Pico', 'La Pampa', 'Argentina'),
(6, 'Agencia 6', 'General Pico', 'La Pampa', 'Argentina');

-- --------------------------------------------------------

--
-- Table structure for table `aseguradora`
--

CREATE TABLE `aseguradora` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aseguradora`
--

INSERT INTO `aseguradora` (`id`, `nombre`) VALUES
(1, 'Aseguradora 1'),
(2, 'Aseguradora 2'),
(3, 'Aseguradora 3'),
(4, 'Aseguradora 4'),
(5, 'Aseguradora 5'),
(6, 'Aseguradora 6');

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `puertas` int(1) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_hasta` date NOT NULL,
  `cobertura_id` int(11) NOT NULL,
  `cobertura_aseguradora_id` int(11) NOT NULL,
  `agencia_id` int(11) NOT NULL,
  `patente` varchar(8) NOT NULL,
  `fecha_desde` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id`, `nombre`, `descripcion`, `puertas`, `marca_id`, `categoria_id`, `precio`, `fecha_hasta`, `cobertura_id`, `cobertura_aseguradora_id`, `agencia_id`, `patente`, `fecha_desde`) VALUES
(21, 'Matias', 'dasd', 1, 3, 15, 12321, '2018-05-01', 11, 2, 5, 'AB123AB', '2017-01-01'),
(22, 'Auto ', 'Sin descripcion ', 1, 7, 23, 5308, '2018-05-30', 2, 4, 6, 'TU9PQ', '2017-01-01'),
(34, 'Auto ', 'Sin descripcion ', 1, 11, 18, 5743, '2018-05-30', 1, 2, 2, 'LM234DE', '2017-01-01'),
(35, 'Auto ', 'Sin descripcion ', 4, 6, 24, 12256, '2018-05-30', 3, 4, 5, 'IJ012GH', '2017-01-01'),
(36, 'Auto ', 'Sin descripcion ', 1, 3, 8, 6814, '2018-05-30', 4, 4, 6, 'GH234NO', '2017-01-01'),
(44, 'Auto ', 'Sin descripcion ', 1, 3, 16, 16992, '2018-05-30', 5, 5, 2, 'WX678TU', '2017-01-01'),
(47, 'Auto ', 'Sin descripcion ', 2, 11, 6, 15147, '2018-05-30', 3, 4, 1, 'FG678KL', '2017-01-01'),
(52, 'Auto ', 'Sin descripcion ', 2, 10, 6, 16860, '2018-05-30', 6, 4, 2, 'MN456VW', '2017-01-01'),
(54, 'Auto ', 'Sin descripcion ', 2, 8, 2, 10568, '2018-05-30', 4, 4, 4, 'AB234HI', '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Microcoche'),
(2, 'Automóviles compactos'),
(3, 'Automóvil ultracompacto'),
(4, 'Segmento A'),
(5, 'Segmento B'),
(6, 'Automóvil familiar'),
(7, 'Segmento C'),
(8, 'Segmento D'),
(9, 'Berlinas / Sedanes'),
(10, 'Segmento D'),
(11, 'Bólidos muscle'),
(12, 'Crossover'),
(13, 'Monovolúmenes'),
(14, 'Vehículo de lujo'),
(15, 'Ejecutivo compacto'),
(16, 'Ejecutivo/Segmento E'),
(17, 'Segmento F'),
(18, 'Familiar'),
(19, 'Automóvil deportivo'),
(20, 'Compacto deportivo'),
(21, 'Berlina/sedán deportivo'),
(22, 'Deportivo'),
(23, 'Gran turismo'),
(24, 'Superdeportivo');

-- --------------------------------------------------------

--
-- Table structure for table `cobertura`
--

CREATE TABLE `cobertura` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `multprecio` float NOT NULL,
  `aseguradora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cobertura`
--

INSERT INTO `cobertura` (`id`, `titulo`, `multprecio`, `aseguradora_id`) VALUES
(1, 'Cobertura 1', 0.17, 2),
(2, 'Cobertura 1', 0.95, 4),
(3, 'Cobertura 1', 0.59, 4),
(4, 'Cobertura 1', 0.6, 4),
(5, 'Cobertura 1', 0.1, 5),
(6, 'Cobertura 1', 0.34, 4),
(7, 'Cobertura 1', 0.46, 6),
(8, 'Cobertura 1', 0.62, 5),
(9, 'Cobertura 1', 0.65, 2),
(10, 'Cobertura 1', 0.68, 1),
(11, 'Cobertura 1', 0.05, 2),
(13, 'Nueva', 0.6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Adelmo'),
(2, 'ASA'),
(3, 'De Carlo'),
(4, 'Feresa'),
(5, 'Koller'),
(6, 'Oliva'),
(7, 'Abarth'),
(8, 'Alfa Romeo'),
(9, 'DR Motor Company '),
(10, 'Ferrari'),
(11, 'Fiat'),
(12, 'Lamborghini');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `auto_marca_id` int(11) NOT NULL,
  `auto_categoria_id` int(11) NOT NULL,
  `auto_cobertura_id` int(11) NOT NULL,
  `auto_cobertura_aseguradora_id` int(11) NOT NULL,
  `auto_agencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aseguradora`
--
ALTER TABLE `aseguradora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`,`marca_id`,`categoria_id`,`cobertura_id`,`cobertura_aseguradora_id`,`agencia_id`),
  ADD KEY `fk_auto_marca_idx` (`marca_id`),
  ADD KEY `fk_auto_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_auto_cobertura1_idx` (`cobertura_id`,`cobertura_aseguradora_id`),
  ADD KEY `fk_auto_agencia1_idx` (`agencia_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobertura`
--
ALTER TABLE `cobertura`
  ADD PRIMARY KEY (`id`,`aseguradora_id`),
  ADD KEY `fk_cobertura_aseguradora1_idx` (`aseguradora_id`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`,`auto_id`,`auto_marca_id`,`auto_categoria_id`,`auto_cobertura_id`,`auto_cobertura_aseguradora_id`,`auto_agencia_id`),
  ADD KEY `fk_reserva_auto1_idx` (`auto_id`,`auto_marca_id`,`auto_categoria_id`,`auto_cobertura_id`,`auto_cobertura_aseguradora_id`,`auto_agencia_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `aseguradora`
--
ALTER TABLE `aseguradora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `cobertura`
--
ALTER TABLE `cobertura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `fk_auto_agencia1` FOREIGN KEY (`agencia_id`) REFERENCES `agencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auto_cobertura1` FOREIGN KEY (`cobertura_id`,`cobertura_aseguradora_id`) REFERENCES `cobertura` (`id`, `aseguradora_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_auto_marca` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cobertura`
--
ALTER TABLE `cobertura`
  ADD CONSTRAINT `fk_cobertura_aseguradora1` FOREIGN KEY (`aseguradora_id`) REFERENCES `aseguradora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_auto1` FOREIGN KEY (`auto_id`,`auto_marca_id`,`auto_categoria_id`,`auto_cobertura_id`,`auto_cobertura_aseguradora_id`,`auto_agencia_id`) REFERENCES `auto` (`id`, `marca_id`, `categoria_id`, `cobertura_id`, `cobertura_aseguradora_id`, `agencia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
