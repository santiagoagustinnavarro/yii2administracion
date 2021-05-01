-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2021 a las 22:57:31
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminmardones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `movimiento_tipo_id` bigint(2) NOT NULL,
  `razon_social_id` bigint(15) NOT NULL,
  `fecha` date NOT NULL,
  `movimiento_concepto_id` int(11) NOT NULL,
  `importe` double NOT NULL,
  `iva` double NOT NULL,
  `percepcion_id` int(11) NOT NULL,
  `percepcion_monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `movimiento_tipo_id`, `razon_social_id`, `fecha`, `movimiento_concepto_id`, `importe`, `iva`, `percepcion_id`, `percepcion_monto`) VALUES
(1, 2, 1, '2021-04-20', 5, 1500, 0, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_concepto`
--

CREATE TABLE `movimiento_concepto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento_concepto`
--

INSERT INTO `movimiento_concepto` (`id`, `nombre`) VALUES
(1, 'nafta'),
(2, 'gasolina'),
(3, 'mantenimiento'),
(4, 'Cortadora de cesped'),
(5, 'Viandas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_percepcion`
--

CREATE TABLE `movimiento_percepcion` (
  `id` int(11) NOT NULL,
  `provincia` text NOT NULL,
  `iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento_percepcion`
--

INSERT INTO `movimiento_percepcion` (`id`, `provincia`, `iva`) VALUES
(1, 'neuquen', 2.5),
(2, 'rio negro', 5),
(3, 'sin definir', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_tipo`
--

CREATE TABLE `movimiento_tipo` (
  `id` bigint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento_tipo`
--

INSERT INTO `movimiento_tipo` (`id`, `nombre`) VALUES
(1, 'entrada'),
(2, 'salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_social`
--

CREATE TABLE `razon_social` (
  `id` bigint(3) NOT NULL,
  `cuit` varchar(20) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `razon_social`
--

INSERT INTO `razon_social` (`id`, `cuit`, `nombre`) VALUES
(1, '20-93633155-7', 'Cristian  Mardones');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `precepcion_id` (`percepcion_id`),
  ADD KEY `concepto_id` (`movimiento_concepto_id`),
  ADD KEY `movimiento_tipo_id` (`movimiento_tipo_id`),
  ADD KEY `razon_social` (`razon_social_id`);

--
-- Indices de la tabla `movimiento_concepto`
--
ALTER TABLE `movimiento_concepto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_percepcion`
--
ALTER TABLE `movimiento_percepcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_tipo`
--
ALTER TABLE `movimiento_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `razon_social`
--
ALTER TABLE `razon_social`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuit` (`cuit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimiento_concepto`
--
ALTER TABLE `movimiento_concepto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimiento_percepcion`
--
ALTER TABLE `movimiento_percepcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movimiento_tipo`
--
ALTER TABLE `movimiento_tipo`
  MODIFY `id` bigint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `razon_social`
--
ALTER TABLE `razon_social`
  MODIFY `id` bigint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`percepcion_id`) REFERENCES `movimiento_percepcion` (`id`),
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`movimiento_concepto_id`) REFERENCES `movimiento_concepto` (`id`),
  ADD CONSTRAINT `movimiento_ibfk_3` FOREIGN KEY (`movimiento_tipo_id`) REFERENCES `movimiento_tipo` (`id`),
  ADD CONSTRAINT `movimiento_ibfk_4` FOREIGN KEY (`razon_social_id`) REFERENCES `razon_social` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
