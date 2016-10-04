-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2015 a las 23:04:31
-- Versión del servidor: 5.6.23
-- Versión de PHP: 5.5.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `afcontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE IF NOT EXISTS `afiliado` (
  `idafiliado` int(11) NOT NULL,
  `identificacion` varchar(25) DEFAULT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `tipo_sanguineo` varchar(25) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `entidad_salud` varchar(60) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`idafiliado`, `identificacion`, `tipo_identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `tipo_sanguineo`, `telefono`, `direccion`, `entidad_salud`, `estado`) VALUES
(1, '00001', 'T.I.', 'Yeison', 'Torrado López', 'test@test.com', '2005-11-04', 'A+', '57881', 'av 11', 'Coomeva', 1),
(2, '1090422853', 'C.C.', 'Yeison', 'Torrado', 'yeiman_4@hotmail.com', '1990-07-24', 'a+', '5745630', NULL, 'COOMEVA', 1),
(3, '13504568', 'T.I.', 'LUIS OMAR', 'CHITIVA JACOME', '', '2005-11-10', '', '3214453073', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_grupo`
--

CREATE TABLE IF NOT EXISTS `afiliado_grupo` (
  `idafiliado_grupo` int(11) NOT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finzalizacion` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `afiliado_grupo`
--

INSERT INTO `afiliado_grupo` (`idafiliado_grupo`, `fecha_afiliacion`, `fecha_inicio`, `fecha_finzalizacion`, `estado`, `afiliado_idafiliado`, `grupo_idgrupo`) VALUES
(6, '2014-10-01', '2015-11-05', NULL, 1, 1, 1),
(7, '2015-11-30', '2015-11-30', NULL, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado_has_entidad`
--

CREATE TABLE IF NOT EXISTS `afiliado_has_entidad` (
  `idafiliado_has_entidad` int(11) NOT NULL,
  `entidad_identidad` int(11) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `valor_mensual` double DEFAULT NULL,
  `limite` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `descripcion`, `valor_mensual`, `limite`) VALUES
(1, 'JUNIOR', 12200, 300),
(2, 'CATEGORIA 2006', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idcontacto` int(11) NOT NULL,
  `nombre_familiar1` varchar(60) DEFAULT NULL,
  `telefono_familiar_1` varchar(25) DEFAULT NULL,
  `tipo_familiar1` varchar(45) DEFAULT NULL,
  `nombre_familiar2` varchar(60) DEFAULT NULL,
  `telefono_familiar2` varchar(25) DEFAULT NULL,
  `tipo_familiar2` varchar(45) DEFAULT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `nombre_familiar1`, `telefono_familiar_1`, `tipo_familiar1`, `nombre_familiar2`, `telefono_familiar2`, `tipo_familiar2`, `afiliado_idafiliado`) VALUES
(1, 'test', NULL, NULL, 'TESTPADRE', NULL, NULL, 1),
(2, 'Nancy Lopez', NULL, NULL, 'Edgar Torrado (Fallecido)', NULL, NULL, 2),
(3, 'GRACIAE', NULL, NULL, 'LAFONSO', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE IF NOT EXISTS `entidad` (
  `identidad` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) DEFAULT NULL,
  `limite_personas` int(11) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre_grupo`, `limite_personas`, `categoria_idcategoria`) VALUES
(1, 'ARQUEROS J1', 300, 1),
(2, 'JUGADORES', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `idimg` int(11) NOT NULL,
  `nombre_img` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`idimg`, `nombre_img`, `ruta`, `afiliado_idafiliado`) VALUES
(1, '1.jpg', './uploads/afiliados/', 1),
(3, '21.png', './uploads/afiliados/', 2),
(4, '3.jpg', './uploads/afiliados/', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE IF NOT EXISTS `mensualidad` (
  `idmensualidad` int(11) NOT NULL,
  `valor_mensualidad` double DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `afiliado_grupo_idafiliado_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidad`
--

INSERT INTO `mensualidad` (`idmensualidad`, `valor_mensualidad`, `fecha_pago`, `mes`, `year`, `afiliado_grupo_idafiliado_grupo`) VALUES
(2, 25000, '2015-11-26', 1, 2015, 6),
(3, 25000, '2015-11-26', 2, 2015, 6),
(4, 25000, '2015-11-26', 3, 2015, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `mail`, `tipo`) VALUES
(1, '00000', 'MPNO7uUQ+f5e4ifOHgUPT70F/pQNSHC6GwyrDLKdwbt9gpok6TyHvQV+mcikeYWmMY2O7LN60siaaMQwdsaYAg==', 'yeiman_4@hotmail.com', 'AdminSys');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`idafiliado`), ADD UNIQUE KEY `identificacion_UNIQUE` (`identificacion`);

--
-- Indices de la tabla `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  ADD PRIMARY KEY (`idafiliado_grupo`), ADD KEY `fk_afiliado_grupo_afiliado1_idx` (`afiliado_idafiliado`), ADD KEY `fk_afiliado_grupo_grupo1_idx` (`grupo_idgrupo`);

--
-- Indices de la tabla `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  ADD PRIMARY KEY (`idafiliado_has_entidad`), ADD KEY `fk_afiliado_has_entidad_entidad1_idx` (`entidad_identidad`), ADD KEY `fk_afiliado_has_entidad_afiliado_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idcontacto`,`afiliado_idafiliado`), ADD KEY `fk_contacto_afiliado1_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`identidad`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`), ADD KEY `fk_grupo_categoria1_idx` (`categoria_idcategoria`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idimg`), ADD KEY `fk_img_afiliado1_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`idmensualidad`), ADD KEY `fk_mensualidad_afiliado_grupo1_idx` (`afiliado_grupo_idafiliado_grupo`);

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
  MODIFY `idafiliado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  MODIFY `idafiliado_grupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  MODIFY `idafiliado_has_entidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `identidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `idimg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
ADD CONSTRAINT `fk_contacto_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
