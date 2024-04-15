-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2024 a las 03:19:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dblabsuelosunivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `name_customer` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `number_dui` varchar(12) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `number_nit` varchar(50) DEFAULT NULL,
  `spin` varchar(50) DEFAULT NULL,
  `social_reason` varchar(50) DEFAULT NULL,
  `no_register_nrc` varchar(50) DEFAULT NULL,
  `id_type_customer` int(11) DEFAULT NULL,
  `id_department` int(11) NOT NULL,
  `id_municipality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `name_customer`, `email`, `number_dui`, `address`, `cell_phone`, `number_nit`, `spin`, `social_reason`, `no_register_nrc`, `id_type_customer`, `id_department`, `id_municipality`) VALUES
(2, 'Irving Machado', 'irving@correo.com', '1212121212-0', 'Nuevo San Miguel', '79890101', '', '', '', '', 1, 9, 175);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departments`
--

CREATE TABLE `tbl_departments` (
  `id_deparment` int(11) NOT NULL,
  `name_deparment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_departments`
--

INSERT INTO `tbl_departments` (`id_deparment`, `name_deparment`) VALUES
(1, 'Ahuachapán'),
(2, 'Cabañas'),
(3, 'Chalatenango'),
(4, 'Cuscatlán'),
(5, 'La Libertad'),
(6, 'La Paz'),
(7, 'La Unión'),
(8, 'Morazán'),
(9, 'San Miguel'),
(10, 'San Salvador'),
(11, 'San Vicente'),
(12, 'Santa Ana'),
(13, 'Sonsonate'),
(14, 'Usulután');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_field`
--

CREATE TABLE `tbl_field` (
  `id_field` int(11) NOT NULL,
  `name_field` varchar(50) DEFAULT NULL,
  `value_field` varchar(100) DEFAULT NULL,
  `type_field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_field_sample`
--

CREATE TABLE `tbl_field_sample` (
  `id_field_sample` int(11) NOT NULL,
  `id_sample` int(11) DEFAULT NULL,
  `id_field` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_group_sample`
--

CREATE TABLE `tbl_group_sample` (
  `id_group_sample` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `statu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_method`
--

CREATE TABLE `tbl_method` (
  `id_method` int(11) NOT NULL,
  `id_field_sample` int(11) DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipalities`
--

CREATE TABLE `tbl_municipalities` (
  `id_municipality` int(11) NOT NULL,
  `name_municipality` varchar(200) NOT NULL,
  `id_deparment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_municipalities`
--

INSERT INTO `tbl_municipalities` (`id_municipality`, `name_municipality`, `id_deparment`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Jujutla', 1),
(3, 'Atiquizaya', 1),
(4, 'Concepción de Ataco', 1),
(5, 'El Refugio', 1),
(6, 'Guaymango', 1),
(7, 'Apaneca', 1),
(8, 'San Francisco Menéndez', 1),
(9, 'San Lorenzo', 1),
(10, 'San Pedro Puxtla', 1),
(11, 'Tacuba', 1),
(12, 'Turín', 1),
(13, 'Cinquera', 2),
(14, 'Villa Dolores', 2),
(15, 'Guacotecti', 2),
(16, 'Ilobasco', 2),
(17, 'Jutiapa', 2),
(18, 'San Isidro', 2),
(19, 'Sensuntepeque', 2),
(20, 'Ciudad de Tejutepeque', 2),
(21, 'Victoria', 2),
(22, 'Agua Caliente', 3),
(23, 'Arcatao', 3),
(24, 'Azacualpa', 3),
(25, 'Chalatenango', 3),
(26, 'Citalá', 3),
(27, 'Comalapa', 3),
(28, 'Concepción Quezaltepeque', 3),
(29, 'Dulce Nombre de María', 3),
(30, 'El Carrizal', 3),
(31, 'El Paraíso', 3),
(32, 'La Laguna', 3),
(33, 'La Palma', 3),
(34, 'La Reina', 3),
(35, 'Las Vueltas', 3),
(36, 'Nombre de Jesús', 3),
(37, 'Nueva Concepción', 3),
(38, 'Nueva Trinidad', 3),
(39, 'Ojos de Agua', 3),
(40, 'Potonico', 3),
(41, 'San Antonio de la Cruz', 3),
(42, 'San Antonio Los Ranchos', 3),
(43, 'San Fernando', 3),
(44, 'San Francisco Lempa', 3),
(45, 'San Francisco Morazán', 3),
(46, 'San Ignacio', 3),
(47, 'San Isidro Labrador', 3),
(48, 'San José Cancasque', 3),
(49, 'San José Las Flores', 3),
(50, 'San Luis del Carmen', 3),
(51, 'San Miguel de Mercedes', 3),
(52, 'San Rafael', 3),
(53, 'Santa Rita', 3),
(54, 'Tejutla', 3),
(55, 'Candelaria', 4),
(56, 'Cojutepeque', 4),
(57, 'El Carmen', 4),
(58, 'El Rosario', 4),
(59, 'Monte San Juan', 4),
(60, 'Oratorio de Concepción', 4),
(61, 'San Bartolomé Perulapía', 4),
(62, 'San Cristóbal', 4),
(63, 'San José Guayabal', 4),
(64, 'San Pedro Perulapán', 4),
(65, 'San Rafael Cedros', 4),
(66, 'San Ramón', 4),
(67, 'Santa Cruz Analquito', 4),
(68, 'Santa Cruz Michapa', 4),
(69, 'Suchitoto', 4),
(70, 'Tenancingo', 4),
(71, 'Antiguo Cuscatlán', 5),
(72, 'Chiltiupán', 5),
(73, 'Ciudad Arce', 5),
(74, 'Colón', 5),
(75, 'Comasagua', 5),
(76, 'Huizúcar', 5),
(77, 'Jayaque', 5),
(78, 'Jicalapa', 5),
(79, 'La Libertad', 5),
(80, 'Nueva San Salvador', 5),
(81, 'Nuevo Cuscatlán', 5),
(82, 'Opico', 5),
(83, 'Quezaltepeque', 5),
(84, 'Sacacoyo', 5),
(85, 'San José Villanueva', 5),
(86, 'San Matías', 5),
(87, 'San Pablo Tacachico', 5),
(88, 'Talnique', 5),
(89, 'Tamanique', 5),
(90, 'Teotepeque', 5),
(91, 'Tepecoyo', 5),
(92, 'Zaragoza', 5),
(93, 'Cuyultitán', 6),
(94, 'El Rosario', 6),
(95, 'Jerusalén', 6),
(96, 'Mercedes La Ceiba', 6),
(97, 'Olocuilta', 6),
(98, 'Paraíso de Osorio', 6),
(99, 'San Antonio Masahuat', 6),
(100, 'San Emigdio', 6),
(101, 'San Francisco Chinameca', 6),
(102, 'San Juan Nonualco', 6),
(103, 'San Juan Talpa', 6),
(104, 'San Juan Tepezontes', 6),
(105, 'San Luis La Herradura', 6),
(106, 'San Luis Talpa', 6),
(107, 'San Miguel Tepezontes', 6),
(108, 'San Pedro Masahuat', 6),
(109, 'San Pedro Nonualco', 6),
(110, 'San Rafael Obrajuelo', 6),
(111, 'Santa María Ostuma', 6),
(112, 'Santiago Nonualco', 6),
(113, 'Tapalhuaca', 6),
(114, 'Zacatecoluca', 6),
(115, 'Anamorós', 7),
(116, 'Bolívar', 7),
(117, 'Concepción de Oriente', 7),
(118, 'Conchagua', 7),
(119, 'El Carmen', 7),
(120, 'El Sauce', 7),
(121, 'Intipucá', 7),
(122, 'La Unión', 7),
(123, 'Lislique', 7),
(124, 'Meanguera del Golfo', 7),
(125, 'Nueva Esparta', 7),
(126, 'Pasaquina', 7),
(127, 'Polorós', 7),
(128, 'San Alejo', 7),
(129, 'San José', 7),
(130, 'Santa Rosa de Lima', 7),
(131, 'Yayantique', 7),
(132, 'Yucuayquín', 7),
(133, 'Arambala', 8),
(134, 'Cacaopera', 8),
(135, 'Chilanga', 8),
(136, 'Corinto', 8),
(137, 'Delicias de Concepción', 8),
(138, 'El Divisadero', 8),
(139, 'El Rosario', 8),
(140, 'Gualococti', 8),
(141, 'Guatajiagua', 8),
(142, 'Joateca', 8),
(143, 'Jocoaitique', 8),
(144, 'Jocoro', 8),
(145, 'Lolotiquillo', 8),
(146, 'Meanguera', 8),
(147, 'Osicala', 8),
(148, 'Perquín', 8),
(149, 'San Carlos', 8),
(150, 'San Fernando', 8),
(151, 'San Francisco Gotera', 8),
(152, 'San Isidro', 8),
(153, 'San Simón', 8),
(154, 'Sensembra', 8),
(155, 'Sociedad', 8),
(156, 'Torola', 8),
(157, 'Yamabal', 8),
(158, 'Yoloaiquín', 8),
(159, 'Carolina', 9),
(160, 'Chapeltique', 9),
(161, 'Chinameca', 9),
(162, 'Chirilagua', 9),
(163, 'Ciudad Barrios', 9),
(164, 'Comacarán', 9),
(165, 'El Tránsito', 9),
(166, 'Lolotique', 9),
(167, 'Moncagua', 9),
(168, 'Nueva Guadalupe', 9),
(169, 'Nuevo Edén de San Juan', 9),
(170, 'Quelepa', 9),
(171, 'San Antonio', 9),
(172, 'San Gerardo', 9),
(173, 'San Jorge', 9),
(174, 'San Luis de la Reina', 9),
(175, 'San Miguel', 9),
(176, 'San Rafael', 9),
(177, 'Sesori', 9),
(178, 'Uluazapa', 9),
(179, 'Aguilares', 10),
(180, 'Apopa', 10),
(181, 'Ayutuxtepeque', 10),
(182, 'Cuscatancingo', 10),
(183, 'Delgado', 10),
(184, 'El Paisnal', 10),
(185, 'Guazapa', 10),
(186, 'Ilopango', 10),
(187, 'Mejicanos', 10),
(188, 'Nejapa', 10),
(189, 'Panchimalco', 10),
(190, 'Rosario de Mora', 10),
(191, 'San Marcos', 10),
(192, 'San Martín', 10),
(193, 'San Salvador', 10),
(194, 'Santiago Texacuangos', 10),
(195, 'Santo Tomás', 10),
(196, 'Soyapango', 10),
(197, 'Tonacatepeque', 10),
(198, 'Apastepeque', 11),
(199, 'Guadalupe', 11),
(200, 'San Cayetano Istepeque', 11),
(201, 'San Esteban Catarina', 11),
(202, 'San Ildefonso', 11),
(203, 'San Lorenzo', 11),
(204, 'San Sebastián', 11),
(205, 'Santa Clara', 11),
(206, 'Santo Domingo', 11),
(207, 'San Vicente', 11),
(208, 'Tecoluca', 11),
(209, 'Tepetitán', 11),
(210, 'Verapaz', 11),
(211, 'Candelaria de la Frontera', 12),
(212, 'Chalchuapa', 12),
(213, 'Coatepeque', 12),
(214, 'El Congo', 12),
(215, 'El Porvenir', 12),
(216, 'Masahuat', 12),
(217, 'Metapán', 12),
(218, 'San Antonio Pajonal', 12),
(219, 'San Sebastián Salitrillo', 12),
(220, 'Santa Ana', 12),
(221, 'Santa Rosa Guachipilín', 12),
(222, 'Santiago de la Frontera', 12),
(223, 'Texistepeque', 12),
(224, 'Acajutla', 13),
(225, 'Armenia', 13),
(226, 'Caluco', 13),
(227, 'Cuisnahuat', 13),
(228, 'Izalco', 13),
(229, 'Juayúa', 13),
(230, 'Nahuizalco', 13),
(231, 'Nahulingo', 13),
(232, 'Salcoatitán', 13),
(233, 'San Antonio del Monte', 13),
(234, 'San Julián', 13),
(235, 'Santa Catarina Masahuat', 13),
(236, 'Santa Isabel Ishuatán', 13),
(237, 'Santo Domingo', 13),
(238, 'Sonsonate', 13),
(239, 'Sonzacate', 13),
(240, 'Alegría', 14),
(241, 'Berlín', 14),
(242, 'California', 14),
(243, 'Concepción Batres', 14),
(244, 'El Triunfo', 14),
(245, 'Ereguayquín', 14),
(246, 'Estanzuelas', 14),
(247, 'Jiquilisco', 14),
(248, 'Jucuapa', 14),
(249, 'Jucuarán', 14),
(250, 'Mercedes Umaña', 14),
(251, 'Nueva Granada', 14),
(252, 'Ozatlán', 14),
(253, 'Puerto El Triunfo', 14),
(254, 'San Agustín', 14),
(255, 'San Buenaventura', 14),
(256, 'San Dionisio', 14),
(257, 'San Francisco Javier', 14),
(258, 'Santa Elena', 14),
(259, 'Santa María', 14),
(260, 'Santiago de María', 14),
(261, 'Tecapán', 14),
(262, 'Usulután', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id_project` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `lactitud` varchar(50) NOT NULL,
  `longitud` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id_rol` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `name`) VALUES
(1, 'Gerente de calidad'),
(2, 'Jefe Tecnico'),
(3, 'Tecnico de planta'),
(4, 'Tecnico eventual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id_sample` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rules` varchar(50) DEFAULT NULL,
  `id_group_sample` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_type_customer`
--

CREATE TABLE `tbl_type_customer` (
  `id_type_customer` int(11) NOT NULL,
  `type_customer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_type_customer`
--

INSERT INTO `tbl_type_customer` (`id_type_customer`, `type_customer`) VALUES
(1, 'Natural'),
(2, 'Juridico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `modification_date` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `full_name`, `date_register`, `modification_date`, `image`, `status`, `id_rol`) VALUES
(1, 'Michell Zelaya', '2024-03-19', '2024-03-27', 'avatar.png', 1, 1),
(2, 'julio', '2024-03-26', '2024-03-27', 'avatar.png', 1, 1),
(7, 'Ruthylia', '2024-03-26', '2024-03-27', 'avatar.png', 1, 4),
(17, 'Irving', '2024-03-26', '2024-03-26', 'avatar.png', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_type_customer` (`id_type_customer`);

--
-- Indices de la tabla `tbl_departments`
--
ALTER TABLE `tbl_departments`
  ADD PRIMARY KEY (`id_deparment`);

--
-- Indices de la tabla `tbl_field`
--
ALTER TABLE `tbl_field`
  ADD PRIMARY KEY (`id_field`);

--
-- Indices de la tabla `tbl_field_sample`
--
ALTER TABLE `tbl_field_sample`
  ADD PRIMARY KEY (`id_field_sample`),
  ADD KEY `id_sample` (`id_sample`),
  ADD KEY `id_field` (`id_field`);

--
-- Indices de la tabla `tbl_group_sample`
--
ALTER TABLE `tbl_group_sample`
  ADD PRIMARY KEY (`id_group_sample`);

--
-- Indices de la tabla `tbl_method`
--
ALTER TABLE `tbl_method`
  ADD PRIMARY KEY (`id_method`),
  ADD KEY `id_field_sample` (`id_field_sample`);

--
-- Indices de la tabla `tbl_municipalities`
--
ALTER TABLE `tbl_municipalities`
  ADD PRIMARY KEY (`id_municipality`),
  ADD KEY `fk_municipalities_deparments` (`id_deparment`);

--
-- Indices de la tabla `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id_sample`),
  ADD KEY `id_group_sample` (`id_group_sample`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Indices de la tabla `tbl_type_customer`
--
ALTER TABLE `tbl_type_customer`
  ADD PRIMARY KEY (`id_type_customer`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_field`
--
ALTER TABLE `tbl_field`
  MODIFY `id_field` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_field_sample`
--
ALTER TABLE `tbl_field_sample`
  MODIFY `id_field_sample` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_group_sample`
--
ALTER TABLE `tbl_group_sample`
  MODIFY `id_group_sample` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_method`
--
ALTER TABLE `tbl_method`
  MODIFY `id_method` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id_sample` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_type_customer`
--
ALTER TABLE `tbl_type_customer`
  MODIFY `id_type_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `tbl_customer_deparments` FOREIGN KEY (`id_type_customer`) REFERENCES `tbl_type_customer` (`id_type_customer`);

--
-- Filtros para la tabla `tbl_field_sample`
--
ALTER TABLE `tbl_field_sample`
  ADD CONSTRAINT `tbl_field_sample_ibfk_1` FOREIGN KEY (`id_sample`) REFERENCES `tbl_sample` (`id_sample`),
  ADD CONSTRAINT `tbl_field_sample_ibfk_2` FOREIGN KEY (`id_field`) REFERENCES `tbl_field` (`id_field`);

--
-- Filtros para la tabla `tbl_method`
--
ALTER TABLE `tbl_method`
  ADD CONSTRAINT `tbl_method_ibfk_1` FOREIGN KEY (`id_field_sample`) REFERENCES `tbl_field_sample` (`id_field_sample`);

--
-- Filtros para la tabla `tbl_municipalities`
--
ALTER TABLE `tbl_municipalities`
  ADD CONSTRAINT `fk_municipalities_deparments` FOREIGN KEY (`id_deparment`) REFERENCES `tbl_departments` (`id_deparment`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD CONSTRAINT `tbl_project_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);

--
-- Filtros para la tabla `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD CONSTRAINT `tbl_sample_ibfk_1` FOREIGN KEY (`id_group_sample`) REFERENCES `tbl_group_sample` (`id_group_sample`),
  ADD CONSTRAINT `tbl_sample_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  ADD CONSTRAINT `tbl_sample_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `tbl_project` (`id_project`);

--
-- Filtros para la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
