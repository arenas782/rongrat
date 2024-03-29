-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2019 a las 17:47:40
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inv_rongrat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaquetado`
--

CREATE TABLE `empaquetado` (
  `id` int(11) NOT NULL,
  `pernil` double NOT NULL DEFAULT '0',
  `p_pernil` double DEFAULT NULL,
  `paleta` double NOT NULL DEFAULT '0',
  `p_paleta` double DEFAULT NULL,
  `peine` double NOT NULL DEFAULT '0',
  `p_peine` double DEFAULT NULL,
  `costilla` double NOT NULL DEFAULT '0',
  `p_costilla` double DEFAULT NULL,
  `nro_piezas` double NOT NULL DEFAULT '0',
  `nro_cerdos` double NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empaquetado`
--

INSERT INTO `empaquetado` (`id`, `pernil`, `p_pernil`, `paleta`, `p_paleta`, `peine`, `p_peine`, `costilla`, `p_costilla`, `nro_piezas`, `nro_cerdos`, `fecha`, `created_at`) VALUES
(2, 100, NULL, 100, NULL, 0.5, NULL, 0.5, NULL, 100.5, 90.05, '2019-09-23', '2019-09-24 00:15:57'),
(3, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, '2019-10-08', '2019-10-08 23:25:52'),
(4, 113, 8, 124, 9, 42, 8, 22, 9, 55, 12, '2019-10-09', '2019-10-09 15:38:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_salida_insumos`
--

CREATE TABLE `entrada_salida_insumos` (
  `id` int(11) NOT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `id_insumo` int(11) NOT NULL,
  `tipo_operacion` varchar(1) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` double NOT NULL,
  `total` double NOT NULL,
  `stock` double DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_salida_productos`
--

CREATE TABLE `entrada_salida_productos` (
  `id` int(11) NOT NULL,
  `nro_documento` varchar(50) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  `tipo_operacion` varchar(1) NOT NULL,
  `cantidad` double NOT NULL,
  `monto` double NOT NULL,
  `total` double NOT NULL,
  `stock` double NOT NULL,
  `valor` double DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrada_salida_productos`
--

INSERT INTO `entrada_salida_productos` (`id`, `nro_documento`, `id_producto`, `tipo_operacion`, `cantidad`, `monto`, `total`, `stock`, `valor`, `fecha`, `created_at`) VALUES
(1, '', 4, 's', 12, 24500, 294000, 288, NULL, '2019-09-16 01:55:25', '2019-09-16 05:55:27'),
(2, 'fac-1212', 2, 's', 2, 67000, 134000, 1.5, NULL, '2019-09-16 15:26:31', '2019-09-16 19:26:34'),
(3, '', 4, 'e', 12, 19800, 237600, 300, NULL, '2019-09-16 17:04:04', '2019-09-16 21:04:06'),
(10, '', 5, 's', 10, 30000, 300000, 19990, 39700000, '2019-09-16 19:04:27', '2019-09-16 23:04:28'),
(11, '', 6, 's', 500, 70000, 35000000, 9500, 165000000, '2019-09-21 16:38:40', '2019-09-21 20:38:42'),
(12, '', 6, 'e', 20, 40000, 800000, 9520, 165800000, '2019-09-22 21:51:33', '2019-09-23 01:51:34'),
(13, '', 6, 's', 500, 70000, 35000000, 9020, 130800000, '2019-09-22 21:52:18', '2019-09-23 01:52:19'),
(14, '', 4, 's', 20, 24500, 490000, 290, 12010000, '2019-09-22 22:04:19', '2019-09-23 02:04:20'),
(15, '', 4, 's', 15, 24500, 367500, 275, 11642500, '2019-09-22 22:05:23', '2019-09-23 02:05:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_insumos`
--

CREATE TABLE `inv_insumos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `nombre` int(11) NOT NULL,
  `costo` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` double DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_productos`
--

CREATE TABLE `inv_productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `costo` double NOT NULL,
  `precio` double NOT NULL,
  `stock` double NOT NULL,
  `valor` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inv_productos`
--

INSERT INTO `inv_productos` (`id`, `codigo`, `nombre`, `costo`, `precio`, `stock`, `valor`, `created_at`) VALUES
(2, '2', 'Mortadela', 100000, 67000, 1.5, 10500, '2019-09-15 20:32:10'),
(4, '01212', 'Jamonada 900gr', 19800, 24500, 275, 11642500, '2019-09-16 05:54:40'),
(5, '4312', 'Tocineta', 18000, 30000, 19990, 39700000, '2019-09-16 19:43:56'),
(6, '12042', 'Huevos', 40000, 70000, 9020, 130800000, '2019-09-21 20:37:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `telefono`, `password`, `created_at`) VALUES
(1, 'Javier Rondón', 'rongrat', 'j.rondon@gmail.com', '0424-4985263', '4b7d092c2b69755737febdc0d2739a892c28541ce65e5f0bfc1e4bb5c506ef0b76bc23db0cef26cf3edeac844a0b022ad71b6a24cd0a4c33a877f8921c7635e4kKaejkWILr3V4yynzpjPpwae6C8ssF9ZO9jfFJNGYac=', '2019-09-21 20:16:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empaquetado`
--
ALTER TABLE `empaquetado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada_salida_insumos`
--
ALTER TABLE `entrada_salida_insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada_salida_productos`
--
ALTER TABLE `entrada_salida_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_insumos`
--
ALTER TABLE `inv_insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_productos`
--
ALTER TABLE `inv_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empaquetado`
--
ALTER TABLE `empaquetado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrada_salida_insumos`
--
ALTER TABLE `entrada_salida_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrada_salida_productos`
--
ALTER TABLE `entrada_salida_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `inv_insumos`
--
ALTER TABLE `inv_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_productos`
--
ALTER TABLE `inv_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
