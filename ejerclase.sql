-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2019 a las 10:18:32
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejerclase`
--
CREATE DATABASE IF NOT EXISTS `ejerclase` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `ejerclase`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
CREATE TABLE IF NOT EXISTS `encuesta` (
  `num_orden` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`num_orden`),
  UNIQUE KEY `num_orden` (`num_orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `encuesta`
--

TRUNCATE TABLE `encuesta`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habla`
--

DROP TABLE IF EXISTS `habla`;
CREATE TABLE IF NOT EXISTS `habla` (
  `num_orden` int(3) NOT NULL,
  `id_idioma` int(3) NOT NULL,
  PRIMARY KEY (`num_orden`,`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `habla`
--

TRUNCATE TABLE `habla`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE IF NOT EXISTS `idiomas` (
  `id_idioma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_idioma`),
  UNIQUE KEY `id_idioma` (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `idiomas`
--

TRUNCATE TABLE `idiomas`;
--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`) VALUES
(1, 'Castellano'),
(2, 'Inglés'),
(3, 'Francés'),
(4, 'Italiano'),
(5, 'Alemán'),
(6, 'Chino'),
(7, 'Polaco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajes`
--

DROP TABLE IF EXISTS `lenguajes`;
CREATE TABLE IF NOT EXISTS `lenguajes` (
  `id_lenguaje` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_lenguaje`),
  UNIQUE KEY `id_lenguaje` (`id_lenguaje`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `lenguajes`
--

TRUNCATE TABLE `lenguajes`;
--
-- Volcado de datos para la tabla `lenguajes`
--

INSERT INTO `lenguajes` (`id_lenguaje`, `nombre`) VALUES
(1, 'Java'),
(2, 'Php'),
(3, 'C++'),
(4, 'Javascript'),
(5, 'Angular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

DROP TABLE IF EXISTS `programa`;
CREATE TABLE IF NOT EXISTS `programa` (
  `num_orden` int(3) NOT NULL,
  `id_lenguaje` int(3) NOT NULL,
  PRIMARY KEY (`num_orden`,`id_lenguaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `programa`
--

TRUNCATE TABLE `programa`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
