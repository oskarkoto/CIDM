-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 22:10:40
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

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`idDevolucion`, `idPrestamo`, `fechaRealDevolucion`, `idEstadoDevolucionGeneral`) VALUES
(1, 1, '2022-11-17', 1),
(2, 2, '2022-11-17', 1),
(3, 3, '2022-11-17', 2),
(4, 4, '2022-11-17', 6);

--
-- Disparadores `devolucion`
--
DELIMITER $$
CREATE TRIGGER `estadoPrestamoDevolucion` AFTER INSERT ON `devolucion` FOR EACH ROW UPDATE prestamo p
SET p.estadoPrestamo = "Cerrado" WHERE idPrestamo = NEW.idPrestamo
$$
DELIMITER ;

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

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`idDispositivo`, `idTipoDispositivo`, `idCondicionActual`, `idEstadoInventario`, `fechaInclusion`) VALUES
('AW8-1', 'AW8', 1, 1, '2022-11-15'),
('AW8-2', 'AW8', 1, 1, '2022-11-15'),
('AW8-3', 'AW8', 1, 1, '2022-11-17'),
('AW8-4', 'AW8', 1, 1, '2022-11-17'),
('AW8-5', 'AW8', 1, 1, '2022-11-17'),
('IP13P-1', 'IP13P', 1, 1, '2022-11-15'),
('IP13P-2', 'IP13P', 1, 1, '2022-11-15'),
('IP13P-3', 'IP13P', 1, 1, '2022-11-15'),
('IP13P-4', 'IP13P', 1, 1, '2022-11-15'),
('IP13P-5', 'IP13P', 1, 1, '2022-11-15'),
('IP13PM-1', 'IP13PM', 1, 1, '2022-11-17'),
('IP13PM-2', 'IP13PM', 1, 1, '2022-11-17'),
('IP13PM-3', 'IP13PM', 1, 1, '2022-11-17'),
('IP14-1', 'IP14', 1, 1, '2022-11-17'),
('IP14-2', 'IP14', 1, 1, '2022-11-17'),
('IP14-3', 'IP14', 1, 1, '2022-11-17'),
('IP14-4', 'IP14', 1, 1, '2022-11-17'),
('IP14P-1', 'IP14P', 1, 1, '2022-11-17'),
('IP14P-2', 'IP14P', 1, 1, '2022-11-17'),
('IP14P-3', 'IP14P', 1, 1, '2022-11-17'),
('IP14PM-1', 'IP14PM', 1, 1, '2022-11-17'),
('IP14PM-2', 'IP14PM', 1, 1, '2022-11-17');

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
(3, 'Dañado'),
(4, 'Robado/Perdido');

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

--
-- Volcado de datos para la tabla `ingeniero`
--

INSERT INTO `ingeniero` (`idIngeniero`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `telefono`, `correoElectronico`, `direccion`, `fechaInclusion`) VALUES
('1', 'Mario', '', 'Martínez', 'Ulloa', '85649977', 'mario@ideliver-inc.com', 'Heredia', '2022-11-17'),
('2', 'Andrea', 'María', 'Martínez', 'Castro', '75241236', 'andrea@ideliver-inc.com', 'Cartago', '2022-11-17'),
('3', 'Sebastián', '', 'Rey', 'Salas', '87965412', 'sebastian@ideliver-inc.com', 'Heredia', '2022-11-17'),
('4', 'Bernal', '', 'Chávez', 'Alpízar', '89632587', 'bernal@ideliver-inc.com', 'Cartago', '2022-11-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `idIngeniero` varchar(25) NOT NULL,
  `fechaPrestamo` date DEFAULT current_timestamp(),
  `fechaEsperadaDevolucion` date DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `estadoPrestamo` varchar(10) NOT NULL DEFAULT 'Abierto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idPrestamo`, `idIngeniero`, `fechaPrestamo`, `fechaEsperadaDevolucion`, `cliente`, `estadoPrestamo`) VALUES
(1, '1', '2022-11-17', '2022-11-17', 'TCH', 'Cerrado'),
(2, '2', '2022-11-02', '2022-11-04', 'JCP', 'Cerrado'),
(3, '3', '2022-11-03', '2022-11-05', 'ABC', 'Cerrado'),
(4, '4', '2022-11-17', '2022-11-17', 'CMC', 'Cerrado');

--
-- Disparadores `prestamo`
--
DELIMITER $$
CREATE TRIGGER `cambiarEstadoDispositivos` AFTER UPDATE ON `prestamo` FOR EACH ROW IF (NEW.estadoPrestamo = "Cerrado") THEN
    UPDATE dispositivo d
        INNER JOIN prestamodispositivo p 
        ON d.idDispositivo = p.idDispositivo
    SET d.idEstadoInventario = 1
    WHERE p.idPrestamo = NEW.idPrestamo;
END IF
$$
DELIMITER ;

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
-- Volcado de datos para la tabla `prestamodispositivo`
--

INSERT INTO `prestamodispositivo` (`idPrestamoDispositivo`, `idPrestamo`, `idDispositivo`, `idEstadoDevolucion`) VALUES
(1, 1, 'AW8-1', 1),
(2, 2, 'IP13P-1', 1),
(3, 3, 'IP14-1', 1),
(4, 4, 'AW8-2', 1);

--
-- Disparadores `prestamodispositivo`
--
DELIMITER $$
CREATE TRIGGER `cambiarestadodispositivo` AFTER INSERT ON `prestamodispositivo` FOR EACH ROW UPDATE dispositivo SET idEstadoInventario = 2 WHERE idDispositivo = NEW.idDispositivo
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

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`idReporte`, `tituloReporte`, `idTipoReporte`, `fechaReporte`) VALUES
(1, 'Reporte', 1, '2022-11-15');

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

--
-- Volcado de datos para la tabla `tipodispositivo`
--

INSERT INTO `tipodispositivo` (`idTipoDispositivo`, `nombreTipoDispositivo`, `descripcionTipoDispositivo`, `marcaTipoDispositivo`, `existenciaMinima`) VALUES
('AW8', 'Apple Watch Serie 8', 'Apple Watch Serie 8', 'Apple', 5),
('IP13P', 'iPhone 13 Pro', 'Apple iPhone 13 Pro', 'Apple', 5),
('IP13PM', 'iPhone 13 Pro Max', 'Apple iPhone 13 Pro Max', 'Apple', 5),
('IP14', 'iPhone 14', 'iPhone 14 Standard', 'Apple', 5),
('IP14P', 'iPhone 14 Pro', 'iPhone 14 Pro', 'Apple', 5),
('IP14PM', 'iPhone 14 Pro Max', 'iPhone 14 Pro Max', 'Apple', 5);

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
(3, 'Informe de Ingeniero-Préstamos-Daños', 'Detalla los ingenieros que han efectuado devoluciones reportando daños en el dispositivo.\r\n', ''),
(4, 'Informe de Ingeniero-Préstamos-Pérdidas', 'Detalla los ingenieros que han efectuado devoluciones reportando pérdidas o robos de dispositivo.', ''),
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
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `idEstadoInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `prestamodispositivo`
--
ALTER TABLE `prestamodispositivo`
  MODIFY `idPrestamoDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
