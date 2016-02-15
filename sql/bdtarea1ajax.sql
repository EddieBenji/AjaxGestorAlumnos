-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2016 a las 04:27:41
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdtarea1ajax`
--
CREATE DATABASE IF NOT EXISTS `bdtarea1ajax` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdtarea1ajax`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aPaterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aMaterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fNacimiendo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fIngreso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `aPaterno`, `aMaterno`, `fNacimiendo`, `fIngreso`, `genero`, `correo`, `carrera`) VALUES
('0987654321', 'Lopez', 'Castillo', '1985-03-02', '1995-03-04', 'mujer', 'romaria@gmail.com', 'LIC'),
('12216320', 'Sumarraga', 'Ugalde', '1993-11-03', '2000-01-01', 'hombre', 'alex@gmail.com', 'LIS'),
('13579', 'Canche', 'Vazquez', '1979-11-30', '2002-07-06', 'hombre', 'canche@hotmail.com', 'LCC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE IF NOT EXISTS `tutores` (
  `claveTutor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aPaterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aMaterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `area` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`claveTutor`, `aPaterno`, `aMaterno`, `genero`, `area`, `correo`) VALUES
('123678', 'Bellido', 'Ugalde', 'Hombre', 'LCC', 'bellido@gmail.com'),
('321654', 'Sosa', 'Baeza', 'Mujer', 'LIS', 'sosa@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('admin', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
 ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
 ADD PRIMARY KEY (`claveTutor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
