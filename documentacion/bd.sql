-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 03:04:59
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
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `ruta`, `fecha`, `user_id`) VALUES
(37, 'cabecera.jpg.jpg', '2019-05-07 03:13:11', 128),
(38, 'perfil.png', '2019-05-07 03:13:11', 128),
(39, '15344206335212.png', '2019-05-07 03:13:11', 128),
(40, '15570468265ccea62a134c77.07140393.png', '2019-05-07 14:08:10', 128),
(41, 'WhatsApp Image 2019-05-04 at 11.45.51.jpeg', '2019-05-08 02:10:09', 129);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `texto` text,
  `fecha` datetime NOT NULL,
  `creator_id` int(11) NOT NULL,
  `pdf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `texto`, `fecha`, `creator_id`, `pdf`) VALUES
(2, 'ads', '0000-00-00 00:00:00', 121, 0),
(5, 'Estoy probando a editar ', '2019-05-04 08:49:20', 128, 0),
(6, 'asd', '2019-05-07 13:12:51', 128, 1),
(7, 'Probando a crear un tag con fancy', '2019-05-07 13:15:46', 121, 1),
(8, 'alsidhadhlasd', '2019-05-07 18:34:18', 128, 1),
(9, 'asd', '2019-05-08 02:29:45', 128, 1);

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
  `descripcion` text,
  `authKey` varchar(250) DEFAULT NULL,
  `accessToken` varchar(250) DEFAULT NULL,
  `activate` tinyint(1) DEFAULT NULL,
  `centerCode` int(10) NOT NULL,
  `img_perfil` varchar(255) DEFAULT NULL,
  `img_cabecera` varchar(255) DEFAULT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `hobbies` text,
  `films` text,
  `music` text,
  `privado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `rol`, `name`, `email`, `birthday`, `descripcion`, `authKey`, `accessToken`, `activate`, `centerCode`, `img_perfil`, `img_cabecera`, `facebook`, `twitter`, `hobbies`, `films`, `music`, `privado`) VALUES
