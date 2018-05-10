-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-05-2018 a las 18:51:05
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tresenraya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `cells` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `boards`
--

INSERT INTO `boards` (`id`, `cells`) VALUES
(1, '[[0,0,\"O\"],[0,\"O\",\"X\"],[\"O\",0,\"X\"]]'),
(2, '[[0,\"X\",\"O\"],[\"O\",\"O\",\"O\"],[0,0,\"X\"]]'),
(3, '[[\"O\",\"O\",\"O\"],[\"X\",\"X\",0],[0,0,0]]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `player1_id` int(11) NOT NULL,
  `player2_id` int(11) NOT NULL,
  `player1_mark` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `player2_mark` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `board_id` int(11) NOT NULL,
  `timestamp` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `player1_id`, `player2_id`, `player1_mark`, `player2_mark`, `board_id`, `timestamp`) VALUES
(1, 1, 2, 'O', 'X', 1, '2018-05-08 18:48:45'),
(2, 1, 2, 'O', 'X', 2, '2018-05-08 18:49:30'),
(3, 2, 1, 'O', 'X', 3, '2018-05-08 18:49:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `score_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`id`, `name`, `score_id`) VALUES
(1, 'Manuel', 1),
(2, 'Carlos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `timestamp` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `scores`
--

INSERT INTO `scores` (`id`, `value`, `timestamp`) VALUES
(1, 10, '2018-05-08 18:49:39'),
(2, 5, '2018-05-08 18:49:58'),
(3, 0, '2018-05-08 18:48:50'),
(4, 0, '2018-05-08 18:48:50'),
(5, 0, '2018-05-08 18:48:51'),
(6, 0, '2018-05-08 18:48:51'),
(7, 0, '2018-05-08 18:48:54'),
(8, 0, '2018-05-08 18:48:54'),
(9, 0, '2018-05-08 18:48:55'),
(10, 0, '2018-05-08 18:48:55'),
(11, 0, '2018-05-08 18:48:56'),
(12, 0, '2018-05-08 18:48:56'),
(13, 0, '2018-05-08 18:49:29'),
(14, 0, '2018-05-08 18:49:29'),
(15, 0, '2018-05-08 18:49:33'),
(16, 0, '2018-05-08 18:49:33'),
(17, 0, '2018-05-08 18:49:33'),
(18, 0, '2018-05-08 18:49:33'),
(19, 0, '2018-05-08 18:49:35'),
(20, 0, '2018-05-08 18:49:35'),
(21, 0, '2018-05-08 18:49:36'),
(22, 0, '2018-05-08 18:49:36'),
(23, 0, '2018-05-08 18:49:38'),
(24, 0, '2018-05-08 18:49:38'),
(25, 0, '2018-05-08 18:49:39'),
(26, 0, '2018-05-08 18:49:39'),
(27, 0, '2018-05-08 18:49:51'),
(28, 0, '2018-05-08 18:49:51'),
(29, 0, '2018-05-08 18:49:53'),
(30, 0, '2018-05-08 18:49:53'),
(31, 0, '2018-05-08 18:49:54'),
(32, 0, '2018-05-08 18:49:55'),
(33, 0, '2018-05-08 18:49:56'),
(34, 0, '2018-05-08 18:49:56'),
(35, 0, '2018-05-08 18:49:57'),
(36, 0, '2018-05-08 18:49:57'),
(37, 0, '2018-05-08 18:49:58'),
(38, 0, '2018-05-08 18:49:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player1_id` (`player1_id`),
  ADD KEY `player2_id` (`player2_id`),
  ADD KEY `board_id` (`board_id`);

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score_id` (`score_id`);

--
-- Indices de la tabla `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`player1_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_2` FOREIGN KEY (`player2_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_ibfk_3` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`score_id`) REFERENCES `scores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
