-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2017 a las 20:36:42
-- Versión del servidor: 5.6.31
-- Versión de PHP: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `afcontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE `afiliado` (
  `idafiliado` int(11) NOT NULL,
  `identificacion` varchar(25) DEFAULT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_sanguineo` varchar(25) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `movil` int(45) DEFAULT NULL,
  `talla` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `entidad_salud` varchar(60) DEFAULT NULL,
  `tipo_registro` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `morageneral` tinyint(1) DEFAULT '0',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`idafiliado`, `identificacion`, `tipo_identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `tipo_sanguineo`, `telefono`, `movil`, `talla`, `direccion`, `entidad_salud`, `tipo_registro`, `estado`, `morageneral`, `fecha_registro`) VALUES
(34, '1090422853', 'T.I.', 'Yeison', 'Torrado López', 'Yeison@termo.com', '1990-07-07', 'A+', '5745630', 2147483647, 'M', 'AV 11E', 'COOMEVA', 'Deportista', 1, 0, '2017-09-20 20:23:22'),
(35, '900586015', 'C.C.', 'Tristan', 'Von Hendrith', 'tristan.herth@gmail.com', '1990-07-24', 'A+', '5745630', 2147483647, 'M', 'Distric 11G 78A-124', 'Coomeva', 'Deportista', 1, 0, '2017-09-20 20:23:22'),
(36, '345362525', 'C.C.', 'Pepe 345362525', 'nene 345362525', '', '2017-09-13', '', '345362525', 345362525, '', '345362525', '', 'prueba', 1, 0, '2017-09-20 20:23:22'),
(37, '977067303', 'C.C.', 'Pepe 977067303', 'nene 977067303', '', '2017-09-13', '', '977067303', 977067303, '', '977067303', '', 'prueba', 1, 0, '2017-09-20 20:23:22'),
(38, '1075043720', 'C.C.', 'Pepe 1075043720', 'nene 1075043720', '', '2017-09-13', '', '1075043720', 1075043720, '', '1075043720', '', 'prueba', 1, 0, '2017-09-20 20:23:22'),
(39, '1245824748', 'C.C.', 'Pepe 1245824748', 'nene 1245824748', '', '2017-09-13', '', '1245824748', 1245824748, '', '1245824748', '', 'prueba', 1, 0, '2017-09-20 20:23:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_contacto`
--

