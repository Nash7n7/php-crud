-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-09-2020 a las 19:21:25
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: agenda
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla actividad
--

DROP TABLE IF EXISTS actividad;
CREATE TABLE IF NOT EXISTS actividad (
  id_actividad int(4) NOT NULL AUTO_INCREMENT,
  nombre varchar(80) NOT NULL,
  descripcion text DEFAULT NULL,
  create_at timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id_actividad)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla actividad
--

INSERT INTO actividad (id_actividad, nombre, descripcion, create_at) VALUES
(1, 'Actividad 1', 'Descripción de Actividad', '2020-09-09 05:00:00'),
(2, 'Actividad 2', 'Descripción de Actividad 2', '2020-09-09 19:16:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
