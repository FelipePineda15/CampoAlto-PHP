-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2018 a las 02:45:40
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `campo_alto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_Estudiante` int(11) NOT NULL,
  `Documento` int(11) DEFAULT NULL,
  `Nombres` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `Apellidos` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `Direccion` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `Email` varchar(1000) CHARACTER SET latin1 DEFAULT NULL,
  `ID_Programa` int(11) DEFAULT NULL,
  `ID_Semestre` int(11) DEFAULT NULL,
  `Huella_Dactilar` varbinary(11) DEFAULT NULL,
  `No_Carne` int(11) DEFAULT NULL,
  `Estado` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_Estudiante`, `Documento`, `Nombres`, `Apellidos`, `Direccion`, `Telefono`, `Celular`, `Email`, `ID_Programa`, `ID_Semestre`, `Huella_Dactilar`, `No_Carne`, `Estado`) VALUES
(9, 1019120851, 'Jose', 'Saramago', 'Cll 5 # 15-96', 6658989, 305305305, 'jjj@gmil.com', 1, 1, NULL, 1, 'Activo'),
(10, 52589947, 'Enrique', 'Peña', 'Kr 15 # 35-64', 3026969, 320320320, 'ffff@gmail.com', 2, 2, NULL, 2, 'Activo'),
(11, 111111, 'Mario', 'Neta', 'cl 52', 56656, 11112123, 'hgdfh@gjfmf.com', 3, 2, NULL, 3, 'Activo'),
(12, 2222222, 'Susana', 'Oria', 'cl 89', 5645454, 2147483647, 'fgfdfhdfh@fhgj.com', 4, 1, NULL, 4, 'Activo'),
(13, 546454546, 'Elba', 'Calao', 'Cl 142', 455854874, 2147483647, 'hdfbdfdfj@ggg.com', 5, 2, NULL, 5, 'Activo'),
(14, 548747, 'Soila', 'Cerda', 'tv 486', 2156454, 5614522, 'hjige@kgfjkgfjgf.com', 6, 2, NULL, 6, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `ID_Pago` int(11) NOT NULL,
  `ID_Estudiante` int(11) DEFAULT NULL,
  `ID_Semestre` int(11) DEFAULT NULL,
  `Valor_Pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`ID_Pago`, `ID_Estudiante`, `ID_Semestre`, `Valor_Pago`) VALUES
(1, 9, 1, 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `ID_Programa` int(11) NOT NULL,
  `Nombre_Programa` char(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`ID_Programa`, `Nombre_Programa`) VALUES
(1, 'Servicios Farmaceuticos'),
(2, 'Enfermeria'),
(3, 'Salud Oral'),
(4, 'Salud Publica'),
(5, 'Auxiliar Administrativo'),
(6, 'Cosmetologia y Estetica Integral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `ID_Semestre` int(11) NOT NULL,
  `Numero_Semestre` int(11) DEFAULT NULL,
  `Valor_Semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`ID_Semestre`, `Numero_Semestre`, `Valor_Semestre`) VALUES
(1, 1, 1500000),
(2, 2, 1800000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_anual`
--

CREATE TABLE `valor_anual` (
  `ID_Valor` int(11) NOT NULL,
  `ID_Programa` int(11) DEFAULT NULL,
  `Año` int(4) DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `valor_anual`
--

INSERT INTO `valor_anual` (`ID_Valor`, `ID_Programa`, `Año`, `Valor`) VALUES
(1, 1, 2018, 1300000),
(2, 2, 2018, 1400000),
(3, 3, 2018, 1500000),
(4, 4, 2018, 1600000),
(5, 5, 2018, 1000000),
(6, 6, 2018, 1100000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_Estudiante`),
  ADD KEY `ID_Programa` (`ID_Programa`),
  ADD KEY `ID_Semestre` (`ID_Semestre`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_Pago`),
  ADD KEY `ID_Estudiante` (`ID_Estudiante`),
  ADD KEY `ID_Semestre` (`ID_Semestre`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`ID_Programa`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`ID_Semestre`);

--
-- Indices de la tabla `valor_anual`
--
ALTER TABLE `valor_anual`
  ADD PRIMARY KEY (`ID_Valor`),
  ADD KEY `ID_Programa` (`ID_Programa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_Estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `ID_Pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `ID_Programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `ID_Semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `valor_anual`
--
ALTER TABLE `valor_anual`
  MODIFY `ID_Valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`ID_Programa`) REFERENCES `programa` (`ID_Programa`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`ID_Semestre`) REFERENCES `semestre` (`ID_Semestre`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`ID_Estudiante`) REFERENCES `estudiante` (`ID_Estudiante`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`ID_Semestre`) REFERENCES `semestre` (`ID_Semestre`);

--
-- Filtros para la tabla `valor_anual`
--
ALTER TABLE `valor_anual`
  ADD CONSTRAINT `valor_anual_ibfk_1` FOREIGN KEY (`ID_Programa`) REFERENCES `programa` (`ID_Programa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
