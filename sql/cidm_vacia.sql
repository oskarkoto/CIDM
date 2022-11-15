-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2022 a las 20:34:08
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cidm`
--
CREATE DATABASE IF NOT EXISTS `cidm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cidm`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionactual`
--

CREATE TABLE `condicionactual` (
  `idCondicionActual` int(11) NOT NULL,
  `descripcionCondicionActual` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condicionactual`
--

INSERT INTO `condicionactual` (`idCondicionActual`, `descripcionCondicionActual`) VALUES
(1, 'Buen estado'),
(2, 'Daños reparables.'),
(3, 'Irreparable'),
(4, 'Gasto de Uso'),
(5, 'Perdido'),
(6, 'Robado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `fechaRealDevolucion` date DEFAULT current_timestamp(),
  `idEstadoDevolucionGeneral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `idDispositivo` varchar(25) NOT NULL,
  `idTipoDispositivo` varchar(25) NOT NULL,
  `idCondicionActual` int(11) NOT NULL,
  `idEstadoInventario` int(11) NOT NULL,
  `fechaInclusion` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodevolucion`
--

CREATE TABLE `estadodevolucion` (
  `idEstadoDevolucion` int(11) NOT NULL,
  `descripcionEstadoDevolucion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadodevolucion`
--

INSERT INTO `estadodevolucion` (`idEstadoDevolucion`, `descripcionEstadoDevolucion`) VALUES
(1, 'Buen estado'),
(2, 'Daños reparables'),
(3, 'Irreparable'),
(4, 'Gasto de uso'),
(5, 'Perdido'),
(6, 'Robado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadodevoluciongeneral`
--

CREATE TABLE `estadodevoluciongeneral` (
  `idEstadoDevolucionGeneral` int(11) NOT NULL,
  `descripcionEstadoDevolucionGeneral` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadodevoluciongeneral`
--

INSERT INTO `estadodevoluciongeneral` (`idEstadoDevolucionGeneral`, `descripcionEstadoDevolucionGeneral`) VALUES
(1, 'Buen estado'),
(2, 'Daños reparables'),
(3, 'Irreparable'),
(4, 'Gasto de uso'),
(5, 'Perdido'),
(6, 'Robado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoinventario`
--

CREATE TABLE `estadoinventario` (
  `idEstadoInventario` int(11) NOT NULL,
  `descripcionEstadoInventario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadoinventario`
--

INSERT INTO `estadoinventario` (`idEstadoInventario`, `descripcionEstadoInventario`) VALUES
(1, 'Inventario'),
(2, 'Prestado'),
(3, 'Dañado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingeniero`
--

CREATE TABLE `ingeniero` (
  `idIngeniero` varchar(25) NOT NULL,
  `primerNombre` varchar(50) NOT NULL,
  `segundoNombre` varchar(50) DEFAULT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `correoElectronico` varchar(50) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `fechaInclusion` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `idIngeniero` varchar(25) NOT NULL,
  `fechaPrestamo` date DEFAULT current_timestamp(),
  `fechaEsperadaDevolucion` date DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamodispositivo`
--

CREATE TABLE `prestamodispositivo` (
  `idPrestamoDispositivo` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `idDispositivo` varchar(25) NOT NULL,
  `idEstadoDevolucion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `prestamodispositivo`
--
DELIMITER $$
CREATE TRIGGER `cambiarestadodispositivo` AFTER INSERT ON `prestamodispositivo` FOR EACH ROW UPDATE dispositivo SET idEstadoInventario = 2 WHERE idDispositivo = NEW.idDispositivo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `devolverestadodispositivo` AFTER DELETE ON `prestamodispositivo` FOR EACH ROW UPDATE dispositivo SET idEstadoInventario = 1 WHERE idDispositivo = prestamodispositivo.idDispositivo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `tituloReporte` varchar(50) DEFAULT NULL,
  `idTipoReporte` int(11) NOT NULL,
  `fechaReporte` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodispositivo`
--

CREATE TABLE `tipodispositivo` (
  `idTipoDispositivo` varchar(25) NOT NULL,
  `nombreTipoDispositivo` varchar(50) NOT NULL,
  `descripcionTipoDispositivo` varchar(100) DEFAULT NULL,
  `marcaTipoDispositivo` varchar(50) DEFAULT NULL,
  `existenciaMinima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeporte`
--

CREATE TABLE `tiporeporte` (
  `idTipoReporte` int(11) NOT NULL,
  `nombreTipoReporte` varchar(50) NOT NULL,
  `detalleTipoReporte` varchar(255) NOT NULL,
  `queryTipoReporte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiporeporte`
--

INSERT INTO `tiporeporte` (`idTipoReporte`, `nombreTipoReporte`, `detalleTipoReporte`, `queryTipoReporte`) VALUES
(1, 'Dispositivos Dañados', ' Detalla los dispositivos que se encuentran actualmente con un daño.', ''),
(2, 'Préstamos Atrasados', 'Detalla los préstamos que sobrepasan la fecha prevista de devolución.', ''),
(3, 'Informe de Técnico-Préstamos-Daños', 'Detalla los técnicos que han efectuado devoluciones con daños en el dispositivo.\r\n', ''),
(4, 'Informe de Técnico-Préstamos-Pérdidas', 'Detalla los técnicos que han efectuado devoluciones con pérdidas o robos en el dispositivo.', ''),
(5, 'Dispositivos con Inventario Bajo', 'Detalla los tipos de dispositivo que tienen una cantidad de unidades en inventario menores a su cantidad mínima de existencias.', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `condicionactual`
--
ALTER TABLE `condicionactual`
  ADD PRIMARY KEY (`idCondicionActual`),
  ADD UNIQUE KEY `idCondicionActual` (`idCondicionActual`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD UNIQUE KEY `idDevolucion` (`idDevolucion`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idEstadoDevolucionGeneral` (`idEstadoDevolucionGeneral`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`idDispositivo`),
  ADD UNIQUE KEY `idDispositivo` (`idDispositivo`),
  ADD KEY `idCondicionActual` (`idCondicionActual`),
  ADD KEY `idEstadoInventario` (`idEstadoInventario`),
  ADD KEY `idTipoDispositivo` (`idTipoDispositivo`);

--
-- Indices de la tabla `estadodevolucion`
--
ALTER TABLE `estadodevolucion`
  ADD PRIMARY KEY (`idEstadoDevolucion`),
  ADD UNIQUE KEY `idEstadoDevolucion` (`idEstadoDevolucion`);

--
-- Indices de la tabla `estadodevoluciongeneral`
--
ALTER TABLE `estadodevoluciongeneral`
  ADD PRIMARY KEY (`idEstadoDevolucionGeneral`),
  ADD UNIQUE KEY `idEstadoDevolucionGeneral` (`idEstadoDevolucionGeneral`);

--
-- Indices de la tabla `estadoinventario`
--
ALTER TABLE `estadoinventario`
  ADD PRIMARY KEY (`idEstadoInventario`),
  ADD UNIQUE KEY `idEstadoInventario` (`idEstadoInventario`);

--
-- Indices de la tabla `ingeniero`
--
ALTER TABLE `ingeniero`
  ADD PRIMARY KEY (`idIngeniero`),
  ADD UNIQUE KEY `idIngeniero` (`idIngeniero`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD UNIQUE KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idIngeniero` (`idIngeniero`);

--
-- Indices de la tabla `prestamodispositivo`
--
ALTER TABLE `prestamodispositivo`
  ADD PRIMARY KEY (`idPrestamoDispositivo`),
  ADD UNIQUE KEY `idPrestamoDispositivo` (`idPrestamoDispositivo`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idEstadoDevolucion` (`idEstadoDevolucion`),
  ADD KEY `idDispositivo` (`idDispositivo`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD UNIQUE KEY `idReporte` (`idReporte`),
  ADD KEY `idTipoReporte` (`idTipoReporte`);

--
-- Indices de la tabla `tipodispositivo`
--
ALTER TABLE `tipodispositivo`
  ADD PRIMARY KEY (`idTipoDispositivo`),
  ADD UNIQUE KEY `idTipoDispositivo` (`idTipoDispositivo`);

--
-- Indices de la tabla `tiporeporte`
--
ALTER TABLE `tiporeporte`
  ADD PRIMARY KEY (`idTipoReporte`),
  ADD UNIQUE KEY `idTipoReporte` (`idTipoReporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `condicionactual`
--
ALTER TABLE `condicionactual`
  MODIFY `idCondicionActual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estadodevolucion`
--
ALTER TABLE `estadodevolucion`
  MODIFY `idEstadoDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estadodevoluciongeneral`
--
ALTER TABLE `estadodevoluciongeneral`
  MODIFY `idEstadoDevolucionGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estadoinventario`
--
ALTER TABLE `estadoinventario`
  MODIFY `idEstadoInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prestamodispositivo`
--
ALTER TABLE `prestamodispositivo`
  MODIFY `idPrestamoDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tiporeporte`
--
ALTER TABLE `tiporeporte`
  MODIFY `idTipoReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`),
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`idEstadoDevolucionGeneral`) REFERENCES `estadodevoluciongeneral` (`idEstadoDevolucionGeneral`);

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`idCondicionActual`) REFERENCES `condicionactual` (`idCondicionActual`),
  ADD CONSTRAINT `dispositivo_ibfk_2` FOREIGN KEY (`idEstadoInventario`) REFERENCES `estadoinventario` (`idEstadoInventario`),
  ADD CONSTRAINT `dispositivo_ibfk_3` FOREIGN KEY (`idTipoDispositivo`) REFERENCES `tipodispositivo` (`idTipoDispositivo`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idIngeniero`) REFERENCES `ingeniero` (`idIngeniero`);

--
-- Filtros para la tabla `prestamodispositivo`
--
ALTER TABLE `prestamodispositivo`
  ADD CONSTRAINT `prestamodispositivo_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`),
  ADD CONSTRAINT `prestamodispositivo_ibfk_2` FOREIGN KEY (`idEstadoDevolucion`) REFERENCES `estadodevolucion` (`idEstadoDevolucion`),
  ADD CONSTRAINT `prestamodispositivo_ibfk_3` FOREIGN KEY (`idDispositivo`) REFERENCES `dispositivo` (`idDispositivo`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idTipoReporte`) REFERENCES `tiporeporte` (`idTipoReporte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
