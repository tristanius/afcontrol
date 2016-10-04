-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2016 at 06:58 AM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `burningw_afcontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `afiliado`
--

CREATE TABLE IF NOT EXISTS `afiliado` (
  `idafiliado` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` tinyint(1) DEFAULT NULL,
  `morageneral` tinyint(1) NOT NULL,
  PRIMARY KEY (`idafiliado`),
  UNIQUE KEY `identificacion_UNIQUE` (`identificacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `afiliado`
--

INSERT INTO `afiliado` (`idafiliado`, `identificacion`, `tipo_identificacion`, `nombres`, `apellidos`, `correo`, `fecha_nacimiento`, `tipo_sanguineo`, `telefono`, `direccion`, `entidad_salud`, `estado`, `morageneral`) VALUES
(1, '00001', 'T.I.', 'Yeison', 'Torrado López', 'test@test.com', '2005-11-04', 'A+', '57881', 'av 11', 'Coomeva', 1, 0),
(2, '1090422853', 'C.C.', 'Yeison', 'Torrado', 'yeiman_4@hotmail.com', '1990-07-24', 'a+', '5745630', NULL, 'COOMEVA', 0, 0),
(3, '13504568', 'T.I.', 'LUIS OMAR', 'CHITIVA JACOME', '', '2005-11-10', '', '3214453073', NULL, '', 1, 0),
(4, '13000000', 'T.I.', 'CESAR MANUEL', 'GOMEZ SUAREZ', NULL, '2008-12-23', NULL, '3214453073', NULL, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `afiliado_grupo`
--

CREATE TABLE IF NOT EXISTS `afiliado_grupo` (
  `idafiliado_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_afiliacion` date DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `mora` tinyint(1) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  `grupo_idgrupo` int(11) NOT NULL,
  PRIMARY KEY (`idafiliado_grupo`),
  KEY `fk_afiliado_grupo_afiliado1_idx` (`afiliado_idafiliado`),
  KEY `fk_afiliado_grupo_grupo1_idx` (`grupo_idgrupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `afiliado_grupo`
--

INSERT INTO `afiliado_grupo` (`idafiliado_grupo`, `fecha_afiliacion`, `fecha_inicio`, `fecha_fin`, `estado`, `mora`, `afiliado_idafiliado`, `grupo_idgrupo`) VALUES
(9, '2015-11-01', '2015-11-01', NULL, 1, 0, 1, 1),
(10, '2015-12-30', '2015-12-30', NULL, 1, 0, 3, 2),
(11, '2015-12-30', '2015-12-30', NULL, 1, 0, 3, 1),
(12, '2015-10-01', '2015-10-01', NULL, 1, 0, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `afiliado_has_entidad`
--

CREATE TABLE IF NOT EXISTS `afiliado_has_entidad` (
  `idafiliado_has_entidad` int(11) NOT NULL AUTO_INCREMENT,
  `entidad_identidad` int(11) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  PRIMARY KEY (`idafiliado_has_entidad`),
  KEY `fk_afiliado_has_entidad_entidad1_idx` (`entidad_identidad`),
  KEY `fk_afiliado_has_entidad_afiliado_idx` (`afiliado_idafiliado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `descripcion`) VALUES
(1, 'JUNIOR'),
(2, 'CATEGORIA 2006'),
(3, 'CATEGORIA 2007');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_familiar1` varchar(60) DEFAULT NULL,
  `telefono_familiar_1` varchar(25) DEFAULT NULL,
  `tipo_familiar1` varchar(45) DEFAULT NULL,
  `nombre_familiar2` varchar(60) DEFAULT NULL,
  `telefono_familiar2` varchar(25) DEFAULT NULL,
  `tipo_familiar2` varchar(45) DEFAULT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  PRIMARY KEY (`idcontacto`,`afiliado_idafiliado`),
  KEY `fk_contacto_afiliado1_idx` (`afiliado_idafiliado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `nombre_familiar1`, `telefono_familiar_1`, `tipo_familiar1`, `nombre_familiar2`, `telefono_familiar2`, `tipo_familiar2`, `afiliado_idafiliado`) VALUES
(1, 'test', NULL, NULL, 'TESTPADRE', NULL, NULL, 1),
(2, 'Nancy Lopez', NULL, NULL, 'Edgar Torrado (Fallecido)', NULL, NULL, 2),
(3, 'GRACIAE', NULL, NULL, 'LAFONSO', NULL, NULL, 3),
(4, '', NULL, NULL, '', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `entidad`
--

CREATE TABLE IF NOT EXISTS `entidad` (
  `identidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  PRIMARY KEY (`identidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(50) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`idgrupo`),
  KEY `fk_grupo_categoria1_idx` (`categoria_idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre_grupo`, `categoria_idcategoria`) VALUES
(1, 'ARQUEROS J1', 1),
(2, 'JUGADORES', 2),
(3, 'JUGADORES 2007', 3),
(5, 'ARQUEROS 2007', 3);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `idimg` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_img` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `afiliado_idafiliado` int(11) NOT NULL,
  PRIMARY KEY (`idimg`),
  KEY `fk_img_afiliado1_idx` (`afiliado_idafiliado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`idimg`, `nombre_img`, `ruta`, `afiliado_idafiliado`) VALUES
(1, '1.jpg', './uploads/afiliados/', 1),
(3, '21.png', './uploads/afiliados/', 2),
(4, '3.jpg', './uploads/afiliados/', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mensualidad`
--

CREATE TABLE IF NOT EXISTS `mensualidad` (
  `idmensualidad` int(11) NOT NULL AUTO_INCREMENT,
  `valor_mensualidad` double DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `observacion` varchar(2000) NOT NULL,
  `afiliado_grupo_idafiliado_grupo` int(11) NOT NULL,
  PRIMARY KEY (`idmensualidad`),
  KEY `fk_mensualidad_afiliado_grupo1_idx` (`afiliado_grupo_idafiliado_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `mensualidad`
--

INSERT INTO `mensualidad` (`idmensualidad`, `valor_mensualidad`, `fecha_pago`, `mes`, `year`, `observacion`, `afiliado_grupo_idafiliado_grupo`) VALUES
(23, 50000, '2015-12-29', 11, 2015, 'test', 9),
(24, 50000, '2015-12-29', 12, 2015, 'test', 9),
(25, 45000, '2015-12-30', 12, 2015, '', 10),
(26, 45000, '2015-12-30', 12, 2015, 'PAGO MES DICIEMBRE', 11),
(27, 800000, '2015-12-30', 12, 2015, 'MATRICULA Y MES DICIEMBRE 2015', 12),
(28, 45000, '2015-12-30', 10, 2015, '', 12),
(34, 40000, '2015-12-30', 11, 2015, 'asda', 12);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `password`, `mail`, `tipo`) VALUES
(1, '00000', 'MPNO7uUQ+f5e4ifOHgUPT70F/pQNSHC6GwyrDLKdwbt9gpok6TyHvQV+mcikeYWmMY2O7LN60siaaMQwdsaYAg==', 'yeiman_4@hotmail.com', 'AdminSys');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afiliado_grupo`
--
ALTER TABLE `afiliado_grupo`
  ADD CONSTRAINT `fk_afiliado_grupo_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_afiliado_grupo_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `afiliado_has_entidad`
--
ALTER TABLE `afiliado_has_entidad`
  ADD CONSTRAINT `fk_afiliado_has_entidad_afiliado` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_afiliado_has_entidad_entidad1` FOREIGN KEY (`entidad_identidad`) REFERENCES `entidad` (`identidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `fk_img_afiliado1` FOREIGN KEY (`afiliado_idafiliado`) REFERENCES `afiliado` (`idafiliado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD CONSTRAINT `fk_mensualidad_afiliado_grupo1` FOREIGN KEY (`afiliado_grupo_idafiliado_grupo`) REFERENCES `afiliado_grupo` (`idafiliado_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
