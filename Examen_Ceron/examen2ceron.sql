-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2020 a las 04:27:30
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen2ceron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_modulo`
--

CREATE TABLE `rol_modulo` (
  `COD_ROL` varchar(5) NOT NULL,
  `COD_MODULO` varchar(16) NOT NULL COMMENT 'C?digo identificador del m?dulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_modulo`
--

INSERT INTO `rol_modulo` (`COD_ROL`, `COD_MODULO`) VALUES
('1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_funcionalidad`
--

CREATE TABLE `seg_funcionalidad` (
  `COD_FUNCIONALIDAD` int(11) NOT NULL COMMENT 'C?digo identificador de la funcionalidad autonum?rico.',
  `COD_MODULO` varchar(16) NOT NULL COMMENT 'C?digo identificador del m?dulo al que pertenece la funcionalidad.',
  `URL_PRINCIPAL` varchar(200) NOT NULL COMMENT 'Especifica URL principal de la funcionalidad.',
  `NOMBRE` varchar(200) NOT NULL COMMENT 'Nombre Descriptivo de la funcionalidad.',
  `DESCRIPCION` varchar(500) DEFAULT NULL COMMENT 'Breve explicaci?n sobre la funcionalidad.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Almacena todas las funcionalidades del sistema. Una funciona';

--
-- Volcado de datos para la tabla `seg_funcionalidad`
--

INSERT INTO `seg_funcionalidad` (`COD_FUNCIONALIDAD`, `COD_MODULO`, `URL_PRINCIPAL`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, '1', 'www.seguridad.com', 'SEGURIDAD', 'Seguridad en el sistema'),
(2, '2', 'www.google.com', 'WEB', 'Sitio Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_modulo`
--

CREATE TABLE `seg_modulo` (
  `COD_MODULO` varchar(16) NOT NULL COMMENT 'C?digo identificador del m?dulo',
  `NOMBRE` varchar(50) NOT NULL COMMENT 'Nombre del m?dulo',
  `ESTADO` varchar(3) NOT NULL DEFAULT 'ACT' COMMENT 'Estado del m?dulo; especifica la habilitaci?n de uso.\r\n            ACT Activo\r\n            INA Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Contiene los diferentes m?dulos del sistema.';

--
-- Volcado de datos para la tabla `seg_modulo`
--

INSERT INTO `seg_modulo` (`COD_MODULO`, `NOMBRE`, `ESTADO`) VALUES
('1', 'Conta', 'INA'),
('2', 'Web', 'ACT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seg_rol`
--

CREATE TABLE `seg_rol` (
  `COD_ROL` varchar(5) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seg_rol`
--

INSERT INTO `seg_rol` (`COD_ROL`, `NOMBRE`) VALUES
('1', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol_modulo`
--
ALTER TABLE `rol_modulo`
  ADD PRIMARY KEY (`COD_ROL`,`COD_MODULO`),
  ADD KEY `FK_REFERENCE_3` (`COD_MODULO`);

--
-- Indices de la tabla `seg_funcionalidad`
--
ALTER TABLE `seg_funcionalidad`
  ADD PRIMARY KEY (`COD_FUNCIONALIDAD`),
  ADD KEY `FK_FUNCIONALIDAD_A_MODULO` (`COD_MODULO`);

--
-- Indices de la tabla `seg_modulo`
--
ALTER TABLE `seg_modulo`
  ADD PRIMARY KEY (`COD_MODULO`);

--
-- Indices de la tabla `seg_rol`
--
ALTER TABLE `seg_rol`
  ADD PRIMARY KEY (`COD_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `seg_funcionalidad`
--
ALTER TABLE `seg_funcionalidad`
  MODIFY `COD_FUNCIONALIDAD` int(11) NOT NULL AUTO_INCREMENT COMMENT 'C?digo identificador de la funcionalidad autonum?rico.', AUTO_INCREMENT=125;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rol_modulo`
--
ALTER TABLE `rol_modulo`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`COD_MODULO`) REFERENCES `seg_modulo` (`COD_MODULO`),
  ADD CONSTRAINT `FK_ROLMOD_A_ROL` FOREIGN KEY (`COD_ROL`) REFERENCES `seg_rol` (`COD_ROL`);

--
-- Filtros para la tabla `seg_funcionalidad`
--
ALTER TABLE `seg_funcionalidad`
  ADD CONSTRAINT `FK_FUNCIONALIDAD_A_MODULO` FOREIGN KEY (`COD_MODULO`) REFERENCES `seg_modulo` (`COD_MODULO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
