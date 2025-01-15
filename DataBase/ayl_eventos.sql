-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2021 a las 03:38:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ayl_eventos`
--
CREATE DATABASE IF NOT EXISTS `ayl_eventos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ayl_eventos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id` int(11) NOT NULL,
  `cantVariedades` int(11) NOT NULL,
  `cantEntradas` int(11) NOT NULL,
  `cantEntradasEspeciales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`id`, `cantVariedades`, `cantEntradas`, `cantEntradasEspeciales`) VALUES
(1, 8, 0, 0),
(2, 10, 1, 0),
(3, 12, 2, 0),
(4, 14, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `comentario` text NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `titulo`, `comentario`, `nombre`, `fecha`) VALUES
(2, 'Excelente', 'Muy buen servicio.', 'Agustin', '0000-00-00'),
(3, 'Excelente', 'Muy buen servicio.', 'Agustin', '0000-00-00'),
(4, 'Muy bueno', 'comentariocomentariocomentario', 'Carlos', '2021-09-07'),
(5, 'Excelente!!!', 'Espectacular todo!! cumpleaños para 60 chicos!! muy buen precioso por la calidad y calidez del servicio!! muy recomendable!! gracias!!!!', 'Laura', '2020-10-10'),
(6, 'askmdkask', 'kdfakafsdpkapfk1', 'Juan', '2021-09-10'),
(7, 'fafsda', 'sadasdsda', 'RODRIGO', '2021-09-21'),
(8, 'gfdsdfsgsfgd', 'fgdfgdsfdgfgds', 'Karina', '2021-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(1) NOT NULL,
  `entrada` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `entrada`) VALUES
