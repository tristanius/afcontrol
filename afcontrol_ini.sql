-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 06:23:35
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

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
  `estado_activo` tinyint(1) DEFAULT '1',
  `morageneral` tinyint(1) DEFAULT '0',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `afiliado_has_usuario`
--

CREATE TABLE `afiliado_has_usuario` (
  `idafiliado_has_usuario` int(11) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `tipo_relacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_financiero`
--

CREATE TABLE `concepto_financiero` (
  `idconcepto_financiero` int(11) NOT NULL,
  `nombre_concepto` varchar(75) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_has_recibo`
--

CREATE TABLE `documento_has_recibo` (
  `iddocumento_has_recibo` int(11) NOT NULL,
  `documento_iddocumento` int(11) NOT NULL,
  `recibo_idrecibo` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE `mensualidad` (
  `idmensualidad` int(11) NOT NULL,
  `valor_mensualidad` double DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `observacion` varchar(2000) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `afiliado_grupo_idafiliado_grupo` int(11) NOT NULL,
  `pago_idpago` int(11) NOT NULL,
  `recibo_idrecibo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `fecha_referencia_pago` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `observacion` varchar(500) DEFAULT NULL,
  `concepto_financiero_idconcepto_financiero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre_permiso` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `codigo`, `nombre_permiso`) VALUES
(1, 'USER01', 'Sesion de usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `idrecibo` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `total_recibo` double NOT NULL,
  `idafiliado` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `pago_idpago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre_rol`) VALUES
(1, 'superadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_has_permiso`
--

CREATE TABLE `rol_has_permiso` (
  `idrol_has_permiso` int(11) NOT NULL,
  `rol_idrol` int(11) NOT NULL,
  `permiso_idpermiso` int(11) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_has_permiso`
--

INSERT INTO `rol_has_permiso` (`idrol_has_permiso`, `rol_idrol`, `permiso_idpermiso`, `fecha_registro`) VALUES
(1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `rol_idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `mail`, `estado`, `rol_idrol`) VALUES
(1, 'superadmin', 'd9sHZERhj0FOEM5qcOTiP26KJhYysxMZ0~IZZjV1PQEWo5fKlOGlC2Fti.YRqp9Fd1AjFlbgar~OLl5NIo4v9A--', 'yeison@mail.com', 1, 1);

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
-- Indices de la tabla `afiliado_has_usuario`
--
ALTER TABLE `afiliado_has_usuario`
  ADD PRIMARY KEY (`idafiliado_has_usuario`),
  ADD KEY `fk_afiliado_has_usuario_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_afiliado_has_usuario_afiliado1_idx` (`afiliado_idafiliado`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `concepto_financiero`
--
ALTER TABLE `concepto_financiero`
  ADD PRIMARY KEY (`idconcepto_financiero`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`iddocumento`);

--
-- Indices de la tabla `documento_has_recibo`
--
ALTER TABLE `documento_has_recibo`
  ADD PRIMARY KEY (`iddocumento_has_recibo`),
  ADD KEY `fk_documento_has_recibo_recibo1_idx` (`recibo_idrecibo`),
  ADD KEY `fk_documento_has_recibo_documento1_idx` (`documento_iddocumento`);

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
  ADD KEY `fk_mensualidad_pago1_idx` (`pago_idpago`),
  ADD KEY `fk_mensualidad_recibo1_idx` (`recibo_idrecibo`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `fk_pago_concepto_financiero1_idx` (`concepto_financiero_idconcepto_financiero`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`idrecibo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idafiliado` (`idafiliado`),
  ADD KEY `fk_recibo_pago1_idx` (`pago_idpago`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `rol_has_permiso`
--
ALTER TABLE `rol_has_permiso`
  ADD PRIMARY KEY (`idrol_has_permiso`),
  ADD KEY `fk_rol_has_permiso_permiso1_idx` (`permiso_idpermiso`),
  ADD KEY `fk_rol_has_permiso_rol1_idx` (`rol_idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_rol1_idx` (`rol_idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliado_has_usuario`
--
ALTER TABLE `afiliado_has_usuario`
  MODIFY `idafiliado_has_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `concepto_financiero`
--
ALTER TABLE `concepto_financiero`
  MODIFY `idconcepto_financiero` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documento_has_recibo`
--
ALTER TABLE `documento_has_recibo`
  MODIFY `iddocumento_has_recibo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol_has_permiso`
--
ALTER TABLE `rol_has_permiso`
  MODIFY `idrol_has_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Filtros para la tabla `afiliado_has_usuario`
--
ALTER TABLE `afiliado_has_usuario`
  ADD CONSTRAINT `afiliado_has_usuario_ibfk_1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fk_afiliado_has_usuario_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documento_has_recibo`
--
ALTER TABLE `documento_has_recibo`
  ADD CONSTRAINT `fk_documento_has_recibo_documento1` FOREIGN KEY (`documento_iddocumento`) REFERENCES `documento` (`iddocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documento_has_recibo_recibo1` FOREIGN KEY (`recibo_idrecibo`) REFERENCES `recibo` (`idrecibo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_mensualidad_afiliado_grupo1` FOREIGN KEY (`afiliado_grupo_idafiliado_grupo`) REFERENCES `afiliado_grupo` (`idafiliado_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensualidad_pago1` FOREIGN KEY (`pago_idpago`) REFERENCES `pago` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensualidad_recibo1` FOREIGN KEY (`recibo_idrecibo`) REFERENCES `recibo` (`idrecibo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_concepto_financiero1` FOREIGN KEY (`concepto_financiero_idconcepto_financiero`) REFERENCES `concepto_financiero` (`idconcepto_financiero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `fk_recibo_pago1` FOREIGN KEY (`pago_idpago`) REFERENCES `pago` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol_has_permiso`
--
ALTER TABLE `rol_has_permiso`
  ADD CONSTRAINT `fk_rol_has_permiso_permiso1` FOREIGN KEY (`permiso_idpermiso`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rol_has_permiso_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
