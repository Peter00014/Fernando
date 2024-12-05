-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2021 a las 16:30:08
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accesoproyec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `id_com` int(11) NOT NULL,
  `nombre_com` varchar(50) NOT NULL,
  `status_com` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`id_com`, `nombre_com`, `status_com`) VALUES
(1, 'TELMEX', '1'),
(9, 'IZZI', '0'),
(16, 'NVIDIA ', '1'),
(19, 'OFFICE ', '1'),
(24, 'CFE', '1'),
(29, 'Mangos', '1'),
(30, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extensiones`
--

CREATE TABLE `extensiones` (
  `id_extension` int(11) NOT NULL,
  `Nombre_ext` varchar(50) NOT NULL,
  `Num_extension` varchar(11) NOT NULL,
  `Departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extensiones`
--

INSERT INTO `extensiones` (`id_extension`, `Nombre_ext`, `Num_extension`, `Departamento`) VALUES
(1, 'Arturo Moncada', '119', 'Gte. Mantenimiento'),
(4, 'Javier Gonzalez', '181', 'Calidad'),
(5, 'Mauricio Gutierrez', '101', 'AGM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialvisitas`
--

CREATE TABLE `historialvisitas` (
  `id_histo` int(11) NOT NULL,
  `id_compania` int(11) NOT NULL,
  `id_visitante` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historialvisitas`
--

INSERT INTO `historialvisitas` (`id_histo`, `id_compania`, `id_visitante`, `id_personal`) VALUES
(8, 19, 36, 1),
(9, 1, 39, 5),
(13, 9, 31, 1),
(14, 19, 34, 4),
(16, 1, 40, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_per` int(11) NOT NULL,
  `nombre_per` varchar(50) NOT NULL,
  `apellidos_per` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `extensionTel` int(11) NOT NULL,
  `statusPersonal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_per`, `nombre_per`, `apellidos_per`, `correo`, `extensionTel`, `statusPersonal`) VALUES
(1, 'Carlos', 'Valdes', 'carlos@magna.com', 115, '1'),
(2, 'Susana', 'Medina', 'sus@medmagna.com', 167, '1'),
(3, 'Diego', 'Garza', 'diego@magna.com', 234, '1'),
(4, 'Eduardo', 'Murillo', 'eduar@mumagna.com', 112, '1'),
(5, 'Yovana', 'Alvarado', 'yov@magna.ocm', 198, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `id_visi` int(11) NOT NULL,
  `nombre_visi` varchar(50) NOT NULL,
  `apellidos_visi` varchar(50) NOT NULL,
  `compania` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `statusVisitante` varchar(30) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitantes`
--

INSERT INTO `visitantes` (`id_visi`, `nombre_visi`, `apellidos_visi`, `compania`, `fecha_registro`, `statusVisitante`, `id_person`) VALUES
(31, 'Brandon', 'Perez', 19, '2021-06-28 12:57:00', '0', 1),
(34, 'Roberto', 'Juarez Mora', 19, '2021-06-23 09:48:00', '1', 5),
(36, 'Juanito', 'lopez', 9, '2021-06-01 12:57:00', '0', 5),
(37, 'Brandon', 'Perez', 19, '2021-06-09 16:12:00', '0', 1),
(39, 'Franscisco', 'Rodriguez', 9, '2021-06-03 07:21:00', '1', 3),
(40, 'Jose Andres', 'Valerio Martinez', 16, '2021-07-09 14:59:00', '1', 1),
(44, 'Joaquin', 'Lopez Mtz', 1, '2021-06-28 12:50:00', '1', 5),
(45, 'Armando', 'Mendez Lopez ', 16, '2021-07-01 09:54:00', '1', 4),
(46, 'Rodrigo ', 'Fava Montes', 16, '2021-05-13 09:55:00', '0', 3),
(47, 'Monica', 'Zapata', 9, '2021-07-08 12:02:00', '1', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `extensiones`
--
ALTER TABLE `extensiones`
  ADD PRIMARY KEY (`id_extension`);

--
-- Indices de la tabla `historialvisitas`
--
ALTER TABLE `historialvisitas`
  ADD PRIMARY KEY (`id_histo`),
  ADD KEY `id_compania` (`id_compania`),
  ADD KEY `id_visitante` (`id_visitante`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`id_visi`),
  ADD KEY `compania` (`compania`),
  ADD KEY `id_person` (`id_person`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compania`
--
ALTER TABLE `compania`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `extensiones`
--
ALTER TABLE `extensiones`
  MODIFY `id_extension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historialvisitas`
--
ALTER TABLE `historialvisitas`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `id_visi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historialvisitas`
--
ALTER TABLE `historialvisitas`
  ADD CONSTRAINT `historialvisitas_ibfk_1` FOREIGN KEY (`id_compania`) REFERENCES `compania` (`id_com`),
  ADD CONSTRAINT `historialvisitas_ibfk_2` FOREIGN KEY (`id_visitante`) REFERENCES `visitantes` (`id_visi`),
  ADD CONSTRAINT `historialvisitas_ibfk_3` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_per`);

--
-- Filtros para la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD CONSTRAINT `visitantes_ibfk_1` FOREIGN KEY (`compania`) REFERENCES `compania` (`id_com`),
  ADD CONSTRAINT `visitantes_ibfk_2` FOREIGN KEY (`id_person`) REFERENCES `personal` (`id_per`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
