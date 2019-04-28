-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2019 a las 01:21:57
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
-- Base de datos: `ttproyecto`
--
CREATE DATABASE IF NOT EXISTS `ttproyecto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ttproyecto`;

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
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `texto` text,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `texto`, `fecha`) VALUES
(2, 'ads', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_has_user`
--

CREATE TABLE `tag_has_user` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag_has_user`
--

INSERT INTO `tag_has_user` (`tag_id`, `user_id`) VALUES
(3, 121);

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
  `authKey` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `activate` tinyint(1) DEFAULT NULL,
  `centerCode` int(10) NOT NULL,
  `img_perfil` varchar(255) DEFAULT NULL,
  `img_cabecera` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rol`, `name`, `email`, `birthday`, `descripcion`, `authKey`, `accessToken`, `activate`, `centerCode`, `img_perfil`, `img_cabecera`) VALUES
(121, 'admin', 'fsPZnsdpMIWNQ', 1, 'admin', 'admin@admin.com', '0000-00-00', '', 'c4e9ae3fcd89eeef986cef3f8e54bbaab751714e33e539ccb64d1d362ca6fece2217cdc2d19f38b8785f6dd54302ab23207c0de4ff50da12c3c3ca73f26f0c8aab0b310e56c08abc31fa6354ed0db0a006219a0030dcc12eabc5de0bb466b0bbba08', 'f38f8c16d4bce3e79a76980a657a296b02ce02e98a927fb8479f243e83847e767da80f52eef1cf77e7791b7fd8ff7e5935b15faf68de0ccbcce53d9c1daac0fca6629a94a957c46337f08a088e37434698ad623a914f39c50f9991282a8c35b1032887', 1, 2, NULL, NULL),
(128, 'alfredo', 'fs9diRKEGnxgA', 0, 'alfredo', 'alfredofauramolina@gmail.com', '0000-00-00', NULL, 'c4e9ae3fcd89eeef986cef3f8eef3954bbaab751714e33e539ccb64d1d362ca6fece2217cdc2d19f38b8785f6dd54302ab23207c0de4ff50da12c3c3ca73f26f0c8aab0b310e56c08abc31fa6354ed0db0a006219a0030dcc12eabc5de0bb466b0bbba08', 'f38f8c16d4bce3e79a76980a657a296b02ce02e98a927fb8479f243e83847e767da80f52eef1cf77e7791b7fd8ff7e5935b15faf68de0ccbcce53d9c1daac0fca6629a94a957c46337f08a088e37434698ad623a914f39c50f9991282a8c35b10328878a', 1, 2, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_has_user`
--
ALTER TABLE `tag_has_user`
  ADD PRIMARY KEY (`tag_id`,`user_id`),
  ADD KEY `tag_has_user_ibfk_2` (`user_id`),
  ADD KEY `tag_has_user_ibfk_3` (`tag_id`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_center_idx` (`centerCode`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `center`
--
ALTER TABLE `center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tag_has_user`
--
ALTER TABLE `tag_has_user`
  ADD CONSTRAINT `tag_has_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_center` FOREIGN KEY (`centerCode`) REFERENCES `center` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
