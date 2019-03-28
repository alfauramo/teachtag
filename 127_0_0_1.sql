-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2019 a las 19:18:12
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teachtag`
--
CREATE DATABASE IF NOT EXISTS `teachtag` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teachtag`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `center`
--

CREATE TABLE `center` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `poblacion` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `centerCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `center`
--

INSERT INTO `center` (`id`, `nombre`, `poblacion`, `provincia`, `centerCode`) VALUES
(2, 'IES Macià Abela', 'Crevillent', 'Alacant', 'a1b2c3d4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `rol` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `centerCode` int(10) DEFAULT NULL,
  `authKey` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `activate` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rol`, `name`, `email`, `birthday`, `descripcion`, `centerCode`, `authKey`, `accessToken`, `activate`) VALUES
(121, 'admin', 'admin', 1, 'admin', 'admin@admin.com', '0000-00-00', '', 2, NULL, NULL, NULL),
(160, 'alfredo', 'fs9diRKEGnxgA', 0, 'alfredo', 'alfredofauramolina@gmail.com', '1994-06-04', NULL, 2, '45aae106f15e86f9eaa08eca3d885962c65d7929925e013c0f1c1b0c0b777f8e6ebbf15fb751f2516e3f787e3ee93ff1cfc75dcc9652d4f55d32222193faa0ef88968ff41f631606c0c8caf35aa2b80982742f2f6f65759aa9db1b8c1be4c32dbe5c8cc1', 'e2bd838b2736573220338966b1afd94aa994b4ab2c5b187c8e7ca247666caa8faa66b4f04535f6ac1ce6a0f1f7bbeba965e1a2702ffb27256f01530d369ebf704b1928e1c2455366072d8679559c77f68dcfa7967ca16e93ed66fb2bfbf5557546443770', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centerCode` (`centerCode`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `center`
--
ALTER TABLE `center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
