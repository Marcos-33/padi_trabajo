-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2025 a las 10:12:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id` int(11) NOT NULL,
  `Comunidad` varchar(50) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `Codigo_postal` int(11) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `empresa_cif` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `Comunidad`, `Localidad`, `provincia`, `Codigo_postal`, `direccion`, `empresa_cif`) VALUES
(11, 'Aragón', 'Alcañiz', 'Teruel', 44600, 'POLIGONO INDUSTRIAL LA ESTACION, NAV 4, 44600', 'B44216661'),
(12, 'Cataluña', 'Reus', 'Tarragona', 43200, 'Avenida bartolome esteban', 'B44216661'),
(13, 'Cataluña', 'Reus', 'Tarragona', 43200, 'Avenida bartolome esteban', 'B44216662'),
(14, 'sfddgv afsg', 'ssdgasf', 'DFAS', 5653, 'FGADFGGDDHG', '45452452');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_empresa_cif` (`empresa_cif`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD CONSTRAINT `lugar_ibfk_1` FOREIGN KEY (`empresa_cif`) REFERENCES `empresa` (`cif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
