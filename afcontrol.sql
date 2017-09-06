-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-09-2017 a las 22:57:31
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
  `direccion` varchar(100) DEFAULT NULL,
  `entidad_salud` varchar(60) DEFAULT NULL,
  `tipo_registro` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  `morageneral` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`idafiliado`, `identificacion`, `tipo_identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `tipo_sanguineo`, `telefono`, `movil`, `direccion`, `entidad_salud`, `tipo_registro`, `estado`, `morageneral`) VALUES
(10, '1093592516', 'Registro Civil', 'SANTIAGO', 'CHITIVA CONTRERAS', 'omarchitiva@hotmail.com', '2006-02-08', 'A+', '3214453073', NULL, 'CALLE 5N 3E-102 CEIBA 2', 'FUNDACION MEDICO PREVENTIVA', 'Deportista', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_contacto`
--

CREATE TABLE `afiliado_contacto` (
  `idafiliado_contacto` int(11) NOT NULL,
  `nombre_ref` varchar(60) DEFAULT NULL,
  `telefono_ref` varchar(25) DEFAULT NULL,
  `parentesco_ref` varchar(45) DEFAULT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_contacto`
--

INSERT INTO `afiliado_contacto` (`idafiliado_contacto`, `nombre_ref`, `telefono_ref`, `parentesco_ref`, `afiliado_idafiliado`) VALUES
(5, 'MAGDA CELENA CONTRERAS PRADO', NULL, NULL, 10);

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
  `peso` varchar(10) NOT NULL,
  `estatura` varchar(10) NOT NULL,
  `presion_arterial` varchar(25) NOT NULL,
  `rh` varchar(5) NOT NULL,
  `enfermedades` text NOT NULL,
  `alergias` text NOT NULL,
  `vacunas` text NOT NULL,
  `medicamentos` varchar(250) NOT NULL,
  `apto_actividad` tinyint(1) NOT NULL DEFAULT '1',
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE `img` (
  `idimg` int(11) NOT NULL,
  `nombre_img` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`idimg`, `nombre_img`, `ruta`, `afiliado_idafiliado`) VALUES
(5, '10.jpg', './uploads/afiliados/', 10);

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
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idimg`),
  ADD KEY `fk_img_afiliado1_idx` (`afiliado_idafiliado`);

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
  MODIFY `idafiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `afiliado_contacto`
--
ALTER TABLE `afiliado_contacto`
  MODIFY `idafiliado_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `identidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `examen_medico`
--
ALTER TABLE `examen_medico`
  MODIFY `idexamen_medico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `idimg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- Filtros para la tabla `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_img_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD CONSTRAINT `fk_mensualidad_afiliado_grupo1` FOREIGN KEY (`afiliado_grupo_idafiliado_grupo`) REFERENCES `afiliado_grupo` (`idafiliado_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
