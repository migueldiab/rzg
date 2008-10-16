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
CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL auto_increment,
  `id_equipamiento` int(11) NOT NULL,
  `id_fecha_carrera` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_alquileres_equipamiento_id` (`id_equipamiento`),
  KEY `fk_alquileres_fecha_carrera_id` (`id_fecha_carrera`),
  KEY `fk_alquileres_usuarios` (`id_usuario`),
  CONSTRAINT `fk_alquileres_equipamiento_id` FOREIGN KEY (`id_equipamiento`) REFERENCES `inventario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_fecha_carrera_id` FOREIGN KEY (`id_fecha_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `url` varchar(45) default NULL,
  `descripcion` text,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `carrera` (`id`,`nombre`,`url`,`descripcion`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES 
 (0,'test',NULL,NULL,'2008-10-14 23:34:10',NULL,'2008-10-14 23:34:10',NULL);
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `regla` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `categoria` (`id`,`nombre`,`updated_at`,`updated_by`,`regla`) VALUES 
 (0,'Damas','2008-10-13 00:00:00',NULL,NULL),
 (1,'Caballeros',NULL,NULL,NULL);
CREATE TABLE `categoria_carrera` (
  `id_categoria` int(11) NOT NULL,
  `id_carrera` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id_categoria`),
  KEY `fk_categoria_carrera_id_categoria` (`id_categoria`),
  KEY `fk_categoria_carrera_carrera` (`id_carrera`),
  CONSTRAINT `fk_categoria_carrera_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
CREATE TABLE `corredor` (
  `id` int(11) NOT NULL auto_increment,
  `documento` varchar(45) default NULL,
  `tipo_documento` int(11) default NULL,
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
  CONSTRAINT `fk_corredor_chips` FOREIGN KEY (`id_chips`) REFERENCES `chip` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad` FOREIGN KEY (`id_localidad`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_sociedad_medida` FOREIGN KEY (`id_sociedad_medica`) REFERENCES `sociedad_medica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
CREATE TABLE `equipamiento_carrera` (
  `id_carrera` int(11) NOT NULL auto_increment,
  `id_tipo_equipamiento` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id_carrera`),
  KEY `fk_equipamiento_carrera_id_carrera` (`id_carrera`),
  KEY `fk_equipamiento_carrera_tipo_equipamiento` (`id_tipo_equipamiento`),
  CONSTRAINT `fk_equipamiento_carrera_id_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento` FOREIGN KEY (`id_tipo_equipamiento`) REFERENCES `tipo_equipamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `etapa_carrera` (
  `id` int(11) NOT NULL auto_increment,
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(45) default NULL,
  `numero_etapa` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`,`id_carrera`),
  KEY `fk_etapa_carrera_etapa` (`id_carrera`),
  CONSTRAINT `fk_etapa_carrera_etapa` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `fecha_etapa_carrera` (
  `id` int(11) NOT NULL auto_increment,
  `id_etapa_carrera` int(11) NOT NULL,
  `max_corredores` int(11) default NULL,
  `fecha_inicio` date default NULL,
  `fecha_fin` date default NULL,
  `costo` double default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`,`id_etapa_carrera`),
  KEY `fk_fecha_carrera_id_carrera` (`id_etapa_carrera`),
  CONSTRAINT `fk_fecha_carrera_id_carrera` FOREIGN KEY (`id_etapa_carrera`) REFERENCES `etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `forma_pago` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL COMMENT '	',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL auto_increment,
  `id_carrera` int(11) NOT NULL,
  `id_corredor` int(11) NOT NULL,
  `created_at` timestamp NULL default NULL,
  `created_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  `fecha_inscripcion` date default NULL,
  `firma_digital` varchar(255) default NULL,
  `cuenta_corriente_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_inscripcion_id_carrera` (`id_carrera`),
  KEY `fk_inscripcion_id_corredor` (`id_corredor`),
  KEY `fk_inscripcion_cuenta_corriente` (`cuenta_corriente_id`),
  CONSTRAINT `fk_inscripcion_cuenta_corriente` FOREIGN KEY (`cuenta_corriente_id`) REFERENCES `cuenta_corriente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `localidad` (
  `id` int(11) NOT NULL auto_increment,
  `id_pais` int(11) default NULL,
  `nombre` varchar(45) default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_localidad_id_pais` (`id_pais`),
  CONSTRAINT `fk_localidad_id_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `pais` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_by` int(11) default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `permiso` (
  `permiso` varchar(15) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`permiso`,`grupos_id`),
  KEY `fk_permiso_grupos` (`grupos_id`),
  CONSTRAINT `fk_permiso_grupos` FOREIGN KEY (`grupos_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
CREATE TABLE `resultado` (
  `id` int(11) NOT NULL auto_increment,
  `id_fecha_carrera` int(11) NOT NULL,
  `id_corredor` int(11) NOT NULL,
  `tiempo` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_resultados_fecha_carrera` (`id_fecha_carrera`),
  KEY `fk_resultado_corredor` (`id_corredor`),
  CONSTRAINT `fk_resultados_fecha_carrera` FOREIGN KEY (`id_fecha_carrera`) REFERENCES `fecha_etapa_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `sociedad_medica` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `tipo_equipamiento` (
  `id` int(11) NOT NULL auto_increment,
  `tipo` varchar(45) default NULL,
  `updated_at` timestamp NULL default NULL,
  `updated_by` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  KEY `fk_usuario_grupos` (`id_grupo`),
  KEY `fk_usuario_corredor` (`id_corredor`),
  CONSTRAINT `fk_usuarios_corredor` FOREIGN KEY (`id_corredor`) REFERENCES `corredor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_grupos` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
