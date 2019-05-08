-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 01:26:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`, `mail`) VALUES
(1, 'admin', 'admin', 'admin@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `valoracion` int(2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_usu` int(20) NOT NULL,
  `fk_pro` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario`, `valoracion`, `fecha`, `fk_usu`, `fk_pro`) VALUES
('Muy sabrosa', 5, '2019-04-13 23:32:14', 1, 1),
('riquisimo', 4, '2019-04-13 22:38:18', 2, 1),
('muy rico', 4, '2019-04-15 18:58:24', 2, 2),
('Estupendo plato', 5, '2019-04-17 23:07:40', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(9) NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `foto` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `descripcion`, `foto`) VALUES
(1, 'sopa', 10, 'sopa de pollo', 'sopa.jpg'),
(2, 'estofado', 9, 'estofado de ternera', 'estofado.jpg'),
(3, 'cocido', 7, 'cocido madrileño', 'cocido.jpg'),
(4, 'lentejas', 7, 'potage de lentejas', 'lentejas.jpg'),
(5, 'croquetas', 7, 'croquetas de jamón', 'croquetas.jpg'),
(6, 'pisto', 7, 'pisto de verduras', 'pisto.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `edad` int(3) DEFAULT NULL,
  `descuento` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre`, `login`, `pass`, `correo`, `apellidos`, `edad`, `descuento`) VALUES
(1, 'pepe', 'pep', '', '', 'perez', 20, 23),
(2, 'pedro', 'perico', '1234', 'kkkk', 'perez', 23, 70),
(5, 'jose', 'jose', '1234', 'mmmm', 'lopez', 30, 13),
(6, 'paco', 'paco', '1234', 'paco', 'oya', 35, 33),
(7, 'lolo', 'lolo', '1234', 'lolo', 'lolo', 22, 44),
(8, 'kiko', 'kiko', '1234', 'kiko', 'perez', 56, 22),
(9, 'maria', 'maria', '1234', 'maria', 'moya', 34, 33),
(10, 'sec', 'sec', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'aaa', 'aec', 22, 33),
(11, 'sec1', 'sec1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'sss', 'sec', 22, 22),
(12, 'dolores', 'dolores', '1234', 'dolo@mail.com', 'perez', 23, 75);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`,`usuario`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`fk_usu`,`fk_pro`),
  ADD KEY `fk_usu` (`fk_usu`,`fk_pro`),
  ADD KEY `fk_pro` (`fk_pro`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`,`login`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `id_usu` (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`fk_usu`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`fk_pro`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
