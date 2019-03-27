-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2018 a las 02:01:10
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `Id_registro` int(11) NOT NULL,
  `Usuario_reg` varchar(25) NOT NULL,
  `Fecha_reg` date NOT NULL,
  `dni_reg` int(11) NOT NULL,
  `Nombre_reg` varchar(25) NOT NULL,
  `Apellido_reg` varchar(25) NOT NULL,
  `Accion_reg` int(11) NOT NULL,
  `Correo_reg` varchar(30) NOT NULL,
  `Telefono_reg` int(11) NOT NULL,
  `NuevoCorreo_reg` varchar(30) NOT NULL,
  `NuevoNom_reg` varchar(25) NOT NULL,
  `NuevoApe_reg` varchar(25) NOT NULL,
  `NuevoTel_reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `dni`, `Nombre`, `Apellido`, `Correo`, `Telefono`) VALUES
(6, 1232, 'leo', 'pulido', 'leocr1@hotmail.com', 2147483647);

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `editrigger` AFTER UPDATE ON `cliente` FOR EACH ROW INSERT INTO auditoria (Usuario_reg,Fecha_reg,dni_reg,Nombre_reg,Apellido_reg,Accion_reg,Correo_reg,Telefono_reg,NuevoCorreo_reg,NuevoNom_reg,NuevoApe_reg,NuevoTel_reg) VALUES (CURRENT_USER(),CURRENT_DATE (),new.dni,old.Nombre,old.Apellido,'3',old.correo,old.Telefono,new.correo,new.Nombre,new.Apellido,new.Telefono)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `elim_trigger` BEFORE DELETE ON `cliente` FOR EACH ROW INSERT INTO auditoria(Usuario_reg,Fecha_reg,dni_reg,Nombre_reg,Apellido_reg,Correo_reg,Accion_reg,Telefono_reg) VALUES (CURRENT_USER(),CURRENT_DATE (),old.dni,old.Nombre,old.Apellido,old.Correo,'2',old.Telefono)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inserttrigger` AFTER INSERT ON `cliente` FOR EACH ROW INSERT INTO auditoria (Usuario_reg,Fecha_reg,dni_reg,Nombre_reg,Apellido_reg,Telefono_reg,Correo_reg,Accion_reg) VALUES (CURRENT_USER(),CURRENT_DATE (),new.dni,new.Nombre,new.Apellido,new.Telefono,new.Correo,'1')
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`Id_registro`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `Id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
