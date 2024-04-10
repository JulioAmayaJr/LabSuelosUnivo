-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2024 a las 19:00:55
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
-- Base de datos: `dblabsuelounivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `name_customer` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `number_dui` varchar(12) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `cell_phone` varchar(20) DEFAULT NULL,
  `number_nit` varchar(50) DEFAULT NULL,
  `spin` varchar(50) DEFAULT NULL,
  `social_reason` varchar(50) DEFAULT NULL,
  `no_register_nrc` varchar(50) DEFAULT NULL,
  `id_type_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, 'Irving', '2024-03-26', '2024-03-26', 'avatar.png', 1, 4),
(18, 'Elias el gei', '2024-03-26', '2024-03-29', 'o604y7ethd.png', 1, 3);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_type_customer` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tbl_customer_ibfk_1` FOREIGN KEY (`id_type_customer`) REFERENCES `tbl_type_customer` (`id_type_customer`);

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
