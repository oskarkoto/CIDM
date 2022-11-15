-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2021 a las 23:30:16
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
-- Base de datos: `salvavidas`
--
CREATE DATABASE IF NOT EXISTS `salvavidas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salvavidas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasuministro`
--

CREATE TABLE `categoriasuministro` (
  `idCategoria` int(11) NOT NULL,
  `descripcionCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriasuministro`
--

INSERT INTO `categoriasuministro` (`idCategoria`, `descripcionCategoria`) VALUES
(1, 'Accesorio'),
(2, 'Consumible'),
(3, 'Repuesto');

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
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idEquipo` varchar(25) NOT NULL,
  `idTipoEquipo` varchar(25) NOT NULL,
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
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `idTecnico` varchar(25) NOT NULL,
  `fechaPrestamo` date DEFAULT current_timestamp(),
  `fechaEsperadaDevolucion` date DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamoequipo`
--

CREATE TABLE `prestamoequipo` (
  `idPrestamoEquipo` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `idEquipo` varchar(25) NOT NULL,
  `idEstadoDevolucion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `prestamoequipo`
--
DELIMITER $$
CREATE TRIGGER `cambiarestadoequipo` AFTER INSERT ON `prestamoequipo` FOR EACH ROW UPDATE equipo SET idEstadoInventario = 2 WHERE idEquipo = NEW.idEquipo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `devolverestadoequipo` AFTER DELETE ON `prestamoequipo` FOR EACH ROW UPDATE equipo SET idEstadoInventario = 1 WHERE idEquipo = prestamoequipo.idEquipo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamosuministro`
--

CREATE TABLE `prestamosuministro` (
  `idPrestamoSuministro` int(11) NOT NULL,
  `idPrestamo` int(11) NOT NULL,
  `idSuministro` varchar(25) NOT NULL,
  `idEstadoDevolucion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `suministro`
--

CREATE TABLE `suministro` (
  `idSuministro` varchar(25) NOT NULL,
  `idTipoSuministro` varchar(25) NOT NULL,
  `idCondicionActual` int(11) NOT NULL,
  `idEstadoInventario` int(11) NOT NULL,
  `fechaInclusion` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `idTecnico` varchar(25) NOT NULL,
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
-- Estructura de tabla para la tabla `tipoequipo`
--

CREATE TABLE `tipoequipo` (
  `idTipoEquipo` varchar(25) NOT NULL,
  `nombreTipoEquipo` varchar(50) NOT NULL,
  `descripcionTipoEquipo` varchar(100) DEFAULT NULL,
  `marcaTipoEquipo` varchar(50) DEFAULT NULL,
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
(1, 'Equipos Dañados', ' Detalla los equipos que se encuentran actualmente con un daño.', ''),
(2, 'Suministros Dañados', 'Detalla los suministros que se encuentran actualmente con un daño.', ''),
(3, 'Préstamos Atrasados', 'Detalla los préstamos que sobrepasan la fecha prevista de devolución.', ''),
(4, 'Informe de Técnico-Préstamos-Daños', 'Detalla los técnicos que han efectuado devoluciones con daños en el equipo.\r\n', ''),
(5, 'Informe de Técnico-Préstamos-Pérdidas', 'Detalla los técnicos que han efectuado devoluciones con pérdidas o robos en el equipo.', ''),
(6, 'Equipos con Inventario Bajo', 'Detalla los tipos de equipo que tienen una cantidad de unidades en inventario menores a su cantidad mínima de existencias.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposuministro`
--

CREATE TABLE `tiposuministro` (
  `idTipoSuministro` varchar(25) NOT NULL,
  `nombreTipoSuministro` varchar(50) NOT NULL,
  `descripcionTipoSuministro` varchar(100) DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `idUnidades` int(11) NOT NULL,
  `marcaTipoSuministro` varchar(50) DEFAULT NULL,
  `existenciaMinima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadessuministro`
--

CREATE TABLE `unidadessuministro` (
  `idUnidades` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriasuministro`
--
ALTER TABLE `categoriasuministro`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `idCategoria` (`idCategoria`);

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
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD UNIQUE KEY `idEquipo` (`idEquipo`),
  ADD KEY `idCondicionActual` (`idCondicionActual`),
  ADD KEY `idEstadoInventario` (`idEstadoInventario`),
  ADD KEY `idTipoEquipo` (`idTipoEquipo`);

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
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD UNIQUE KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idTecnico` (`idTecnico`);

--
-- Indices de la tabla `prestamoequipo`
--
ALTER TABLE `prestamoequipo`
  ADD PRIMARY KEY (`idPrestamoEquipo`),
  ADD UNIQUE KEY `idPrestamoEquipo` (`idPrestamoEquipo`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idEstadoDevolucion` (`idEstadoDevolucion`),
  ADD KEY `idEquipo` (`idEquipo`);

--
-- Indices de la tabla `prestamosuministro`
--
ALTER TABLE `prestamosuministro`
  ADD PRIMARY KEY (`idPrestamoSuministro`),
  ADD UNIQUE KEY `idPrestamoSuministro` (`idPrestamoSuministro`),
  ADD KEY `idPrestamo` (`idPrestamo`),
  ADD KEY `idEstadoDevolucion` (`idEstadoDevolucion`),
  ADD KEY `idSuministro` (`idSuministro`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD UNIQUE KEY `idReporte` (`idReporte`),
  ADD KEY `idTipoReporte` (`idTipoReporte`);

--
-- Indices de la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD PRIMARY KEY (`idSuministro`),
  ADD UNIQUE KEY `idSuministro` (`idSuministro`),
  ADD KEY `idCondicionActual` (`idCondicionActual`),
  ADD KEY `idEstadoInventario` (`idEstadoInventario`),
  ADD KEY `idTipoSuministro` (`idTipoSuministro`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`idTecnico`),
  ADD UNIQUE KEY `idTecnico` (`idTecnico`);

--
-- Indices de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  ADD PRIMARY KEY (`idTipoEquipo`),
  ADD UNIQUE KEY `idTipoEquipo` (`idTipoEquipo`);

--
-- Indices de la tabla `tiporeporte`
--
ALTER TABLE `tiporeporte`
  ADD PRIMARY KEY (`idTipoReporte`),
  ADD UNIQUE KEY `idTipoReporte` (`idTipoReporte`);

--
-- Indices de la tabla `tiposuministro`
--
ALTER TABLE `tiposuministro`
  ADD PRIMARY KEY (`idTipoSuministro`),
  ADD UNIQUE KEY `idTipoSuministro` (`idTipoSuministro`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idUnidades` (`idUnidades`);

--
-- Indices de la tabla `unidadessuministro`
--
ALTER TABLE `unidadessuministro`
  ADD PRIMARY KEY (`idUnidades`),
  ADD UNIQUE KEY `idUnidades` (`idUnidades`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriasuministro`
--
ALTER TABLE `categoriasuministro`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `condicionactual`
--
ALTER TABLE `condicionactual`
  MODIFY `idCondicionActual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estadodevolucion`
--
ALTER TABLE `estadodevolucion`
  MODIFY `idEstadoDevolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadodevoluciongeneral`
--
ALTER TABLE `estadodevoluciongeneral`
  MODIFY `idEstadoDevolucionGeneral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadoinventario`
--
ALTER TABLE `estadoinventario`
  MODIFY `idEstadoInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prestamoequipo`
--
ALTER TABLE `prestamoequipo`
  MODIFY `idPrestamoEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prestamosuministro`
--
ALTER TABLE `prestamosuministro`
  MODIFY `idPrestamoSuministro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT de la tabla `unidadessuministro`
--
ALTER TABLE `unidadessuministro`
  MODIFY `idUnidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`idCondicionActual`) REFERENCES `condicionactual` (`idCondicionActual`),
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`idEstadoInventario`) REFERENCES `estadoinventario` (`idEstadoInventario`),
  ADD CONSTRAINT `equipo_ibfk_3` FOREIGN KEY (`idTipoEquipo`) REFERENCES `tipoequipo` (`idTipoEquipo`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idTecnico`) REFERENCES `tecnico` (`idTecnico`);

--
-- Filtros para la tabla `prestamoequipo`
--
ALTER TABLE `prestamoequipo`
  ADD CONSTRAINT `prestamoequipo_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`),
  ADD CONSTRAINT `prestamoequipo_ibfk_2` FOREIGN KEY (`idEstadoDevolucion`) REFERENCES `estadodevolucion` (`idEstadoDevolucion`),
  ADD CONSTRAINT `prestamoequipo_ibfk_3` FOREIGN KEY (`idEquipo`) REFERENCES `equipo` (`idEquipo`);

--
-- Filtros para la tabla `prestamosuministro`
--
ALTER TABLE `prestamosuministro`
  ADD CONSTRAINT `prestamosuministro_ibfk_1` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamo` (`idPrestamo`),
  ADD CONSTRAINT `prestamosuministro_ibfk_2` FOREIGN KEY (`idEstadoDevolucion`) REFERENCES `estadodevolucion` (`idEstadoDevolucion`),
  ADD CONSTRAINT `prestamosuministro_ibfk_3` FOREIGN KEY (`idSuministro`) REFERENCES `suministro` (`idSuministro`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idTipoReporte`) REFERENCES `tiporeporte` (`idTipoReporte`);

--
-- Filtros para la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD CONSTRAINT `suministro_ibfk_1` FOREIGN KEY (`idCondicionActual`) REFERENCES `condicionactual` (`idCondicionActual`),
  ADD CONSTRAINT `suministro_ibfk_2` FOREIGN KEY (`idEstadoInventario`) REFERENCES `estadoinventario` (`idEstadoInventario`),
  ADD CONSTRAINT `suministro_ibfk_3` FOREIGN KEY (`idTipoSuministro`) REFERENCES `tiposuministro` (`idTipoSuministro`);

--
-- Filtros para la tabla `tiposuministro`
--
ALTER TABLE `tiposuministro`
  ADD CONSTRAINT `tiposuministro_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoriasuministro` (`idCategoria`),
  ADD CONSTRAINT `tiposuministro_ibfk_2` FOREIGN KEY (`idUnidades`) REFERENCES `unidadessuministro` (`idUnidades`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