(121, 'admin', 'fsPZnsdpMIWNQ', 1, 'Alfredo Admin', 'admin@admin.com', '2019-05-05', '', 'c4e9ae3fcd89eeef986cef3f8e54bbaab751714e33e539ccb64d1d362ca6fece2217cdc2d19f38b8785f6dd54302ab23207c0de4ff50da12c3c3ca73f26f0c8aab0b310e56c08abc31fa6354ed0db0a006219a0030dcc12eabc5de0bb466b0bbba08', 'f38f8c16d4bce3e79a76980a657a296b02ce02e98a927fb8479f243e83847e767da80f52eef1cf77e7791b7fd8ff7e5935b15faf68de0ccbcce53d9c1daac0fca6629a94a957c46337f08a088e37434698ad623a914f39c50f9991282a8c35b1032887', 1, 2, '/img/121/15570547745ccec5360bcd07.59740587.png', '/img/121/15570547865ccec542b74f45.14487921.jpg', '', '', NULL, NULL, NULL, 1),
(128, 'alfredo', 'fs9diRKEGnxgA', 0, 'Alfredo', 'alfredofauramolina@gmail.com', '1994-06-04', 'I like to ride the bike to work, swimming, and working out. I also like reading design magazines, go to museums, and binge watching a good tv show while it’s raining outside.', 'c4e9ae3fcd89eeef986cef3f8eef3954bbaab751714e33e539ccb64d1d362ca6fece2217cdc2d19f38b8785f6dd54302ab23207c0de4ff50da12c3c3ca73f26f0c8aab0b310e56c08abc31fa6354ed0db0a006219a0030dcc12eabc5de0bb466b0bbba08', 'f38f8c16d4bce3e79a76980a657a296b02ce02e98a927fb8479f243e83847e767da80f52eef1cf77e7791b7fd8ff7e5935b15faf68de0ccbcce53d9c1daac0fca6629a94a957c46337f08a088e37434698ad623a914f39c50f9991282a8c35b10328878a', 1, 2, '/img/128/15570468265ccea62a134c77.07140393.png', '/img/128/15570468315ccea62f830594.40415758.jpg', 'https://www.facebook.com/alfredo.faura', 'https://twitter.com/Alfredo_Faura', 'Prueba2', 'Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.', 'Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.', 0),
(129, 'LittleBlue', 'fsa6DonW/Rvko', 0, 'Priscyla Almarcha', 'priscylaalmarcha@gmail.com', '1997-12-10', NULL, 'ef3497244f4c98a7ce2182b08c59239f39139204be9e078adc1df93399b90295c0626e61655a71fbda2fdd52c7b180ced4c26c1b38c3595925c316257874cb1df57f794a7269db8b29eb2157a7ffa660cd8015641d46577b184a826e9cd7a534cef45c9d', '35b4cb0ebd9b92861de9f9142b081364e80c0cf6e422f38c6afc84f4c2a60191196f1e247298adc1f65e42a2479add710c4445d20e193bf6d36c22f8671759b516323e6316b029fe4b8178d3a6bcf5f555ad9755a9b01f4039c517fca6b86c9b612d3987', 1, 2, NULL, NULL, 'https://www.facebook.com/priscyla.almarchagarcia', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_block_other`
--

CREATE TABLE `user_block_other` (
  `user_id` int(11) NOT NULL,
  `blocked_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_friend`
--

CREATE TABLE `user_has_friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_has_friend`
--

INSERT INTO `user_has_friend` (`user_id`, `friend_id`) VALUES
(121, 128),
(128, 121),
(128, 129),
(129, 128);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_request`
--

CREATE TABLE `user_has_request` (
  `uid_ori` int(11) NOT NULL,
  `uid_dest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_tag`
--

CREATE TABLE `user_has_tag` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_has_tag`
--

INSERT INTO `user_has_tag` (`tag_id`, `user_id`) VALUES
(2, 121),
(5, 121),
(5, 128),
(6, 128),
(7, 121),
(7, 128),
(8, 128),
(8, 129),
(9, 128);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_like_tag`
--

CREATE TABLE `user_like_tag` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_like_tag`
--

INSERT INTO `user_like_tag` (`tag_id`, `user_id`) VALUES
(5, 121),
(5, 128),
(8, 128),
(8, 129),
(9, 128);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_user_center_idx` (`centerCode`);

--
-- Indices de la tabla `user_block_other`
--
ALTER TABLE `user_block_other`
  ADD PRIMARY KEY (`user_id`,`blocked_id`);

--
-- Indices de la tabla `user_has_friend`
--
ALTER TABLE `user_has_friend`
  ADD PRIMARY KEY (`user_id`,`friend_id`);

--
-- Indices de la tabla `user_has_request`
--
ALTER TABLE `user_has_request`
  ADD PRIMARY KEY (`uid_ori`,`uid_dest`),
  ADD KEY `uid_dest` (`uid_dest`);

--
-- Indices de la tabla `user_has_tag`
--
ALTER TABLE `user_has_tag`
  ADD PRIMARY KEY (`tag_id`,`user_id`),
  ADD KEY `tag_has_user_ibfk_2` (`user_id`),
  ADD KEY `tag_has_user_ibfk_3` (`tag_id`) USING BTREE;

--
-- Indices de la tabla `user_like_tag`
--
ALTER TABLE `user_like_tag`
  ADD PRIMARY KEY (`tag_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `center`
--
ALTER TABLE `center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_center` FOREIGN KEY (`centerCode`) REFERENCES `center` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_block_other`
--
ALTER TABLE `user_block_other`
  ADD CONSTRAINT `user_block_other_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_has_friend`
--
ALTER TABLE `user_has_friend`
  ADD CONSTRAINT `user_has_friend_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_has_request`
--
ALTER TABLE `user_has_request`
  ADD CONSTRAINT `user_has_request_ibfk_1` FOREIGN KEY (`uid_dest`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_has_tag`
--
ALTER TABLE `user_has_tag`
  ADD CONSTRAINT `user_has_tag_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_like_tag`
--
ALTER TABLE `user_like_tag`
  ADD CONSTRAINT `user_like_tag_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
