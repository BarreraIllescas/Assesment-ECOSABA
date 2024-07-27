-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2024 a las 06:12:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pasteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingrediente`
--

CREATE TABLE `tb_ingrediente` (
  `id_ingrediete` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(128) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_ingrediente`
--

INSERT INTO `tb_ingrediente` (`id_ingrediete`, `nombre`, `descripcion`, `fecha_ingreso`, `fecha_vencimiento`, `created_at`, `updated_at`) VALUES
(1, 'Azúcar', 'Azúcar glass', '2024-07-09', '2024-10-09', '2024-07-25 20:29:02', '2024-07-25 20:29:02'),
(3, 'Mantequilla', 'Mantequilla en barra', '2024-07-03', '2024-07-25', '2024-07-26 19:26:13', '2024-07-26 19:26:13'),
(4, 'Chocolate', 'Chocolate en polvo', '2024-07-03', '2024-08-29', '2024-07-17 19:34:50', '2024-07-24 19:34:50'),
(5, 'Tableta de cacao', 'Chocolate en tableta', '2024-07-09', '2024-11-13', '2024-07-26 19:35:58', '2024-07-26 19:35:58'),
(6, 'Fresa', 'Fresas frescas', '2024-07-26', '2024-07-28', '2024-07-26 19:36:53', '2024-07-26 19:36:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pastel`
--

CREATE TABLE `tb_pastel` (
  `id_pastel` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(64) DEFAULT NULL,
  `preparado_por` int(8) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_pastel`
--

INSERT INTO `tb_pastel` (`id_pastel`, `nombre`, `descripcion`, `preparado_por`, `fecha_creacion`, `fecha_vencimiento`, `created_at`, `updated_at`) VALUES
(1, 'Chocolate', 'Pastel de chocolate con relleno de fresa', 1, '2024-07-24', '2024-07-31', '2024-07-24 20:56:57', '2024-07-24 20:56:57'),
(2, 'Fresas con crema', 'Pastel de crema chantillí con fresas', 3, '2024-07-17', '2024-07-24', '2024-07-24 21:09:38', '2024-07-24 21:09:38'),
(3, 'Coptel', 'Pastel de frutas con orilla de chocolate', 3, '2024-07-24', '2024-07-26', '2024-07-25 16:55:26', '2024-07-29 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pastel_ingrediente`
--

CREATE TABLE `tb_pastel_ingrediente` (
  `id_pastel` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_pastel_ingrediente`
--

INSERT INTO `tb_pastel_ingrediente` (`id_pastel`, `id_ingrediente`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 1),
(2, 6),
(1, 6),
(3, 6),
(3, 1),
(5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_ingrediente`
--
ALTER TABLE `tb_ingrediente`
  ADD PRIMARY KEY (`id_ingrediete`);

--
-- Indices de la tabla `tb_pastel`
--
ALTER TABLE `tb_pastel`
  ADD PRIMARY KEY (`id_pastel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_ingrediente`
--
ALTER TABLE `tb_ingrediente`
  MODIFY `id_ingrediete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_pastel`
--
ALTER TABLE `tb_pastel`
  MODIFY `id_pastel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