(1, 'Empanadas'),
(2, 'Canastitas'),
(3, 'Chips de Jamón y Queso'),
(4, 'Medialunas de Jamón y Queso'),
(5, 'Salchichitas Envueltas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradasespeciales`
--

CREATE TABLE `entradasespeciales` (
  `id` int(11) NOT NULL,
  `entradaEspecial` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entradasespeciales`
--

INSERT INTO `entradasespeciales` (`id`, `entradaEspecial`) VALUES
(1, 'Sandwiches de Matambre'),
(2, 'Sandwiches de Vitel Toné'),
(3, 'Arrollado de Pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `seccion_imagen` varchar(45) DEFAULT NULL,
  `URL_imagen` varchar(120) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `seccion_imagen`, `URL_imagen`, `descripcion`) VALUES
(1, 'Noticias', 'assets/img/Noticias/FamososNoticia.jpg', 'Con Pablo Giralt y el pelado Lopez!!'),
(2, 'Noticias', 'assets/img/Noticias/JugadoresNoticia1.jpg', 'Con Hernán Crespo y el turco Husain!!'),
(3, 'Noticias', 'assets/img/Noticias/JugadoresNoticia2.jpg', 'Con Eduardo Tuzzio, Leo Rodriguez y Santiago Ladino!!'),
(4, 'Noticias', 'assets/img/Noticias/img1_mejorada.jpg', 'Con CAE!!'),
(5, 'Variedades', 'assets/img/Variedades/Pizzas1.jpg', ''),
(6, 'Variedades', 'assets/img/Variedades/Pizzas2.jpg', ''),
(7, 'Variedades', 'assets/img/Variedades/Pizzas3.jpg', ''),
(8, 'Variedades', 'assets/img/Variedades/Pizzas4.jpg', ''),
(9, 'Variedades', 'assets/img/Variedades/Pizzas5.jpg', ''),
(10, 'Variedades', 'assets/img/Variedades/Pizzas6.jpg', ''),
(11, 'Variedades', 'assets/img/Variedades/Pizzas8.jpg', ''),
(12, 'Variedades', 'assets/img/Variedades/Pizzas9.jpg', ''),
(13, 'Variedades', 'assets/img/Variedades/Pizzas10.jpg', ''),
(14, 'Variedades', 'assets/img/Variedades/Pizzas11.jpg', ''),
(15, 'Variedades', 'assets/img/Variedades/Pizzas12.jpg', ''),
(16, 'Variedades', 'assets/img/Variedades/Pizzas13.jpg', ''),
(17, 'Entradas', 'assets/img/Entradas/Entradas1.jpg', ''),
(18, 'Entradas', 'assets/img/Entradas/Entradas2.jpg', ''),
(19, 'Entradas', 'assets/img/Entradas/Entradas3.jpg', ''),
(20, 'Entradas', 'assets/img/Entradas/Entradas4.jpg', ''),
(21, 'Entradas', 'assets/img/Entradas/Entradas5.jpg', ''),
(22, 'Entradas', 'assets/img/Entradas/Entradas6.jpg', ''),
(23, 'Entradas', 'assets/img/Entradas/Entradas7.jpg', ''),
(24, 'Entradas', 'assets/img/Entradas/Entradas8.jpg', ''),
(25, 'Entradas', 'assets/img/Entradas/Entradas9.jpg', ''),
(26, 'Entradas', 'assets/img/Entradas/Entradas10.jpg', NULL),
(27, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales1.jpg', ''),
(28, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales2.jpg', ''),
(29, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales3.jpg', ''),
(30, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales4.jpg', ''),
(31, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales5.jpg', ''),
(32, 'EntradasEspeciales', 'assets/img/EntradasEspeciales/Especiales6.jpg', ''),
(33, 'Famosos', 'assets/img/Galeria/Famosos1_auto_x2.jpg', ''),
(34, 'Famosos', 'assets/img/Galeria/Famosos2.jpg', ''),
(35, 'Famosos', 'assets/img/Galeria/Famosos3.jpg', ''),
(36, 'Famosos', 'assets/img/Galeria/Famosos4.jpg', ''),
(37, 'Famosos', 'assets/img/Galeria/Famosos5_auto_x2.jpg', ''),
(38, 'Famosos', 'assets/img/Galeria/Famosos6.jpg', ''),
(39, 'Famosos', 'assets/img/Galeria/Famosos7.jpg', ''),
(40, 'Famosos', 'assets/img/Galeria/Famosos8_auto_x2.jpg', ''),
(41, 'Famosos', 'assets/img/Galeria/Famosos9.jpg', ''),
(42, 'Produccion', 'assets/img/Galeria/Produccion1.jpg', ''),
(43, 'Produccion', 'assets/img/Galeria/Produccion2.jpg', ''),
(44, 'Produccion', 'assets/img/Galeria/Produccion3.jpg', ''),
(45, 'Produccion', 'assets/img/Galeria/Produccion4.jpg', ''),
(46, 'Produccion', 'assets/img/Galeria/Produccion5.jpg', ''),
(47, 'Produccion', 'assets/img/Galeria/Produccion6.jpg', ''),
(48, 'Produccion', 'assets/img/Galeria/Produccion7.jpg', ''),
(49, 'Produccion', 'assets/img/Galeria/Produccion8.jpg', ''),
(50, 'Produccion', 'assets/img/Galeria/Produccion9.jpg', ''),
(51, 'Produccion', 'assets/img/Galeria/Produccion10.jpg', ''),
(52, 'Produccion', 'assets/img/Galeria/Produccion11.jpg', ''),
(53, 'Produccion', 'assets/img/Galeria/Produccion12.jpg', ''),
(54, 'Produccion', 'assets/img/Galeria/Produccion13.jpg', ''),
(55, 'Produccion', 'assets/img/Galeria/Produccion14.jpg', ''),
(56, 'Produccion', 'assets/img/Galeria/Produccion15.jpg', NULL),
(57, 'Produccion', 'assets/img/Galeria/Produccion16.jpg', NULL),
(58, 'Produccion', 'assets/img/Galeria/Produccion17.jpg', NULL),
(59, 'Produccion', 'assets/img/Galeria/Produccion18.jpg', NULL),
(60, 'Produccion', 'assets/img/Galeria/Produccion19.jpg', NULL),
(61, 'Produccion', 'assets/img/Galeria/Produccion20.jpg', NULL),
(62, 'Eventos', 'assets/img/Galeria/Eventos1.jpg', ''),
(63, 'Eventos', 'assets/img/Galeria/Eventos2.jpg', ''),
(65, 'Eventos', 'assets/img/Galeria/Eventos4.jpg', ''),
(66, 'Eventos', 'assets/img/Galeria/Eventos5.jpg', ''),
(67, 'Eventos', 'assets/img/Galeria/Eventos6.jpg', ''),
(68, 'Eventos', 'assets/img/Galeria/Eventos7.jpg', ''),
(69, 'Eventos', 'assets/img/Galeria/Eventos8.jpg', ''),
(70, 'Eventos', 'assets/img/Galeria/Eventos9.jpg', ''),
(71, 'Eventos', 'assets/img/Galeria/Eventos10.jpg', ''),
(72, 'Eventos', 'assets/img/Galeria/Eventos11.jpg', ''),
(73, 'Eventos', 'assets/img/Galeria/Eventos12.jpg', ''),
(74, 'Eventos', 'assets/img/Galeria/Eventos13.jpg', ''),
(75, 'Eventos', 'assets/img/Galeria/Eventos14.jpg', ''),
(77, 'Eventos', 'assets/img/Galeria/Eventos16.jpg', ''),
(78, 'Eventos', 'assets/img/Galeria/Eventos17.jpg', ''),
(79, 'Eventos', 'assets/img/Galeria/Eventos18.jpg', ''),
(80, 'Eventos', 'assets/img/Galeria/Eventos19.jpg', ''),
(81, 'Eventos', 'assets/img/Galeria/Eventos20.jpg', ''),
(82, 'Eventos', 'assets/img/Galeria/Eventos21.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedades`
--

CREATE TABLE `variedades` (
  `id` int(11) NOT NULL,
  `variedad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `variedades`
--

INSERT INTO `variedades` (`id`, `variedad`) VALUES
(1, 'Mozzarella'),
(2, 'Napolitana'),
(3, 'Capresse'),
(4, 'Huevo'),
(5, 'Aceitunas'),
(6, 'Cantimpalo'),
(7, 'Jamón y Morrón'),
(8, 'Choclo'),
(9, 'Salchicha'),
(10, 'Papas Pay'),
(11, 'Fugazzeta'),
(12, 'Roquefort'),
(13, 'Rúcula'),
(14, 'Parmesano'),
(15, 'Anchoas'),
(16, 'Berenjenas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedadesextra`
--

CREATE TABLE `variedadesextra` (
  `id` int(11) NOT NULL,
  `variedadextra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `variedadesextra`
--

INSERT INTO `variedadesextra` (`id`, `variedadextra`) VALUES
(1, 'Palmito'),
(2, 'Jamón Crudo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradasespeciales`
--
ALTER TABLE `entradasespeciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `variedades`
--
ALTER TABLE `variedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `variedadesextra`
--
ALTER TABLE `variedadesextra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `entradasespeciales`
--
ALTER TABLE `entradasespeciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `variedades`
--
ALTER TABLE `variedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `variedadesextra`
--
ALTER TABLE `variedadesextra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
