-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2025 a las 11:36:11
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
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `id` int(11) NOT NULL,
  `familia` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `ciclo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`id`, `familia`, `curso`, `ciclo`) VALUES
(4, 'Informatica', '1', 'smr1'),
(5, 'administracion', '1', 'Smr1'),
(6, 'DFG', 'fdsdf', 'ASFDAfds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nombrefc` varchar(100) NOT NULL,
  `cif` varchar(9) NOT NULL,
  `plazas` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `web` varchar(1000) NOT NULL,
  `Representante_dni` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nombrefc`, `cif`, `plazas`, `telefono`, `correo`, `web`, `Representante_dni`) VALUES
('fagsdfgsdfg', '45452452', 4, 252558, 'gh@jhbvbsafdssg', 'ssgddfdg', '541514jk'),
('motocrosscentere', 'B44216661', 3, 695874132, 'motocrosscentere@gmail.com', 'www.motocrosscenter.com', '25364893G'),
('motocrosscentere', 'B44216662', 3, 456456456, 'motocrosscenter@gmail.com', 'www.motocrosscenter.com', '798548486l');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`usuario`, `contraseña`, `id`) VALUES
('admin', '1234', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `nombre` varchar(45) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`nombre`, `dni`, `cargo`, `telefono`, `correo`) VALUES
('Vanesa', '12367890J', 'Alguien', 547291093, 'vanesa@gmail.com'),
('Martin', '25364893G', 'director', 666935432, 'martin@gmail.com'),
('dssgfasdg', '541514jk', 'assfafg', 245547, 'th@fdgsdhf'),
('Vanesa', '798548486l', 'Alguien', 4567813, 'vanesa1@gmail.com');

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
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cif`),
  ADD UNIQUE KEY `fk_representane_dni` (`Representante_dni`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_empresa_cif` (`empresa_cif`) USING BTREE;

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`dni`) USING BTREE,
  ADD KEY `fk_tutor_ciclo1_idx` (`ciclo_id`),
  ADD KEY `fk_empresa_cif` (`empresa_cif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`Representante_dni`) REFERENCES `representante` (`dni`);

--
-- Filtros para la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD CONSTRAINT `lugar_ibfk_1` FOREIGN KEY (`empresa_cif`) REFERENCES `empresa` (`cif`);

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
