-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2016 a las 23:04:59
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sada`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE IF NOT EXISTS `alquileres` (
  `idAlquileres` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  `Temporada` varchar(45) COLLATE utf8_bin NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_Activa` date NOT NULL,
  PRIMARY KEY (`idAlquileres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE IF NOT EXISTS `barrio` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref1916` (`iddepartamento`,`idmunicipio`,`idprovincia`,`idpais`),
  KEY `Refmunicipio16` (`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `ciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'Formosa', 1, 1, 1, 1),
(2, 'Mojon de fierro', 2, 1, 1, 1),
(3, 'Tres marias', 1, 1, 1, 1),
(4, 'Villa del Carmen', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
  `idcontratos` int(11) NOT NULL AUTO_INCREMENT,
  `contratoscol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idAlquileres` int(11) NOT NULL,
  PRIMARY KEY (`idcontratos`,`idAlquileres`),
  KEY `Ref123` (`idAlquileres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref1826` (`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `departamento`, `idprovincia`, `idpais`) VALUES
(1, 'Formosa', 1, 1),
(2, 'Pirane', 1, 1),
(3, 'Patiño', 1, 1),
(4, 'Ramon lista', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotopersona`
--

CREATE TABLE IF NOT EXISTS `fotopersona` (
  `idFotoPersona` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idpersonas` int(11) unsigned zerofill NOT NULL,
  `foto` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idFotoPersona`),
  KEY `idFotoPersona` (`idFotoPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `fotopersona`
--

INSERT INTO `fotopersona` (`idFotoPersona`, `idpersonas`, `foto`) VALUES
(00000000006, 00000000019, 'avatar19.jpg'),
(00000000011, 00000000017, 'avatar17.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotopropiedad`
--

CREATE TABLE IF NOT EXISTS `fotopropiedad` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `idpropiedad` int(11) DEFAULT NULL,
  `foto` char(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `fotopropiedad`
--

INSERT INTO `fotopropiedad` (`idfoto`, `idpropiedad`, `foto`) VALUES
(31, 1, '11.jpg'),
(32, 1, 'images (49).jpg'),
(33, 2, 'images (46).jpg'),
(34, 2, 'images (47).jpg'),
(35, 2, 'images (57).jpg'),
(36, 2, 'images (3).jpg'),
(37, 3, 'images (34).jpg'),
(38, 3, 'images (36).jpg'),
(39, 4, 'images (55).jpg'),
(40, 4, '12.jpg'),
(41, 5, 'images (38).jpg'),
(42, 5, 'images (20).jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `link` varchar(60) COLLATE utf8_bin NOT NULL,
  `Texto` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `idmunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref2427` (`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idmunicipio`, `municipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'Formosa', 1, 1, 1),
(2, 'Mojon de Fierro', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `pais`) VALUES
(1, 'Argentina'),
(2, 'Paraguay'),
(3, 'Brasil'),
(4, 'Uruguay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(35) COLLATE utf8_bin NOT NULL,
  `privilegios` int(11) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`, `privilegios`, `nivel`) VALUES
(1, 'Administrador', 1, 1),
(2, 'Gerencia', 1, 2),
(3, 'Analista', 1, 3),
(4, 'Usuario', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `idpersonas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(12) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `idbarrio` int(11) NOT NULL,
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idpersonas`),
  KEY `Ref331` (`idciudad`,`idprovincia`,`idmunicipio`,`idpais`,`idbarrio`,`iddepartamento`),
  KEY `Refbarrio31` (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersonas`, `nombre`, `apellido`, `nacimiento`, `mail`, `telefono`, `direccion`, `documento`, `idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(17, 'f', 'f', '2016-02-06', 'fernando@bgf.com', 'f', 'fs', 1116, 1, 1, 1, 1, 1, 1),
(18, 'Fernanado', 'gomez', '2016-02-09', 'jorge@gmail.com', '3704300465', 'Julio a Roca 2500', 1541, 1, 1, 1, 1, 1, 1),
(19, 'Fernanado', 'gomez', '2016-02-09', 'jorge@gmail.com', '3704300465', 'Julio a Roca 2500', 1541, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas usuario`
--

CREATE TABLE IF NOT EXISTS `personas usuario` (
  `idpersonas` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idpersonas`,`idusuario`),
  KEY `Ref1135` (`idpersonas`),
  KEY `Ref2336` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personas usuario`
--

INSERT INTO `personas usuario` (`idpersonas`, `idusuario`) VALUES
(17, 55),
(18, 59),
(19, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
  `idpropiedad` int(11) NOT NULL AUTO_INCREMENT,
  `FPublicacion` datetime NOT NULL,
  `superficie` int(11) NOT NULL,
  `direccion` varchar(45) COLLATE utf8_bin NOT NULL,
  `valor` decimal(11,0) NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL,
  `banos` tinyint(4) DEFAULT NULL,
  `habitaciones` tinyint(4) DEFAULT NULL,
  `pileta` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `otros` varchar(145) COLLATE utf8_bin DEFAULT NULL,
  `tipopropiedad_id_tipoPropiedad` int(11) NOT NULL,
  `idbarrio` int(11) NOT NULL,
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  `localizacion` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idpropiedad`,`tipopropiedad_id_tipoPropiedad`),
  KEY `fk_propiedades_tipopropiedad1_idx` (`tipopropiedad_id_tipoPropiedad`),
  KEY `fk_propiedades_tipopropiedad1` (`tipopropiedad_id_tipoPropiedad`),
  KEY `Ref329` (`idmunicipio`,`idpais`,`idbarrio`,`iddepartamento`,`idciudad`,`idprovincia`),
  KEY `Refbarrio29` (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`idpropiedad`, `FPublicacion`, `superficie`, `direccion`, `valor`, `Descripcion`, `banos`, `habitaciones`, `pileta`, `otros`, `tipopropiedad_id_tipoPropiedad`, `idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`, `localizacion`) VALUES
(1, '2015-10-14 11:00:00', 1515, 'Julio a Roca 2500', '8500', '2 habitaciones , cocina comedor, 1 baño, servicios', 1, 1, '0', 'sin datos', 2, 1, 1, 1, 1, 1, 1, '-26.19576235288338,-58.17284345626831'),
(2, '2014-02-05 11:00:00', 3500, 'Av. 25 de mayo 400', '4500', 'Latex, Armarios, Cocina, Modular de cocina , Servicios', 2, 2, '1', 'Termotanque', 1, 2, 1, 1, 1, 1, 1, '-26.183651097835064,-58.16857874393463'),
(3, '2016-10-14 11:00:00', 2500, 'Av. napoleon Uriburu 455', '3500', 'Pañalero, cochera, Start, Termotanque, Telefono', 2, 3, '1', 's/n', 1, 2, 1, 1, 1, 1, 1, '-26.184594627154706,-58.204214572906494'),
(4, '2016-01-15 11:00:00', 3600, 'Mitre 1500', '3800', 'Patio, termotanque', 2, 3, '0', 's/n', 1, 1, 1, 1, 1, 1, 1, '-26.192335130235847,-58.16757559776306'),
(5, '0000-00-00 00:00:00', 4500, 'Rivadavia 800', '7800', 'Termotanque , solarium, Termotanque solar, energía eólica ', 3, 4, '0', 's/n', 1, 1, 1, 1, 1, 1, 1, '-26.182149137443243,-58.166502714157104');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades alquileres`
--

CREATE TABLE IF NOT EXISTS `propiedades alquileres` (
  `idpropiedad` int(11) NOT NULL,
  `idAlquileres` int(11) NOT NULL,
  `tipopropiedad_id_tipoPropiedad` int(11) NOT NULL,
  PRIMARY KEY (`idpropiedad`,`idAlquileres`,`tipopropiedad_id_tipoPropiedad`),
  KEY `Ref1221` (`idpropiedad`,`tipopropiedad_id_tipoPropiedad`),
  KEY `Ref122` (`idAlquileres`),
  KEY `tipopropiedad_id_tipoPropiedad` (`tipopropiedad_id_tipoPropiedad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idprovincia` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idprovincia`,`idpais`),
  KEY `Ref1714` (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idprovincia`, `provincia`, `idpais`) VALUES
(1, 'Formosa', 1),
(2, 'Chaco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `id` char(128) COLLATE utf8_bin NOT NULL,
  `horario` char(10) COLLATE utf8_bin NOT NULL,
  `data` text COLLATE utf8_bin NOT NULL,
  `clave_sesion` char(128) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopropiedad`
--

CREATE TABLE IF NOT EXISTS `tipopropiedad` (
  `idtipoPropiedad` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idtipoPropiedad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipopropiedad`
--

INSERT INTO `tipopropiedad` (`idtipoPropiedad`, `Tipo`) VALUES
(1, 'Casa'),
(2, 'Departamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `clave` char(36) COLLATE utf8_bin DEFAULT NULL,
  `mail` char(50) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `mail` (`mail`),
  KEY `Ref1040` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `clave`, `mail`, `fecha`, `id_perfil`) VALUES
(55, 'dadasd@dsad', '7815696ecbf1c96e6894b779456d330e', 'fernando@bgf.com', '2015-11-18', 4),
(57, 'Daniel', '848ffd503f98d2368d47abceb4821465', 'jorge.daniel.castro.formosa@gmail.com', '2015-11-19', 1),
(58, 'Pomelo', '848ffd503f98d2368d47abceb4821465', 'jose@diego', '2016-01-06', 1),
(59, 'CArlos', 'dc599a9972fde3045dab59dbd1ae170b', 'jorge@fdfsd.com', '2016-01-07', 1),
(60, 'Fernando', '81dc9bdb52d04dc20036dbd8313ed055', 'jorge@gmail.com', '2016-01-13', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `Refciudad28` FOREIGN KEY (`idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) REFERENCES `ciudad` (`idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `Refmunicipio16` FOREIGN KEY (`idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) REFERENCES `municipio` (`idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`);

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `Refalquileres23` FOREIGN KEY (`idAlquileres`) REFERENCES `alquileres` (`idAlquileres`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `Refprovincia26` FOREIGN KEY (`idprovincia`, `idpais`) REFERENCES `provincia` (`idprovincia`, `idpais`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `Refdepartamento27` FOREIGN KEY (`iddepartamento`, `idprovincia`, `idpais`) REFERENCES `departamento` (`iddepartamento`, `idprovincia`, `idpais`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `Refbarrio31` FOREIGN KEY (`idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) REFERENCES `barrio` (`idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`);

--
-- Filtros para la tabla `personas usuario`
--
ALTER TABLE `personas usuario`
  ADD CONSTRAINT `Refpersonas35` FOREIGN KEY (`idpersonas`) REFERENCES `personas` (`idpersonas`),
  ADD CONSTRAINT `Refusuario36` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `fk_propiedades_tipopropiedad1` FOREIGN KEY (`tipopropiedad_id_tipoPropiedad`) REFERENCES `tipopropiedad` (`idtipoPropiedad`),
  ADD CONSTRAINT `Refbarrio29` FOREIGN KEY (`idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) REFERENCES `barrio` (`idbarrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`);

--
-- Filtros para la tabla `propiedades alquileres`
--
ALTER TABLE `propiedades alquileres`
  ADD CONSTRAINT `Refalquileres22` FOREIGN KEY (`idAlquileres`) REFERENCES `alquileres` (`idAlquileres`),
  ADD CONSTRAINT `Refpropiedades21` FOREIGN KEY (`idpropiedad`, `tipopropiedad_id_tipoPropiedad`) REFERENCES `propiedades` (`idpropiedad`, `tipopropiedad_id_tipoPropiedad`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `Refpais14` FOREIGN KEY (`idpais`) REFERENCES `pais` (`idpais`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Refperfil40` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