CREATE TABLE `afiliado_contacto` (
  `idafiliado_contacto` int(11) NOT NULL,
  `nombre_ref` varchar(60) DEFAULT NULL,
  `telefono_ref` varchar(25) DEFAULT NULL,
  `parentesco_ref` varchar(45) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_contacto`
--

INSERT INTO `afiliado_contacto` (`idafiliado_contacto`, `nombre_ref`, `telefono_ref`, `parentesco_ref`, `fecha_registro`, `afiliado_idafiliado`) VALUES
(1, 'Amellie', '5745600', 'Madre', '2017-09-19 21:04:46', 35),
(2, 'Cadmo Dardano', '7552862', 'Padre', '2017-09-19 21:04:46', 35),
(3, 'Nancy', '55555', 'Madre', '2017-09-19 21:04:46', 34),
(4, 'Adrian', '55555', 'Hermano', '2017-09-19 21:04:46', 34),
(6, 'Yeison', '54856151', 'Amigo', '2017-09-22 16:48:43', 35),
(7, 'Yeison Torrado', '74511', 'amigo', '2017-09-22 16:57:56', 35),
(8, 'Anonimo', '451488', 'hasd', '2017-09-22 17:00:18', 35),
(9, 'otro', '5', '4', '2017-09-22 17:01:02', 35),
(10, 'Yeison', '555555', 'Gemelo malvado', '2017-09-22 17:11:48', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_documento`
--

CREATE TABLE `afiliado_documento` (
  `idafiliado_documento` int(11) NOT NULL,
  `clasificacion` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `is_foto_perfil` int(11) DEFAULT '0',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `afiliado_idafiliado` int(11) DEFAULT NULL,
  `documento_iddocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_documento`
--

INSERT INTO `afiliado_documento` (`idafiliado_documento`, `clasificacion`, `estado`, `is_foto_perfil`, `fecha_registro`, `afiliado_idafiliado`, `documento_iddocumento`) VALUES
(27, 'Documento estandar', 1, 0, '2017-09-22 17:19:43', 35, 27),
(28, 'Documento estandar', 1, 0, '2017-09-22 17:29:51', 34, 28),
(29, 'undefined', 1, 0, '2017-09-22 17:31:04', 34, 29),
(30, 'undefined', 1, 0, '2017-09-22 17:31:46', 35, 30),
(31, 'Documento estandar12', 1, 0, '2017-09-22 20:52:50', 35, 31),
(32, 'Foto de perfil', 1, 0, '2017-09-22 20:53:00', 35, 32),
(33, 'Foto de perfil', 1, 0, '2017-09-26 20:01:14', 35, 33),
(34, 'Foto de perfil', 1, 1, '2017-09-26 20:01:29', 35, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_grupo`
--

CREATE TABLE `afiliado_grupo` (
  `idafiliado_grupo` int(11) NOT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `mora` tinyint(1) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_has_entidad`
--

CREATE TABLE `afiliado_has_entidad` (
  `idafiliado_has_entidad` int(11) NOT NULL,
  `entidad_identidad` int(11) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `descripcion`) VALUES
(15, '2006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `ruta` varchar(120) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`iddocumento`, `documento`, `ruta`, `tipo`, `estado`, `fecha_registro`) VALUES
(20, '34109042285320170922.png', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:14:52'),
(21, '34109042285320170922.jpg', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:15:02'),
(22, '34109042285320170922.xlsx', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:15:18'),
(23, '341090422853201709221.png', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:16:36'),
(24, '341090422853201709222.png', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:16:47'),
(25, '341090422853201709223.png', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:17:00'),
(26, '341090422853201709221.jpg', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:17:50'),
(27, '3590058601520170922.xlsx', '/uploads/afiliados/35/', 0, 1, '2017-09-22 17:19:43'),
(28, '34109042285320170922.xlsx', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:29:51'),
(29, '341090422853201709221.xlsx', '/uploads/afiliados/34/', 0, 1, '2017-09-22 17:31:04'),
(30, '35900586015201709221.xlsx', '/uploads/afiliados/35/', 0, 1, '2017-09-22 17:31:46'),
(31, '35900586015201709222.xlsx', '/uploads/afiliados/35/', 0, 1, '2017-09-22 20:52:50'),
(32, '3590058601520170922.png', '/uploads/afiliados/35/', 0, 1, '2017-09-22 20:53:00'),
(33, '3590058601520170926.xlsx', '/uploads/afiliados/35/', 0, 1, '2017-09-26 20:01:14'),
(34, '3590058601520170926.jpg', '/uploads/afiliados/35/', 0, 1, '2017-09-26 20:01:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `identidad` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_medico`
--

CREATE TABLE `examen_medico` (
  `idexamen_medico` int(11) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  `fecha_examen` date NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `estatura` varchar(10) DEFAULT NULL,
  `presion_arterial` varchar(25) DEFAULT NULL,
  `rh` varchar(5) DEFAULT NULL,
  `enfermedades` text,
  `alergias` text,
  `vacunas` text,
  `medicamentos` varchar(250) DEFAULT NULL,
  `apto_actividad` tinyint(1) DEFAULT '1',
  `observaciones` text,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen_medico`
--

INSERT INTO `examen_medico` (`idexamen_medico`, `afiliado_idafiliado`, `fecha_examen`, `peso`, `estatura`, `presion_arterial`, `rh`, `enfermedades`, `alergias`, `vacunas`, `medicamentos`, `apto_actividad`, `observaciones`, `fecha_registro`) VALUES
(1, 34, '2017-07-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-09-26 19:28:25'),
(2, 35, '2017-09-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-09-26 19:28:25'),
(3, 35, '2017-07-04', '74kg', '176', '186/76', 'A+', NULL, NULL, NULL, NULL, 1, 'asdasd', '2017-09-26 19:52:44'),
(4, 35, '1990-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-09-26 19:54:32'),
(5, 35, '1992-07-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-09-26 19:54:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre_grupo`, `categoria_idcategoria`) VALUES
(16, 'EQUIPO A', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE `mensualidad` (
  `idmensualidad` int(11) NOT NULL,
  `valor_mensualidad` double DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `observacion` varchar(2000) NOT NULL,
  `recibo_idrecibo` int(11) NOT NULL,
  `afiliado_grupo_idafiliado_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `idrecibo` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `total_recibo` double NOT NULL,
  `idafiliado` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`idrecibo`, `fecha_creacion`, `total_recibo`, `idafiliado`, `idusuario`) VALUES
(10006, '2016-10-01', 3, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `mail`, `tipo`) VALUES
(1, '00000', 'dFzyNlbJTDKit2N80KPhL6/pWr5jNGVg0M4w+cmQnamh+Nwn0jS2IxXElF2lcr+SsuHceS3E7fp6/nSdfCyuZw==', 'correo@hotmail.com', 'Presidente'),
(3, '1090422853', 'pNyXfiJ17dlQ5JjTg31Yeg1DanJiYYfreqwaOy4quZEx2CK2aHrJg7K0F8sI0qxbIjqsEtNQVC920hITJfckNQ==', 'test@test.com', 'Gestor de afiliados');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`idafiliado`),
  ADD UNIQUE KEY `identificacion_UNIQUE` (`identificacion`);

--
-- Indices de la tabla `afiliado_contacto`
--
ALTER TABLE `afiliado_contacto`
  ADD PRIMARY KEY (`idafiliado_contacto`,`afiliado_idafiliado`),
  ADD KEY `fk_contacto_afiliado1_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `afiliado_documento`
--
ALTER TABLE `afiliado_documento`
  ADD PRIMARY KEY (`idafiliado_documento`),
  ADD KEY `afiliado_idafiliado` (`afiliado_idafiliado`),
  ADD KEY `documento_iddocumento` (`documento_iddocumento`),
  ADD KEY `documento_iddocumento_2` (`documento_iddocumento`),
  ADD KEY `afiliado_idafiliado_2` (`afiliado_idafiliado`);

--
-- Indices de la tabla `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  ADD PRIMARY KEY (`idafiliado_grupo`),
  ADD KEY `fk_afiliado_grupo_afiliado1_idx` (`afiliado_idafiliado`),
  ADD KEY `fk_afiliado_grupo_grupo1_idx` (`grupo_idgrupo`);

--
-- Indices de la tabla `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  ADD PRIMARY KEY (`idafiliado_has_entidad`),
  ADD KEY `fk_afiliado_has_entidad_entidad1_idx` (`entidad_identidad`),
  ADD KEY `fk_afiliado_has_entidad_afiliado_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`iddocumento`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`identidad`);

--
-- Indices de la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  ADD PRIMARY KEY (`idexamen_medico`),
  ADD KEY `afiliado_idafiliado` (`afiliado_idafiliado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`),
  ADD KEY `fk_grupo_categoria1_idx` (`categoria_idcategoria`);

--
-- Indices de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`idmensualidad`),
  ADD KEY `fk_mensualidad_afiliado_grupo1_idx` (`afiliado_grupo_idafiliado_grupo`),
  ADD KEY `recibo_idrecibo` (`recibo_idrecibo`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`idrecibo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idafiliado` (`idafiliado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  MODIFY `idafiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `afiliado_contacto`
--
ALTER TABLE `afiliado_contacto`
  MODIFY `idafiliado_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `afiliado_documento`
--
ALTER TABLE `afiliado_documento`
  MODIFY `idafiliado_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  MODIFY `idafiliado_grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  MODIFY `idafiliado_has_entidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `iddocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `identidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  MODIFY `idexamen_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  MODIFY `idmensualidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `idrecibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliado_contacto`
--
ALTER TABLE `afiliado_contacto`
  ADD CONSTRAINT `fk_contacto_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `afiliado_documento`
--
ALTER TABLE `afiliado_documento`
  ADD CONSTRAINT `afiliado_documento_ibfk_1` FOREIGN KEY (`documento_iddocumento`) REFERENCES `documento` (`iddocumento`),
  ADD CONSTRAINT `afiliado_documento_ibfk_2` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`);

--
-- Filtros para la tabla `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  ADD CONSTRAINT `fk_afiliado_grupo_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_afiliado_grupo_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  ADD CONSTRAINT `fk_afiliado_has_entidad_afiliado` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_afiliado_has_entidad_entidad1` FOREIGN KEY (`entidad_identidad`) REFERENCES `entidad` (`identidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  ADD CONSTRAINT `examen_medico_ibfk_1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD CONSTRAINT `fk_mensualidad_afiliado_grupo1` FOREIGN KEY (`afiliado_grupo_idafiliado_grupo`) REFERENCES `afiliado_grupo` (`idafiliado_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
