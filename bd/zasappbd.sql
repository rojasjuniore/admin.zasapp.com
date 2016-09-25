-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-09-2016 a las 11:42:12
-- Versión del servidor: 5.5.51-cll-lve
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zasappbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(1000) NOT NULL,
  `apellidos_cliente` varchar(1000) DEFAULT NULL,
  `nic_cliente` varchar(1000) DEFAULT NULL,
  `email_cliente` varchar(1000) DEFAULT NULL,
  `clave_cliente` varchar(1000) DEFAULT NULL,
  `direccion_cliente` varchar(1000) DEFAULT NULL,
  `pais_cliente` varchar(1000) DEFAULT NULL,
  `telefono_movil_cliente` varchar(1000) DEFAULT NULL,
  `telefono_local_cliente` varchar(1000) DEFAULT NULL,
  `fecha_registro_cliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellidos_cliente`, `nic_cliente`, `email_cliente`, `clave_cliente`, `direccion_cliente`, `pais_cliente`, `telefono_movil_cliente`, `telefono_local_cliente`, `fecha_registro_cliente`) VALUES
(1, 'jose', 'jose', 'sasa', 'sas', 'asas', '                                                           dasdasasasasasas                                                             asasa                                                                                                    ', 'GP', 'asasa', 'asasas', '2016-09-17 05:09:34'),
(2, 'wewe', 'wewe', 'wew', 'ee', 'wewe', 'wewe', 'wew', 'ewew', 'e', '2016-09-18 23:15:53'),
(3, 'junior_hghghghghgh', 'rojas rojas', '20792914', 'rojasjuniore@gmail.com', '1234', '        venezuela', '', '04142592846', '04142592846', '2016-09-20 03:24:11'),
(4, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:49:38'),
(5, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:50:00'),
(6, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:50:59'),
(7, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:51:26'),
(8, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:51:39'),
(9, 'wewew', 'ewe', 'wewew', 'wew@e.com', 'wqwqwqw', 'qw', 'ES', 'qwqwqw', 'qwqwq', '2016-09-21 21:52:23'),
(10, 'junior', 'junior', '20792914', 'ropjasjuni@mail.com', '1234567', 'wqewewewe', 'ER', 'wqewew', 'wewewe', '2016-09-22 03:02:22'),
(11, 'junior', 'rojas', 'ewewew', 'rojasjuniore@gmail.com', '12343', 'wewewewew', 'SV', '04142592846', 'wewewe', '2016-09-23 06:21:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `numero_cotizacion` int(11) NOT NULL,
  `fecha_cotizacion` varchar(1000) DEFAULT NULL,
  `atencion` varchar(50) NOT NULL,
  `tel1` varchar(9) NOT NULL,
  `empresa` varchar(75) NOT NULL,
  `tel2` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `validez` varchar(20) NOT NULL,
  `entrega` varchar(20) NOT NULL,
  `vendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `numero_cotizacion`, `fecha_cotizacion`, `atencion`, `tel1`, `empresa`, `tel2`, `email`, `condiciones`, `validez`, `entrega`, `vendedor`) VALUES
(1, 1, '2016-09-23 07:01:08', 'Junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 60 dÃ­as', '15 dÃ­as', '323232', 13),
(2, 2, '2016-09-23 07:15:37', 'junior rojas', '1234-1234', '2323232323', '2322-2332', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 22),
(3, 3, '2016-09-23 07:19:20', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '15 dÃ­as', '10', 18),
(4, 4, '2016-09-23 07:20:00', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito', '30 dÃ­as', '10', 10),
(5, 5, '2016-09-23 07:23:47', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(6, 6, '2016-09-23 07:30:57', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(7, 7, '2016-09-23 07:32:03', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(8, 8, '2016-09-23 07:32:05', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(9, 9, '2016-09-23 07:34:16', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(10, 10, '2016-09-23 07:35:06', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(11, 11, '2016-09-23 07:38:23', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(12, 12, '2016-09-23 07:39:21', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(13, 13, '2016-09-23 07:39:39', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(14, 14, '2016-09-23 07:40:33', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(15, 15, '2016-09-23 07:41:50', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(16, 16, '2016-09-23 07:42:17', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(17, 17, '2016-09-23 07:42:40', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(18, 18, '2016-09-23 07:42:57', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(19, 19, '2016-09-23 07:43:17', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(20, 20, '2016-09-23 07:43:19', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(21, 21, '2016-09-23 07:43:28', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(22, 22, '2016-09-23 07:43:51', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 10),
(23, 23, '2016-09-23 06:21:29', 'junior rojas', '1234-1234', 'junior', '1234-1234', 'yunior0000@gmail.com', 'CrÃ©dito 30 dÃ­as', '10 dÃ­as', '10', 20),
(24, 24, '2016-09-23 14:39:51', 'junior rojas', '1234-1234', '2323232323', '2322-2332', 'admin@admin.com', 'CrÃ©dito', '10 dÃ­as', '323232', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion`
--

CREATE TABLE `detalle_cotizacion` (
  `id_detalle_cotizacion` int(11) UNSIGNED NOT NULL,
  `numero_cotizacion` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cotizacion`
--

INSERT INTO `detalle_cotizacion` (`id_detalle_cotizacion`, `numero_cotizacion`, `id_producto`, `cantidad`, `precio_venta`) VALUES
(26, 1, 14, 1, 1000),
(27, 1, 14, 1, 1000),
(28, 1, 14, 1, 1000),
(29, 1, 14, 1, 1000),
(30, 1, 14, 1, 1000),
(31, 1, 21, 1, 100000000),
(32, 1, 14, 1, 1000),
(33, 1, 14, 1, 1000),
(34, 1, 14, 1, 1000),
(35, 1, 14, 1, 1000),
(36, 1, 14, 1, 1000),
(37, 1, 14, 1, 1000),
(38, 1, 15, 1, 100000),
(39, 1, 14, 1, 1000),
(40, 1, 15, 1, 100000),
(41, 1, 14, 1, 1000),
(42, 1, 14, 1, 1000),
(43, 1, 14, 1, 1000),
(44, 1, 14, 1, 1000),
(45, 1, 14, 1, 1000),
(46, 1, 21, 1, 100000000),
(47, 1, 14, 1, 1000),
(48, 1, 14, 1, 1000),
(49, 1, 14, 1, 1000),
(50, 1, 14, 1, 1000),
(51, 1, 14, 1, 1000),
(52, 1, 14, 1, 1000),
(53, 1, 15, 1, 100000),
(54, 1, 14, 1, 1000),
(55, 1, 15, 1, 100000),
(56, 1, 14, 1, 1000),
(57, 1, 14, 1, 1000),
(58, 1, 14, 1, 1000),
(59, 1, 14, 1, 1000),
(60, 1, 14, 1, 1000),
(61, 1, 21, 1, 100000000),
(62, 1, 14, 1, 1000),
(63, 1, 14, 1, 1000),
(64, 1, 14, 1, 1000),
(65, 1, 14, 1, 1000),
(66, 1, 14, 1, 1000),
(67, 1, 14, 1, 1000),
(68, 1, 15, 1, 100000),
(69, 1, 14, 1, 1000),
(70, 1, 15, 1, 100000),
(71, 1, 14, 1, 1000),
(72, 1, 14, 1, 1000),
(73, 1, 14, 1, 1000),
(74, 1, 14, 1, 1000),
(75, 1, 14, 1, 1000),
(76, 1, 21, 1, 100000000),
(77, 1, 14, 1, 1000),
(78, 1, 14, 1, 1000),
(79, 1, 14, 1, 1000),
(80, 1, 14, 1, 1000),
(81, 1, 14, 1, 1000),
(82, 1, 14, 1, 1000),
(83, 1, 15, 1, 100000),
(84, 1, 14, 1, 1000),
(85, 1, 15, 1, 100000),
(86, 1, 14, 1, 1000),
(87, 1, 14, 1, 1000),
(88, 1, 14, 1, 1000),
(89, 1, 14, 1, 1000),
(90, 1, 14, 1, 1000),
(91, 1, 14, 1, 1000),
(92, 1, 17, 1, 2147483647),
(93, 1, 14, 1, 1000),
(94, 1, 17, 1, 2147483647),
(95, 1, 14, 1, 1000),
(96, 1, 17, 1, 2147483647),
(97, 2, 15, 1, 100000),
(98, 2, 15, 1, 100000),
(99, 2, 15, 1, 100000),
(100, 2, 15, 1, 100000),
(101, 2, 15, 1, 100000),
(102, 2, 15, 1, 100000),
(103, 3, 15, 1, 100000),
(104, 3, 14, 1, 1000),
(105, 4, 15, 1, 100000),
(106, 5, 15, 1, 100000),
(107, 6, 15, 1, 100000),
(108, 7, 15, 1, 100000),
(109, 8, 15, 1, 100000),
(110, 9, 15, 1, 100000),
(111, 10, 15, 1, 100000),
(112, 11, 15, 1, 100000),
(113, 12, 15, 1, 100000),
(114, 13, 15, 1, 100000),
(115, 14, 15, 1, 100000),
(116, 15, 15, 1, 100000),
(117, 16, 15, 1, 100000),
(118, 17, 15, 1, 100000),
(119, 18, 15, 1, 100000),
(120, 19, 15, 1, 100000),
(121, 20, 15, 1, 100000),
(122, 21, 15, 1, 100000),
(123, 22, 15, 1, 100000),
(124, 23, 14, 1, 1000),
(125, 23, 14, 1, 1000),
(126, 23, 14, 1, 1000),
(127, 23, 16, 1, 1000000000),
(128, 24, 14, 1, 1000),
(129, 24, 16, 1, 1000000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) UNSIGNED NOT NULL,
  `codigo_producto` varchar(1000) NOT NULL,
  `titulo` varchar(1000) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `plantilla_url` varchar(1000) DEFAULT NULL,
  `estado` varchar(1000) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo_producto`, `titulo`, `descripcion`, `precio`, `imagen`, `plantilla_url`, `estado`, `fecha_creacion`) VALUES
(14, 'COD1474347004', 'Trabajando con cÃ³digo legacy: Sprout methods', 'El cÃ³digo legacy es inevitable.\r\n\r\nPor mucho que intentemos crear la arquitectura perfecta, que tengamos cuidado al crear cÃ³digo nuevo, que tengamos todo el tiempo del mundo para estructurar nuestro cÃ³digo perfectamenteâ€¦ Tarde o temprano surgen problemas.', 1000, '1474347119.jpg', 'http://www.genbetadev.com/metodologias-de-programacion/trabajando-con-codigo-legacy-sprout-methods', 'visible', '2016-09-20 04:51:59'),
(15, 'COD1474347170', 'Â¿Por quÃ© deberÃ­as pensar en Gradle 3.0 como sustituto de Maven?', 'Hace unas semanas el equipo de Gradle presentÃ³ la esperada versiÃ³n 3.0 de esta herramienta open source de construcciÃ³n de software. Aunque en el mundo Java el lider lleva siendo durante mucho tiempo Maven ya es hora de dejar atrÃ¡s los interminables archivos XML de configuraciÃ³n y dar el paso algo mÃ¡s moderno y potente como Gradle.', 100000, '1474347208.jpg', 'http://www.genbetadev.com/herramientas/por-que-deberias-pensar-en-gradle-3-0-como-sustituto-de-maven', 'visible', '2016-09-20 04:53:28'),
(16, 'COD1474347222', 'Siete emprendedores espaÃ±oles rompen el tabÃº: explican por quÃ© realmente su startup fue un fracaso', 'Que una startup tenga Ã©xito no es, precisamente, una tarea sencilla: resolver un problema real de los clientes, desarrollar un modelo de negocio que funciona y poder escalar para crecer. De hecho, segÃºn los datos de Startup Genome, solamente 1 de cada 12 startups consiguen sobrevivir y convertirse en negocios sostenibles.', 1000000000, '1474347258.jpg', 'http://www.xataka.com/otros/siete-emprendedores-espanoles-rompen-el-tabu-explican-por-que-realmente-su-startup-fue-un-fracaso', 'visible', '2016-09-20 04:54:18'),
(17, '', '12 ideas de la filosofÃ­a Clean que no pueden faltar en tu cÃ³digo', 'Esto es una prueba Esto es una pruebaEsto es una pruebaEsto es una pruebaEsto es una pruebaEsto es una pruebaEsto es una pruebaEsto es una prueba', 2147483647, '1474611774.jpg', 'http://www.genbetadev.com/metodologias-de-programacion/12-ideas-de-la-filosofia-clean-que-no-pueden-faltar-en-tu-codigo', 'visible', '2016-09-20 04:54:56'),
(18, 'COD1474347311', 'Los 12 canales de Youtube de desarrollo en EspaÃ±ol que merece la pena seguir', 'Youtube es la nueva televisiÃ³n, dicen unos. Youtube es la nueva universidad, dicen otros. Nosotros ni idea, que la tÃºnica de Rappel no nos sienta nada bien (y la macedonia en el pelo de Paco Porras menos), pero lo que sÃ­ sabemos es que entre la marabunta de canales que hay en Youtube, entre tanto Rubius, Dalas y Wismichu, hay unos cuantos dedicados al desarrollo y en espaÃ±ol. De entre ellos hoy te vamos a seleccionar los 12 canales de Youtube de desarrollo en EspaÃ±ol que merece la pena seguir. Â¡Al turrÃ³n!', 1000000000, '1474347348.jpg', 'http://www.genbetadev.com/formacion/los-12-canales-de-youtube-de-desarrollo-en-espanol-que-merece-la-pena-seguir', 'visible', '2016-09-20 04:55:48'),
(19, 'COD1474347354', 'AsÃ­ puedes borrar todos los datos de tu ordenador y que nadie los encuentre jamÃ¡s', 'Borrar los datos del PC no es un simple ejercicio para dar espacio al disco duro. Ya sea porque queramos vender, devolver o regalar un equipo, o por simple cuestiÃ³n de seguridad, debemos tener en cuenta que con arrastrar un archivo a la papelera de reciclaje y pulsar vaciar no estamos eliminando nada.', 100000000, '1474347388.jpg', 'http://www.xataka.com/tecnologiazen/asi-puedes-borrar-todos-los-datos-de-tu-ordenador-y-que-nadie-los-encuentre-jamas?utm_source=genbetadev&utm_medium=homepage&utm_campaign=reposted_club', 'visible', '2016-09-20 04:56:28'),
(20, 'COD1474347395', 'Entendiendo la inmutabilidad: QuÃ© es, para quÃ© sirve y cÃ³mo usarla', 'En estos aÃ±os en los que los lenguajes funcionales estÃ¡n empezando a convertirse en alternativas reales en casi todos los Ã¡mbitos, uno de los conceptos que suele venir asociado a ellos es el de la inmutabilidad.\r\n\r\nSi bien es cierto que la inmutabilidad es una idea que no es exclusiva de la programaciÃ³n funcional, sÃ­ que cobra una importancia vital en este tipo de lenguajes.', 111111111, '1474347423.jpg', 'http://www.genbetadev.com/metodologias-de-programacion/entendiendo-la-inmutabilidad-que-es-para-que-sirve-y-como-usarla', 'visible', '2016-09-20 04:57:03'),
(21, 'COD1474347439', 'Los 61 atajos de teclado de Chrome para multiplicar por diez tu productividad', 'Estamos tan acostumbrados a trabajar casi siempre de la misma manera con el ordenador que prÃ¡cticamente lo hacemos todo de forma mecÃ¡nica. Por lo general esto es bueno, salvo cuando por costumbre nos complicamos demasiado haciendo algunas cosas que podrÃ­amos acelerar con una simple combinaciÃ³n de teclas.\r\n\r\nPor eso hoy os vamos a ofrecer una pequeÃ±a colecciÃ³n de atajos de teclado para Chrome. Muchos de ellos seguro que ya os los sabÃ©is de memoria, pero tambiÃ©n es posible que haya otros cuantos mÃ¡s que no conozcÃ¡is. Los comandos funcionarÃ¡n para Windows y Linux, aunque en los casos en los que en Mac sean diferentes tambiÃ©n los aÃ±adiremos.', 100000000, '1474347469.jpg', 'http://www.xataka.com/aplicaciones/los-61-atajos-de-teclado-de-chrome-para-multiplicar-por-diez-tu-productividad', 'visible', '2016-09-20 04:57:49'),
(22, 'COD1474347552', '13', '        PHP tiene bastante mala prensa. En las conferencias no hay ponente que quiera ser cool que no lance su pullita hacia PHP y los phperos. Y lo cierto es que las mÃºltiples atrocidades que los desarrolladores de PHP cometen ', 100, '1474348436.jpg', 'http://www.genbetadev.com/php/13-trucos-y-consejos-de-php-que-pueden-hacerte-la-vida-profesional-mas-facil', 'visible', '2016-09-20 04:59:27'),
(23, 'COD1474347574', 'Kotlin desde el punto de vista de un desarrollador Groovy', 'Ãšltimamente se estÃ¡ oyendo hablar cada vez mÃ¡s de Kotlin en el entorno de la JVM. Los desarrolladores Java y sobre todos los desarrolladores Android estÃ¡n entusiasmados con este nuevo lenguaje que promete ser una revoluciÃ³n para ellos.', 1000, '1474347612.jpg', 'http://www.genbetadev.com/frameworks/kotlin-desde-el-punto-de-vista-de-un-desarrollador-groovy', 'visible', '2016-09-20 05:00:12'),
(24, 'COD1474347622', 'Google Fuchsia: quÃ© es, quÃ© no es, y quÃ© se puede esperar del nuevo sistema operativo de Google', '\r\nEl nombre de Google Fuchsia ha estado resonando durante los Ãºltimos dÃ­as en toda la red. EmpezÃ³ siendo una pequeÃ±a curiosidad encontrada en los repositorios de la empresa del buscador, pero el sÃ³lo imaginar las implicaciones que podrÃ­a tener el proyecto a largo plazo ha hecho que todos queramos saber mÃ¡s sobre Ã©l cuanto antes.', 100000, '1474347650.jpg', 'http://www.xataka.com/aplicaciones/google-fuchsia-que-es-que-no-es-y-que-se-puede-esperar-del-nuevo-sistema-operativo-de-google', 'visible', '2016-09-20 05:00:51'),
(46, 'COD1474513360.jpg', 'hola', 'hola', 0, '1474513360.jpg', 'http://www.genbetadev.com/metodologias-de-programacion/trabajando-con-codigo-legacy-sprout-methods', 'visible', '2016-09-22 03:02:40'),
(47, 'COD1474611758.jpg', 'jose', 'jose', 100000, '1474611758.jpg', 'http://www.desarrolloweb.com/faq/donde-esta-phpini.html', 'visible', '2016-09-23 06:22:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_cotizacion`
--

CREATE TABLE `tmp_cotizacion` (
  `id_tmp_cotizacion` int(11) UNSIGNED NOT NULL,
  `cod_cotizacion_tmp` varchar(1000) DEFAULT NULL,
  `id_producto` varchar(1000) DEFAULT NULL,
  `cantidad_tmp` varchar(1000) DEFAULT NULL,
  `precio_tmp` varchar(1000) DEFAULT NULL,
  `id_vendedor_tmp` varchar(1000) DEFAULT NULL,
  `descripcion_tmp` varchar(1000) DEFAULT NULL,
  `session_id` varchar(1000) DEFAULT NULL,
  `fecha_creacion_cotizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmp_cotizacion`
--

INSERT INTO `tmp_cotizacion` (`id_tmp_cotizacion`, `cod_cotizacion_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `id_vendedor_tmp`, `descripcion_tmp`, `session_id`, `fecha_creacion_cotizacion`) VALUES
(67, NULL, '15', '1', '100000', NULL, NULL, 'of642npfetlh76ip7f6ka5r6d1', '2016-09-23 05:23:44'),
(68, NULL, '14', '1', '1000', NULL, NULL, '319ldhnmnocjp7m16a2c79b444', '2016-09-23 06:21:07'),
(69, NULL, '14', '1', '1000', NULL, NULL, '319ldhnmnocjp7m16a2c79b444', '2016-09-23 06:21:08'),
(70, NULL, '14', '1', '1000', NULL, NULL, '319ldhnmnocjp7m16a2c79b444', '2016-09-23 06:21:09'),
(71, NULL, '16', '1', '1000000000', NULL, NULL, '319ldhnmnocjp7m16a2c79b444', '2016-09-23 06:21:25'),
(72, NULL, '14', '1', '1000', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 14:39:35'),
(73, NULL, '16', '1', '1000000000', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 14:39:37'),
(74, NULL, '18', '1', '1000000000', NULL, NULL, 'mg42udtglnf7isjluoddh8afr6', '2016-09-23 19:37:38'),
(75, NULL, '16', '1', '1000000000', NULL, NULL, 'mg42udtglnf7isjluoddh8afr6', '2016-09-23 19:37:42'),
(76, NULL, '14', '1', '1000', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 22:17:28'),
(77, NULL, '15', '1', '100000', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 22:17:29'),
(78, NULL, '16', '1', '1000000000', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 22:17:30'),
(79, NULL, '17', '1', '2147483647', NULL, NULL, '84o21imp4h2129e6qkbouo9oq0', '2016-09-23 22:17:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) UNSIGNED NOT NULL,
  `nombre_vendedor` varchar(1000) NOT NULL,
  `apellidos_vendedor` varchar(1000) DEFAULT NULL,
  `email_vendedor` varchar(1000) DEFAULT NULL,
  `usuario_vendedor` varchar(1000) DEFAULT NULL,
  `clave_vendedor` varchar(1000) DEFAULT NULL,
  `comision_vendedor` varchar(1000) DEFAULT NULL,
  `permisos` varchar(100) NOT NULL,
  `fecha_registro_vendedor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nombre_vendedor`, `apellidos_vendedor`, `email_vendedor`, `usuario_vendedor`, `clave_vendedor`, `comision_vendedor`, `permisos`, `fecha_registro_vendedor`) VALUES
(2, 'junior', 'admin', 'admin@admin.com', 'admin', 'admin', '100', '', '2016-09-17 05:28:26'),
(10, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', '100', 'admin', '2016-09-22 00:40:15'),
(11, 'junior', 'junior', 'junior@junior.com', 'junior', 'junior', '90', 'basico', '2016-09-22 00:40:15'),
(12, 'jose', 'jose', 'jose@jose.com', 'jose', 'jose', '80', 'admin', '2016-09-22 00:40:15'),
(13, 'jesus', 'jesus', 'jesus@jesus.com', 'jesus', 'jesus', '90', 'basico', '2016-09-22 00:40:15'),
(14, 'carlos', 'carlos', 'carlos@carlos.com', 'carlos', 'carlos', '80', 'basico', '2016-09-22 00:40:15'),
(15, 'omar', 'omar', 'omar@omar.com', 'omar', 'omar', '70', 'admin', '2016-09-22 00:40:15'),
(16, 'jean', 'jean', 'jean@jean.com', 'jean', 'jean', '90', 'admin', '2016-09-22 00:40:15'),
(17, 'jean', 'junior', 'junior@junior.com', 'junior', 'junior', '90', 'basico', '2016-09-22 00:40:15'),
(18, 'cata', 'cata', 'cata@cata.com', 'cata', 'cata', '30', 'basico', '2016-09-22 00:40:15'),
(19, 'orlando', 'orlando', 'orlando@orlando.com', 'orlando', 'orlando', '10', 'basico', '2016-09-22 00:40:15'),
(20, 'anicia', 'anicia', 'anicia@anicia.com', 'anicia', 'anicia', '100', 'basico', '2016-09-22 00:40:15'),
(21, 'yorbis', 'yorbis', 'yorbis@yorbis.com', 'yorbis', 'yorbis', '90', 'basico', '2016-09-22 00:40:15'),
(22, 'admid_junior', 'rojas', 'ad@admin', 'sasasas', '12345679', '20', 'admin', '2016-09-22 03:03:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `id_cotizacion` (`id_cotizacion`);

--
-- Indices de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD PRIMARY KEY (`id_detalle_cotizacion`),
  ADD KEY `id_detalle_cotizacion` (`id_detalle_cotizacion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  ADD PRIMARY KEY (`id_tmp_cotizacion`),
  ADD KEY `id_tmp_cotizacion` (`id_tmp_cotizacion`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  MODIFY `id_detalle_cotizacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `tmp_cotizacion`
--
ALTER TABLE `tmp_cotizacion`
  MODIFY `id_tmp_cotizacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
