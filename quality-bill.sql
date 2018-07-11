-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2018 a las 22:51:11
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quality-bill`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `NIT` varchar(100) NOT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `CIUDAD` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `ID_USUARIO`, `NOMBRE`, `NIT`, `DIRECCION`, `TELEFONO`, `CIUDAD`) VALUES
(1, 1, 'Fernando', 'Fernandez', 'Calle 1 # 2 - 34', '3012345678', 'Bogota'),
(2, 1, 'Carlos', '900659353-9 ', 'DG 49 SUR 85 79 TO 13 AP 150', '3204924464', 'Bogota'),
(5, 1, 'Popsy', '782381', 'Calle 24a # 59', '738213', NULL),
(7, 1, 'AMARILO', '800.185.295-1', 'CR 19 A 90 12', '6340000', 'Bogota'),
(8, 1, 'URBANIZADORA SANTAFE DE BOGOTA Urbansa S.A', '800136561-7', 'Carrera 12 # 98 - 35', '6280166', 'Bogota'),
(10, 2, 'INVERSIONES ALCABAMA', '800208146-3', '', '5946444', 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_FACTURA` int(11) NOT NULL,
  `ID_USUARIO` int(10) NOT NULL,
  `FACTURA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`ID`, `ID_FACTURA`, `ID_USUARIO`, `FACTURA`) VALUES
(1, 0, 1, NULL),
(2, 0, 1, NULL),
(3, 0, 1, NULL),
(4, 0, 1, NULL),
(5, 0, 1, NULL),
(6, 0, 1, NULL),
(7, 0, 1, NULL),
(8, 0, 1, NULL),
(9, 0, 1, NULL),
(10, 0, 1, NULL),
(11, 0, 1, NULL),
(12, 0, 1, NULL),
(13, 0, 1, NULL),
(14, 0, 1, NULL),
(15, 0, 1, NULL),
(16, 0, 1, NULL),
(17, 0, 1, NULL),
(18, 0, 1, NULL),
(19, 0, 1, NULL),
(20, 0, 1, NULL),
(21, 0, 1, NULL),
(22, 0, 1, NULL),
(23, 0, 1, NULL),
(24, 0, 1, NULL),
(25, 0, 1, NULL),
(26, 0, 1, NULL),
(27, 0, 1, NULL),
(28, 0, 1, NULL),
(29, 0, 1, NULL),
(30, 0, 1, NULL),
(31, 0, 1, NULL),
(32, 0, 1, NULL),
(33, 0, 1, NULL),
(34, 0, 1, NULL),
(35, 0, 1, NULL),
(36, 0, 1, NULL),
(37, 0, 1, NULL),
(38, 0, 1, NULL),
(39, 0, 1, NULL),
(40, 0, 1, NULL),
(41, 0, 1, NULL),
(42, 0, 1, NULL),
(43, 0, 1, NULL),
(44, 0, 1, NULL),
(45, 0, 1, NULL),
(46, 0, 1, NULL),
(47, 0, 1, NULL),
(48, 0, 1, NULL),
(49, 0, 1, NULL),
(50, 0, 1, NULL),
(51, 0, 1, NULL),
(52, 0, 1, NULL),
(53, 0, 1, NULL),
(54, 0, 1, NULL),
(55, 0, 1, NULL),
(56, 0, 1, NULL),
(57, 0, 1, NULL),
(58, 0, 1, NULL),
(59, 0, 1, NULL),
(60, 0, 1, NULL),
(61, 0, 1, NULL),
(62, 0, 1, NULL),
(63, 0, 1, NULL),
(64, 0, 1, NULL),
(65, 0, 1, NULL),
(66, 0, 1, NULL),
(67, 0, 1, NULL),
(68, 0, 1, NULL),
(69, 0, 1, NULL),
(70, 0, 1, NULL),
(71, 0, 1, NULL),
(72, 0, 1, NULL),
(73, 0, 1, NULL),
(74, 0, 1, NULL),
(75, 0, 1, NULL),
(76, 0, 1, NULL),
(77, 0, 1, NULL),
(78, 0, 1, NULL),
(79, 0, 1, NULL),
(80, 0, 1, NULL),
(81, 0, 1, NULL),
(82, 0, 1, NULL),
(83, 0, 1, NULL),
(84, 0, 1, NULL),
(85, 0, 1, NULL),
(86, 0, 1, NULL),
(87, 0, 1, NULL),
(88, 0, 1, NULL),
(89, 0, 1, NULL),
(90, 0, 1, NULL),
(91, 0, 1, NULL),
(92, 0, 1, NULL),
(93, 0, 1, NULL),
(94, 0, 1, NULL),
(95, 0, 1, NULL),
(96, 0, 1, NULL),
(97, 0, 1, NULL),
(98, 0, 1, NULL),
(99, 0, 1, NULL),
(100, 0, 1, NULL),
(101, 0, 1, NULL),
(102, 0, 1, NULL),
(103, 0, 1, NULL),
(104, 0, 1, NULL),
(105, 0, 1, NULL),
(106, 0, 1, NULL),
(107, 0, 1, NULL),
(108, 0, 1, NULL),
(109, 0, 1, NULL),
(110, 0, 1, NULL),
(111, 0, 1, NULL),
(112, 0, 1, NULL),
(113, 0, 1, NULL),
(114, 0, 1, NULL),
(115, 0, 1, NULL),
(116, 0, 1, NULL),
(117, 0, 1, NULL),
(118, 0, 1, NULL),
(119, 0, 1, NULL),
(120, 0, 1, NULL),
(121, 0, 1, NULL),
(122, 0, 1, NULL),
(123, 0, 1, NULL),
(124, 0, 1, NULL),
(125, 0, 1, NULL),
(126, 0, 1, NULL),
(127, 0, 1, NULL),
(128, 0, 1, NULL),
(129, 0, 1, NULL),
(130, 0, 1, NULL),
(131, 0, 1, NULL),
(132, 0, 1, NULL),
(133, 0, 1, NULL),
(134, 0, 1, NULL),
(135, 0, 1, './uploads/pdf/Factura_No.135'),
(136, 0, 1, './uploads/pdf/Factura_No.136'),
(137, 0, 1, './uploads/pdf/Factura_No.137'),
(138, 0, 1, './uploads/pdf/Factura_No.138'),
(139, 0, 1, './uploads/pdf/Factura_No.139'),
(140, 0, 1, './uploads/pdf/Factura_No.140'),
(141, 0, 1, './uploads/pdf/Factura_No.141'),
(142, 0, 1, './uploads/pdf/Factura_No.142'),
(143, 0, 1, './uploads/pdf/Factura_No.143'),
(144, 0, 1, './uploads/pdf/Factura_No.144'),
(145, 0, 1, './uploads/pdf/Factura_No.145'),
(146, 0, 1, './uploads/pdf/Factura_No.146'),
(147, 0, 1, './uploads/pdf/Factura_No.147'),
(148, 0, 1, './uploads/pdf/Factura_No.148'),
(149, 0, 1, './uploads/pdf/Factura_No.149'),
(150, 0, 1, './uploads/pdf/Factura_No.150'),
(151, 0, 1, './uploads/pdf/Factura_No.151'),
(152, 0, 1, './uploads/pdf/Factura_No.152'),
(153, 0, 1, './uploads/pdf/Factura_No.153'),
(154, 0, 1, './uploads/pdf/Factura_No.154'),
(155, 0, 1, './uploads/pdf/Factura_No.155'),
(156, 0, 1, './uploads/pdf/Factura_No.156'),
(157, 0, 1, './uploads/pdf/Factura_No.157'),
(158, 0, 1, './uploads/pdf/Factura_No.158'),
(159, 0, 1, './uploads/pdf/Factura_No.159'),
(160, 0, 1, './uploads/pdf/Factura_No.160'),
(161, 0, 1, './uploads/pdf/Factura_No.161'),
(162, 0, 1, './uploads/pdf/Factura_No.162'),
(163, 0, 1, './uploads/pdf/Factura_No.163'),
(164, 0, 1, './uploads/pdf/Factura_No.164'),
(165, 0, 1, './uploads/pdf/Factura_No.165'),
(166, 0, 1, './uploads/pdf/Factura_No.166'),
(167, 0, 1, './uploads/pdf/Factura_No.167'),
(168, 0, 1, './uploads/pdf/Factura_No.168'),
(169, 0, 1, './uploads/pdf/Factura_No.169'),
(170, 0, 1, './uploads/pdf/Factura_No.170'),
(171, 0, 1, './uploads/pdf/Factura_No.171'),
(172, 0, 1, './uploads/pdf/Factura_No.172'),
(173, 0, 1, './uploads/pdf/Factura_No.173'),
(174, 0, 1, './uploads/pdf/Factura_No.174'),
(175, 0, 1, './uploads/pdf/Factura_No.175'),
(176, 0, 1, './uploads/pdf/Factura_No.176'),
(177, 0, 1, './uploads/pdf/Factura_No.177'),
(178, 0, 1, './uploads/pdf/Factura_No.178'),
(179, 0, 1, './uploads/pdf/Factura_No.179'),
(180, 0, 1, './uploads/pdf/Factura_No.180'),
(181, 0, 1, './uploads/pdf/Factura_No.181'),
(182, 0, 1, './uploads/pdf/Factura_No.182'),
(183, 0, 1, NULL),
(184, 0, 1, NULL),
(185, 0, 1, NULL),
(186, 0, 1, './uploads/pdf/Factura_No.186'),
(187, 0, 1, './uploads/pdf/Factura_No.187'),
(188, 0, 1, './uploads/pdf/Factura_No.188'),
(189, 0, 1, NULL),
(190, 0, 1, './uploads/pdf/Factura_No.190'),
(191, 0, 2, './uploads/pdf/Factura_No.191'),
(192, 0, 1, './uploads/pdf/Factura_No.192'),
(193, 0, 1, './uploads/pdf/Factura_No.193'),
(194, 0, 1, './uploads/pdf/Factura_No.194'),
(195, 0, 1, './uploads/pdf/Factura_No.195'),
(196, 0, 1, './uploads/pdf/Factura_No.196');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `NIT` varchar(100) NOT NULL,
  `RESOLUCION` varchar(50) DEFAULT NULL,
  `FECHA_RESOLUCION` date NOT NULL,
  `ACTIVIDAD_ECONOMICA` varchar(50) DEFAULT NULL,
  `FACTURA_DESDE` varchar(100) NOT NULL,
  `FACTURA_HASTA` varchar(100) NOT NULL,
  `ICA` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(200) NOT NULL,
  `TELEFONO` varchar(20) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `IMAGEN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `USUARIO`, `PASSWORD`, `NOMBRE`, `NIT`, `RESOLUCION`, `FECHA_RESOLUCION`, `ACTIVIDAD_ECONOMICA`, `FACTURA_DESDE`, `FACTURA_HASTA`, `ICA`, `DIRECCION`, `TELEFONO`, `CORREO`, `IMAGEN`) VALUES
(1, 'construacabados', '1234', 'CONSTRUACABADOS PMG S.A.S', '800.185.295-1', '18762008991665', '2017-09-15', '4330', '502', '576', '6,9 x 1.000', 'DG 49 SUR 85 79 TO 13 AP 150', '3204924464', 'construacabadospmg@gmail.com', './uploads/logos/Logo-1.png'),
(2, 'apr', '1234', 'APR ASEO Y MANTENIMIENTO S.A.S', '900666318', '18762007827868', '2018-04-17', '8129', '501', '1000', '6,9 x 1.000', 'Carrera 64 No. 55 A 81 sur', '310300151', 'apraseoymantenimiento@gmail.com', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
