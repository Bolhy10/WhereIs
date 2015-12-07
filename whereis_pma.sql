-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2015 a las 05:11:29
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `whereis_pma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
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
-- Estructura de tabla para la tabla `photo_placeswis`
--

CREATE TABLE `photo_placeswis` (
  `id` int(3) NOT NULL,
  `name_trade` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `carpeta` int(3) NOT NULL,
  `url_photo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_photo_places` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `photo_placeswis`
--

INSERT INTO `photo_placeswis` (`id`, `name_trade`, `carpeta`, `url_photo`, `id_photo_places`) VALUES
(26, '1', 100, 'images/comercio/100/super99_ladona.jpg', 2),
(27, '2', 100, 'images/comercio/100/macdonal_ladona.jpg', 2),
(28, '3', 100, 'images/comercio/100/kfc_ladona.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo_user_wis`
--

CREATE TABLE `photo_user_wis` (
  `id_photo` int(3) NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `photo` int(3) NOT NULL,
  `url_photo` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `photo_user_wis`
--

INSERT INTO `photo_user_wis` (`id_photo`, `username`, `photo`, `url_photo`) VALUES
(6, '7', 28, 'images/userwhereis/terminator10/Terminator-Genisys.jpg'),
(7, '8', 105, 'images/userwhereis/defecto/login_usuario.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE `places` (
  `id` int(3) NOT NULL,
  `places` varchar(200) NOT NULL,
  `places_photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `places`
--

INSERT INTO `places` (`id`, `places`, `places_photo`) VALUES
(1, 'Milla 8', 'images/places/milla8.png'),
(2, '24 de Diciembre', 'images/places/ladona.jpg'),
(3, 'Vía Veneto', 'images/places/viaveneto.jpg'),
(4, 'Dorado', 'images/places/eldorado.jpg'),
(5, 'Conquistador', ''),
(6, 'Marbella', ''),
(7, 'San Miguelito', ''),
(8, 'Albrook Mall', 'images/places/albrookmall.jpg'),
(9, 'Vía España', ''),
(10, 'Calle 50', ''),
(11, '12 de Octubre', ''),
(12, 'Calidonia', ''),
(13, 'Costa del Este', ''),
(14, 'Los Pueblos', ''),
(15, 'Las Acacias', ''),
(16, 'Ojo de Agua', ''),
(17, 'Los Andes', ''),
(18, 'Transismica', ''),
(20, 'San Francisco', ''),
(21, 'Brisas del Golf', ''),
(22, 'Casa Matriz', ''),
(23, 'Metro Mall', 'images/places/metromall.jpg'),
(24, 'Parque David', ''),
(25, 'Puerto Armuelle', ''),
(26, 'Boquete', ''),
(27, 'Dolequita', ''),
(28, 'Concepción', ''),
(29, 'No Asignado', 'images/places/noasignado.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principalwis`
--

CREATE TABLE `principalwis` (
  `id` int(3) NOT NULL,
  `tradewis` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `photo_placesWis` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `id_places` int(3) NOT NULL,
  `id_proWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `principalwis`
--

INSERT INTO `principalwis` (`id`, `tradewis`, `phone`, `horario`, `photo_placesWis`, `id_places`, `id_proWis`) VALUES
(9, '3', '3007708', '10:00 am - 10:00 pm', '28', 2, 8),
(12, '1', '323-8877.', '10:00 am - 11:00 pm', '26', 2, 8),
(15, '2', '323-8853', '10:00 am - 7:00 pm', '27', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincewis`
--

CREATE TABLE `provincewis` (
  `id` int(3) NOT NULL,
  `province` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_proWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provincewis`
--

INSERT INTO `provincewis` (`id`, `province`, `id_proWis`) VALUES
(9, 'Panamá', 8),
(10, 'Chiriquí', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_administrator`
--

CREATE TABLE `roles_administrator` (
  `id` int(11) NOT NULL,
  `type_role` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tradewis`
--

CREATE TABLE `tradewis` (
  `id` int(3) NOT NULL,
  `local` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_coWis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tradewis`
--

INSERT INTO `tradewis` (`id`, `local`, `id_coWis`) VALUES
(6, 'Super 99', 1),
(34, 'MacDonalds', 2),
(35, 'KFC', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_wis`
--

CREATE TABLE `user_wis` (
  `id` int(3) NOT NULL,
  `Username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `you_lives` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `province` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `photo` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `socialmedia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `about_me` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `places_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_wis`
--

INSERT INTO `user_wis` (`id`, `Username`, `last_name`, `sexo`, `email`, `password`, `you_lives`, `province`, `photo`, `socialmedia`, `about_me`, `places_id`) VALUES
(7, 'terminator10', 'Bolivar Cortes', 'M', 'terminator10@whereis.com.pa', '879d4af1eba734b18672098bb6908ec5e217b3ee', '2', '8', '28', '@terminator10', 'Estudiante de la UP. Ingenieria en Informatica. Cada dia aprendiendo algo nuevo. www.compilerun.com', 2),
(8, 'Rey-17', 'Reynaldo Villarreal', 'M', 'reynaldo@gmail.com', 'ead95877de072380696f2125290d6964d4fae14d', '23', '8', '105', '@rey-17', 'Trabajador de Whereis Panama. Mejorando cada dia en la vida. ', 23);

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
-- Indices de la tabla `photo_placeswis`
--
ALTER TABLE `photo_placeswis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img` (`id_photo_places`);

--
-- Indices de la tabla `photo_user_wis`
--
ALTER TABLE `photo_user_wis`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `photo` (`photo`);

--
-- Indices de la tabla `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `principalwis`
--
ALTER TABLE `principalwis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proWis` (`id_proWis`),
  ADD KEY `id_placesWis` (`id_places`),
  ADD KEY `photo_placesWis` (`photo_placesWis`);

--
-- Indices de la tabla `provincewis`
--
ALTER TABLE `provincewis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prowis` (`id_proWis`);

--
-- Indices de la tabla `roles_administrator`
--
ALTER TABLE `roles_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tradewis`
--
ALTER TABLE `tradewis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comercio` (`id_coWis`);

--
-- Indices de la tabla `user_wis`
--
ALTER TABLE `user_wis`
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
-- AUTO_INCREMENT de la tabla `photo_placeswis`
--
ALTER TABLE `photo_placeswis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `photo_user_wis`
--
ALTER TABLE `photo_user_wis`
  MODIFY `id_photo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `places`
--
ALTER TABLE `places`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `principalwis`
--
ALTER TABLE `principalwis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `provincewis`
--
ALTER TABLE `provincewis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `roles_administrator`
--
ALTER TABLE `roles_administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tradewis`
--
ALTER TABLE `tradewis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `user_wis`
--
ALTER TABLE `user_wis`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles_administrator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
