-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-03-2021 a las 08:39:22
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE banco;
USE banco;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `idCliente` int NOT NULL,
  `nombreCliente` varchar(45) DEFAULT NULL,
  `apellidosCliente` varchar(250) DEFAULT NULL,
  `dniCliente` varchar(9) DEFAULT NULL,
  `direccionCliente` varchar(250) DEFAULT NULL,
  `localidadCliente` varchar(45) DEFAULT NULL,
  `fechaNacimientoCliente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`idCliente`, `nombreCliente`, `apellidosCliente`, `dniCliente`, `direccionCliente`, `localidadCliente`, `fechaNacimientoCliente`) VALUES
(4, 'Test', 'García', '12345678Z', 'Avenida Algo, 12', 'Jaén', '2000-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cuenta`
--

CREATE TABLE `Cuenta` (
  `idCuenta` int NOT NULL,
  `idCliente` int DEFAULT NULL,
  `ibanCuenta` varchar(24) DEFAULT NULL,
  `numeroCuenta` varchar(45) DEFAULT NULL,
  `saldoCuenta` float DEFAULT NULL,
  `interesAnualCuenta` int DEFAULT NULL,
  `tipoCuenta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cuenta`
--

INSERT INTO `Cuenta` (`idCuenta`, `idCliente`, `ibanCuenta`, `numeroCuenta`, `saldoCuenta`, `interesAnualCuenta`, `tipoCuenta`) VALUES
(3, 4, 'ES2831905659153372676174', '1232123ES', 10023, 1, 'Cuenta corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Movimiento`
--

CREATE TABLE `Movimiento` (
  `idMovimiento` int NOT NULL,
  `fechaMovimiento` datetime DEFAULT CURRENT_TIMESTAMP,
  `tipoMovimiento` varchar(45) DEFAULT NULL,
  `importeMovimiento` float DEFAULT NULL,
  `dniCliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Movimiento`
--

INSERT INTO `Movimiento` (`idMovimiento`, `fechaMovimiento`, `tipoMovimiento`, `importeMovimiento`, `dniCliente`) VALUES
(17, '2021-02-23 12:13:12', 'Ingreso', 23, '12345678Z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Movimientos`
--

CREATE TABLE `Movimientos` (
  `idCuenta` int NOT NULL,
  `idMovimiento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Movimientos`
--

INSERT INTO `Movimientos` (`idCuenta`, `idMovimiento`) VALUES
(3, 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD PRIMARY KEY (`idCuenta`),
  ADD KEY `idCliente_fk_idx` (`idCliente`);

--
-- Indices de la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
  ADD PRIMARY KEY (`idMovimiento`);

--
-- Indices de la tabla `Movimientos`
--
ALTER TABLE `Movimientos`
  ADD PRIMARY KEY (`idCuenta`,`idMovimiento`),
  ADD KEY `fk_Cuenta_has_Movimiento_Movimiento1_idx` (`idMovimiento`),
  ADD KEY `fk_Cuenta_has_Movimiento_Cuenta1_idx` (`idCuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  MODIFY `idCliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Cuenta`
--
ALTER TABLE `Cuenta`
  MODIFY `idCuenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Movimiento`
--
ALTER TABLE `Movimiento`
  MODIFY `idMovimiento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cuenta`
--
ALTER TABLE `Cuenta`
  ADD CONSTRAINT `idCliente_fk` FOREIGN KEY (`idCliente`) REFERENCES `Cliente` (`idCliente`);

--
-- Filtros para la tabla `Movimientos`
--
ALTER TABLE `Movimientos`
  ADD CONSTRAINT `fk_Cuenta_has_Movimiento_Cuenta1` FOREIGN KEY (`idCuenta`) REFERENCES `Cuenta` (`idCuenta`),
  ADD CONSTRAINT `fk_Cuenta_has_Movimiento_Movimiento1` FOREIGN KEY (`idMovimiento`) REFERENCES `Movimiento` (`idMovimiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
