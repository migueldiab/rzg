-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema suca_sports
--

CREATE DATABASE IF NOT EXISTS suca_sports;
USE suca_sports;

--
-- Definition of table `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL auto_increment,
  `id_equipamiento` int(11) NOT NULL,
  `id_fecha_etapa_carrera` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_alquileres_equipamiento_id` (`id_equipamiento`),
  KEY `fk_alquileres_fecha_carrera_id` (`id_fecha_etapa_carrera`),
  KEY `fk_alquileres_usuarios` (`id_usuario`),
  CONSTRAINT `fk_alquileres_equipamiento_id` FOREIGN KEY (`id_equipamiento`) REFERENCES `inventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_fecha_carrera_id` FOREIGN KEY (`id_fecha_etapa_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alquiler`
--

/*!40000 ALTER TABLE `alquiler` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquiler` ENABLE KEYS */;


--
-- Definition of table `asociacion`
--

DROP TABLE IF EXISTS `asociacion`;
CREATE TABLE `asociacion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `direccion` varchar(45) default NULL,
  `telefono` varchar(45) default NULL,
  `contacto` varchar(45) default NULL,
  `created_by` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asociacion`
--

/*!40000 ALTER TABLE `asociacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `asociacion` ENABLE KEYS */;


--
-- Definition of table `asociacion_corredor`
--

DROP TABLE IF EXISTS `asociacion_corredor`;
CREATE TABLE `asociacion_corredor` (
  `id_corredor` int(11) NOT NULL,
  `id_asociacion` int(11) NOT NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id_asociacion`,`id_corredor`),
  KEY `fk_asociacion_has_corredor_asociacion` (`id_asociacion`),
  KEY `fk_asociacion_has_corredor_corredor` (`id_corredor`),
  CONSTRAINT `fk_asociacion_has_corredor_asociacion` FOREIGN KEY (`id_asociacion`) REFERENCES `asociacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asociacion_has_corredor_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asociacion_corredor`
--

/*!40000 ALTER TABLE `asociacion_corredor` DISABLE KEYS */;
/*!40000 ALTER TABLE `asociacion_corredor` ENABLE KEYS */;


--
-- Definition of table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `url` varchar(45) default NULL,
  `descripcion` text,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carrera`
--

/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` (`id`,`nombre`,`url`,`descripcion`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES 
 (1,'Carrera de Pepe','http://','Esta es la carrera de pepe',NULL,NULL,'2008-10-25 19:18:15',NULL),
 (35,'Carrera de Rodrigo','http://','Descripcion','2008-10-28 20:54:38',NULL,'2008-10-28 20:54:38',NULL);
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `regla` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`,`nombre`,`updated_at`,`updated_by`,`regla`) VALUES 
 (1,'Caballeros',NULL,NULL,NULL),
 (2,'Lisiados','2008-10-28 21:08:49',0,'Solo pueden competir personas con algun tipo de discapacidad fisica.'),
 (3,'Damas','2008-10-28 21:09:04',0,'Categoria damas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `categoria_carrera`
--

DROP TABLE IF EXISTS `categoria_carrera`;
CREATE TABLE `categoria_carrera` (
  `id_categoria` int(11) NOT NULL default '0',
  `id_carrera` int(11) NOT NULL default '0',
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id_carrera`,`id_categoria`),
  KEY `fk_categoria_carrera_id_categoria` (`id_categoria`),
  KEY `fk_categoria_carrera_carrera` (`id_carrera`),
  CONSTRAINT `fk_categoria_carrera_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria_carrera`
--

/*!40000 ALTER TABLE `categoria_carrera` DISABLE KEYS */;
INSERT INTO `categoria_carrera` (`id_categoria`,`id_carrera`,`updated_at`,`updated_by`) VALUES 
 (1,1,'2008-10-28 20:52:04',NULL),
 (1,35,'2008-10-28 21:00:43',NULL);
/*!40000 ALTER TABLE `categoria_carrera` ENABLE KEYS */;


--
-- Definition of table `chip`
--

DROP TABLE IF EXISTS `chip`;
CREATE TABLE `chip` (
  `id` int(11) NOT NULL auto_increment,
  `codigo_chip` varchar(45) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `id_estado` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_chip_estado` (`id_estado`),
  CONSTRAINT `fk_chip_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chip`
--

/*!40000 ALTER TABLE `chip` DISABLE KEYS */;
/*!40000 ALTER TABLE `chip` ENABLE KEYS */;


--
-- Definition of table `corredor`
--

DROP TABLE IF EXISTS `corredor`;
CREATE TABLE `corredor` (
  `id` int(11) NOT NULL auto_increment,
  `documento` varchar(45) default NULL,
  `id_tipo_documento` int(11) default NULL,
  `nombre` varchar(45) default NULL,
  `apellido` varchar(45) default NULL,
  `telefono` varchar(45) default NULL,
  `movil` varchar(45) default NULL,
  `telefono_emergencia` varchar(45) default NULL,
  `direccion` varchar(45) default NULL,
  `fecha_nacimiento` date default NULL,
  `pareja` varchar(45) default NULL,
  `hijos` varchar(45) default NULL,
  `id_sociedad_medica` int(11) default NULL,
  `historia_medica` text,
  `sexo` varchar(1) default NULL,
  `id_localidad` int(11) default NULL,
  `id_pais` int(11) default NULL,
  `id_chips` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_corredor_id_sociedad_medida` (`id_sociedad_medica`),
  KEY `fk_corredor_id_pais` (`id_pais`),
  KEY `fk_corredor_id_localidad` (`id_localidad`),
  KEY `fk_corredor_chips` (`id_chips`),
  KEY `fk_corredor_tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `fk_corredor_chips` FOREIGN KEY (`id_chips`) REFERENCES `chip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_sociedad_medida` FOREIGN KEY (`id_sociedad_medica`) REFERENCES `sociedad_medica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corredor`
--

/*!40000 ALTER TABLE `corredor` DISABLE KEYS */;
/*!40000 ALTER TABLE `corredor` ENABLE KEYS */;


--
-- Definition of table `corredor_equipamiento`
--

DROP TABLE IF EXISTS `corredor_equipamiento`;
CREATE TABLE `corredor_equipamiento` (
  `id_corredor` int(11) NOT NULL,
  `id_equipamiento` int(11) NOT NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id_corredor`,`id_equipamiento`),
  KEY `fk_corredor_has_equipamiento_corredor` (`id_corredor`),
  KEY `fk_corredor_has_equipamiento_equipamiento` (`id_equipamiento`),
  CONSTRAINT `fk_corredor_has_equipamiento_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_has_equipamiento_equipamiento` FOREIGN KEY (`id_equipamiento`) REFERENCES `equipamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corredor_equipamiento`
--

/*!40000 ALTER TABLE `corredor_equipamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `corredor_equipamiento` ENABLE KEYS */;


--
-- Definition of table `cuenta_corriente`
--

DROP TABLE IF EXISTS `cuenta_corriente`;
CREATE TABLE `cuenta_corriente` (
  `id` int(11) NOT NULL auto_increment,
  `id_corredor` int(11) NOT NULL,
  `id_forma_pago` int(11) NOT NULL,
  `monto` double NOT NULL,
  `concepto` varchar(45) default NULL,
  `firma_digital` varchar(255) default NULL,
  `fecha_de_pago` date default NULL,
  `nota` text,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_cuenta_corriente_id_corredor` (`id_corredor`),
  KEY `fk_cuenta_corriente_id_forma_pago` (`id_forma_pago`),
  KEY `idx_cuenta_corriente_fecha_de_pago_desc` (`fecha_de_pago`),
  CONSTRAINT `fk_cuenta_corriente_id_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_corriente_id_forma_pago` FOREIGN KEY (`id_forma_pago`) REFERENCES `forma_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuenta_corriente`
--

/*!40000 ALTER TABLE `cuenta_corriente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta_corriente` ENABLE KEYS */;


--
-- Definition of table `equipamiento`
--

DROP TABLE IF EXISTS `equipamiento`;
CREATE TABLE `equipamiento` (
  `id` int(11) NOT NULL auto_increment,
  `marca` varchar(45) default NULL,
  `id_tipo_equipamiento` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_equipamiento_tipo_equipamiento` (`id_tipo_equipamiento`),
  CONSTRAINT `fk_equipamiento_tipo_equipamiento` FOREIGN KEY (`id_tipo_equipamiento`) REFERENCES `tipo_equipamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipamiento`
--

/*!40000 ALTER TABLE `equipamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipamiento` ENABLE KEYS */;


--
-- Definition of table `equipamiento_carrera`
--

DROP TABLE IF EXISTS `equipamiento_carrera`;
CREATE TABLE `equipamiento_carrera` (
  `id_fecha_etapa_carrera` int(11) NOT NULL default '0',
  `id_tipo_equipamiento` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  USING BTREE (`id_fecha_etapa_carrera`,`id_tipo_equipamiento`),
  KEY `fk_equipamiento_carrera_id_carrera` (`id_fecha_etapa_carrera`),
  KEY `fk_equipamiento_carrera_tipo_equipamiento` (`id_tipo_equipamiento`),
  CONSTRAINT `fk_equipamiento_carrera_id_carrera` FOREIGN KEY (`id_fecha_etapa_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento` FOREIGN KEY (`id_tipo_equipamiento`) REFERENCES `tipo_equipamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipamiento_carrera`
--

/*!40000 ALTER TABLE `equipamiento_carrera` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipamiento_carrera` ENABLE KEYS */;


--
-- Definition of table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`,`nombre`,`updated_at`,`updated_by`) VALUES 
 (1,'En Stock',NULL,NULL),
 (2,'Sin Stock',NULL,NULL),
 (3,'Alquilado',NULL,NULL);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


--
-- Definition of table `etapa_carrera`
--

DROP TABLE IF EXISTS `etapa_carrera`;
CREATE TABLE `etapa_carrera` (
  `id` int(11) NOT NULL auto_increment,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `numero_etapa` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_etapa_carrera_etapa` (`id_carrera`),
  CONSTRAINT `fk_etapa_carrera_etapa` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etapa_carrera`
--

/*!40000 ALTER TABLE `etapa_carrera` DISABLE KEYS */;
INSERT INTO `etapa_carrera` (`id`,`id_carrera`,`nombre`,`numero_etapa`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES 
 (1,0,'Primera etapa',1,NULL,NULL,NULL,NULL),
 (2,0,'Segunda etapa',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `etapa_carrera` ENABLE KEYS */;


--
-- Definition of table `fecha_etapa_carrera`
--

DROP TABLE IF EXISTS `fecha_etapa_carrera`;
CREATE TABLE `fecha_etapa_carrera` (
  `id` int(11) NOT NULL auto_increment,
  `max_corredores` int(11) default NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date default NULL,
  `costo` double default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `id_etapa_carrera` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_etapa_carrera_fecha` (`fecha_inicio`,`id_etapa_carrera`,`id_carrera`),
  KEY `fk_fecha_etapa_carrera_etapa_carrera` (`id_etapa_carrera`,`id_carrera`),
  CONSTRAINT `fk_fecha_etapa_carrera_etapa_carrera` FOREIGN KEY (`id_etapa_carrera`) REFERENCES `etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 CONSTRAINT `fk_fecha_etapa_carrera_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fecha_etapa_carrera`
--

/*!40000 ALTER TABLE `fecha_etapa_carrera` DISABLE KEYS */;
INSERT INTO `fecha_etapa_carrera` (`id`,`max_corredores`,`fecha_inicio`,`fecha_fin`,`costo`,`created_at`,`created_by`,`updated_at`,`updated_by`,`id_etapa_carrera`,`id_carrera`) VALUES 
 (1,10,'2008-10-25','2008-10-25',NULL,NULL,NULL,NULL,NULL,1,0),
 (2,5,'2008-10-26','2008-10-26',NULL,NULL,NULL,NULL,NULL,2,0);
/*!40000 ALTER TABLE `fecha_etapa_carrera` ENABLE KEYS */;


--
-- Definition of table `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE `forma_pago` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forma_pago`
--

/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;


--
-- Definition of table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL COMMENT '	',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupo`
--

/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;


--
-- Definition of table `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE `inscripcion` (
  `id_fecha_etapa_carrera` int(11) NOT NULL,
  `id_corredor` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `fecha_inscripcion` date default NULL,
  `firma_digital` varchar(255) default NULL,
  `cuenta_corriente_id` int(11) default NULL,
  PRIMARY KEY  USING BTREE (`id_fecha_etapa_carrera`,`id_corredor`),
  KEY `fk_inscripcion_id_carrera` (`id_fecha_etapa_carrera`),
  KEY `fk_inscripcion_id_corredor` (`id_corredor`),
  KEY `fk_inscripcion_cuenta_corriente` (`cuenta_corriente_id`),
  CONSTRAINT `fk_inscripcion_cuenta_corriente` FOREIGN KEY (`cuenta_corriente_id`) REFERENCES `cuenta_corriente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_carrera` FOREIGN KEY (`id_fecha_etapa_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscripcion`
--

/*!40000 ALTER TABLE `inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripcion` ENABLE KEYS */;


--
-- Definition of table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `id_tipo_equipamiento` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `id_estado` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_inventario_tipo_equipamiento` (`id_tipo_equipamiento`),
  KEY `fk_inventario_estado` (`id_estado`),
  CONSTRAINT `fk_inventario_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_tipo_equipamiento` FOREIGN KEY (`id_tipo_equipamiento`) REFERENCES `equipamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventario`
--

/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` (`id`,`nombre`,`id_tipo_equipamiento`,`updated_at`,`updated_by`,`id_estado`) VALUES 
 (1,'Kayak de Aluminio 1.80x0.60',NULL,'2008-10-28 12:07:00',0,2),
 (2,'Kayak de Fibra 1.80x70cm',NULL,'2008-10-28 13:01:04',0,2);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;


--
-- Definition of table `localidad`
--

DROP TABLE IF EXISTS `localidad`;
CREATE TABLE `localidad` (
  `id` int(11) NOT NULL auto_increment,
  `id_pais` int(11) default NULL,
  `nombre` varchar(45) default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_localidad_id_pais` (`id_pais`),
  CONSTRAINT `fk_localidad_id_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localidad`
--

/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
INSERT INTO `localidad` (`id`,`id_pais`,`nombre`,`updated_by`,`updated_at`) VALUES 
 (1,1,'Maldonado',NULL,NULL);
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;


--
-- Definition of table `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pais`
--

/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`id`,`nombre`,`updated_by`,`updated_at`) VALUES 
 (1,'Uruguay',NULL,NULL);
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


--
-- Definition of table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `permiso` varchar(15) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`permiso`,`grupos_id`),
  KEY `fk_permiso_grupos` (`grupos_id`),
  CONSTRAINT `fk_permiso_grupos` FOREIGN KEY (`grupos_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permiso`
--

/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;


--
-- Definition of table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `texto` text,
  `created_by` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_post_usuarios` (`created_by`),
  KEY `fk_post_usuarios1` (`updated_by`),
  CONSTRAINT `fk_post_usuarios` FOREIGN KEY (`created_by`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_usuarios1` FOREIGN KEY (`updated_by`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


--
-- Definition of table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE `resultado` (
  `id_fecha_etapa_carrera` int(11) NOT NULL,
  `id_corredor` int(11) NOT NULL,
  `tiempo` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  USING BTREE (`id_fecha_etapa_carrera`,`id_corredor`),
  KEY `fk_resultados_fecha_carrera` (`id_fecha_etapa_carrera`),
  KEY `fk_resultado_corredor` (`id_corredor`),
  CONSTRAINT `fk_resultados_fecha_carrera` FOREIGN KEY (`id_fecha_etapa_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultado`
--

/*!40000 ALTER TABLE `resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado` ENABLE KEYS */;


--
-- Definition of table `sociedad_medica`
--

DROP TABLE IF EXISTS `sociedad_medica`;
CREATE TABLE `sociedad_medica` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sociedad_medica`
--

/*!40000 ALTER TABLE `sociedad_medica` DISABLE KEYS */;
INSERT INTO `sociedad_medica` (`id`,`nombre`,`updated_at`,`updated_by`) VALUES 
 (1,'Asistencial Medica de Maldonado',NULL,NULL);
/*!40000 ALTER TABLE `sociedad_medica` ENABLE KEYS */;


--
-- Definition of table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_documento`
--

/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` (`id`,`nombre`) VALUES 
 (1,'CI'),
 (2,'Pasaporte');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;


--
-- Definition of table `tipo_equipamiento`
--

DROP TABLE IF EXISTS `tipo_equipamiento`;
CREATE TABLE `tipo_equipamiento` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_equipamiento`
--

/*!40000 ALTER TABLE `tipo_equipamiento` DISABLE KEYS */;
INSERT INTO `tipo_equipamiento` (`id`,`tipo`,`updated_at`,`updated_by`) VALUES 
 (1,'Administrativo',NULL,NULL),
 (2,'Nautico',NULL,NULL),
 (3,'Miscelaneo',NULL,NULL);
/*!40000 ALTER TABLE `tipo_equipamiento` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `id_grupo` int(11) default NULL,
  `id_corredor` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_usuarios_grupos` (`id_grupo`),
  KEY `fk_usuarios_corredor` (`id_corredor`),
  CONSTRAINT `fk_usuarios_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_grupos` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
