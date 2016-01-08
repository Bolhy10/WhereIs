-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-11-2015 a las 06:38:49
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whereis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(3) NOT NULL,
  `Username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Last_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `role_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo_placesWis`
--

CREATE TABLE IF NOT EXISTS `photo_placesWis` (
  `id` int(3) NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `url_photo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_photo_places` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo_user_Wis`
--

CREATE TABLE IF NOT EXISTS `photo_user_Wis` (
  `id` int(3) NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `url_photo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `photo` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `photo_user_Wis`
--

INSERT INTO `photo_user_Wis` (`id`, `username`, `url_photo`, `photo`) VALUES
(1, '25', 'images/userwhereis/terminator10/mifoto.jpg', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placesWis`
--

CREATE TABLE IF NOT EXISTS `placesWis` (
  `id` int(3) NOT NULL,
  `Places` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `schedule` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `photo_placesWis` int(3) NOT NULL,
  `id_placesWis` int(3) NOT NULL,
  `id_proWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinceWis`
--

CREATE TABLE IF NOT EXISTS `provinceWis` (
  `id` int(3) NOT NULL,
  `province` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_proWis` int(3) NOT NULL,
  `id_tradeWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_administrator`
--

CREATE TABLE IF NOT EXISTS `roles_administrator` (
  `id` int(11) NOT NULL,
  `type_role` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tradeWis`
--

CREATE TABLE IF NOT EXISTS `tradeWis` (
  `id` int(3) NOT NULL,
  `local` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_coWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_Wis`
--

CREATE TABLE IF NOT EXISTS `user_Wis` (
  `id` int(3) NOT NULL,
  `Username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `you_lives` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `socialmedia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `about_me` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_Wis`
--

INSERT INTO `user_Wis` (`id`, `Username`, `email`, `password`, `you_lives`, `photo`, `socialmedia`, `about_me`) VALUES
(1, 'Bolhy10', 'bolhy10@hotmail.com', '123456', '', '', '', ''),
(13, 'rey', 'rey10@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', ''),
(16, 'vivi', 'viviana@gmail.com', '9f8e8ed4a01ed7432b9394d627922ae3bb0a4fbe', '', '', '', ''),
(25, 'terminator10', 'terminator@whereis.com', '879d4af1eba734b18672098bb6908ec5e217b3ee', 'La Doña', '25', '@terminator10', 'Me gusta la programacion, cada dia se aprende mas acerca de distintas cosas en el area informatico.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `photo_placesWis`
--
ALTER TABLE `photo_placesWis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img` (`id_photo_places`);

--
-- Indices de la tabla `photo_user_Wis`
--
ALTER TABLE `photo_user_Wis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `PHOTO` (`photo`);

--
-- Indices de la tabla `placesWis`
--
ALTER TABLE `placesWis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proWis` (`id_proWis`),
  ADD KEY `id_placesWis` (`id_placesWis`),
  ADD KEY `photo_placesWis` (`photo_placesWis`);

--
-- Indices de la tabla `provinceWis`
--
ALTER TABLE `provinceWis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prowis` (`id_proWis`),
  ADD KEY `tradeWis` (`id_tradeWis`);

--
-- Indices de la tabla `roles_administrator`
--
ALTER TABLE `roles_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tradeWis`
--
ALTER TABLE `tradeWis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comercio` (`id_coWis`);

--
-- Indices de la tabla `user_Wis`
--
ALTER TABLE `user_Wis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`you_lives`),
  ADD KEY `imagesUser` (`photo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `photo_placesWis`
--
ALTER TABLE `photo_placesWis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `photo_user_Wis`
--
ALTER TABLE `photo_user_Wis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `placesWis`
--
ALTER TABLE `placesWis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provinceWis`
--
ALTER TABLE `provinceWis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles_administrator`
--
ALTER TABLE `roles_administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tradeWis`
--
ALTER TABLE `tradeWis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user_Wis`
--
ALTER TABLE `user_Wis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles_administrator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `placesWis`
--
ALTER TABLE `placesWis`
  ADD CONSTRAINT `photoplaces` FOREIGN KEY (`photo_placesWis`) REFERENCES `photo_placesWis` (`id_photo_places`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places` FOREIGN KEY (`id_proWis`) REFERENCES `provinceWis` (`id_proWis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tradeWis`
--
ALTER TABLE `tradeWis`
  ADD CONSTRAINT `trade` FOREIGN KEY (`id_coWis`) REFERENCES `provinceWis` (`id_tradeWis`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
