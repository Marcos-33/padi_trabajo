-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2025 a las 10:12:40
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
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `ciclo_id` int(11) NOT NULL,
  `empresa_cif` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`nombre`, `apellidos`, `dni`, `puesto`, `correo`, `telefono`, `ciclo_id`, `empresa_cif`) VALUES
('Pedro', 'Garcia', '12523674D', 'jefe de equipo', 'pedro@gmail.com', 654789521, 4, 'B44216661'),
('fghfghgfh', 'fgghfgghfggh', '422552752', 'fghgfghgfh', 'asdgffdsdfdsf@gmail.com', 45575575, 4, 'B44216661'),
('fghfghgfh', 'fgghfgghfggh', '789456125p', 'fghgfghgfh', 'asdgffdsdfsdsf@gmail.com', 45575575, 4, 'B44216662'),
('sdASD', 'sdASD', 'safaSF', 'SADsddSF', 'fgdgh@dsgfa', 2147483647, 5, '45452452');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`dni`) USING BTREE,
  ADD KEY `fk_tutor_ciclo1_idx` (`ciclo_id`),
  ADD KEY `fk_empresa_cif` (`empresa_cif`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`empresa_cif`) REFERENCES `empresa` (`cif`),
  ADD CONSTRAINT `tutor_ibfk_2` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
