SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `suca_sports` ;
SHOW WARNINGS;
USE `suca_sports`;

-- -----------------------------------------------------
-- Table `suca_sports`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`estado` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`tipo_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`tipo_equipamiento` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`tipo_equipamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`equipamiento` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`equipamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `marca` VARCHAR(45) NULL DEFAULT NULL ,
  `id_tipo_equipamiento` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_equipamiento_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `suca_sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_equipamiento_tipo_equipamiento` ON `suca_sports`.`equipamiento` (`id_tipo_equipamiento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`inventario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`inventario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`inventario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `id_tipo_equipamiento` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `id_estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_inventario_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `suca_sports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `suca_sports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_inventario_tipo_equipamiento` ON `suca_sports`.`inventario` (`id_tipo_equipamiento` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_inventario_estado` ON `suca_sports`.`inventario` (`id_estado` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`chip`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`chip` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`chip` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `codigo_chip` VARCHAR(45) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `id_estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_chip_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `suca_sports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_chip_estado` ON `suca_sports`.`chip` (`id_estado` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`pais` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`pais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`localidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`localidad` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`localidad` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_pais` INT(11) NULL DEFAULT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_localidad_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `suca_sports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_localidad_id_pais` ON `suca_sports`.`localidad` (`id_pais` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`sociedad_medica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`sociedad_medica` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`sociedad_medica` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`tipo_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`tipo_documento` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`tipo_documento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`corredor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`corredor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `documento` VARCHAR(45) NULL DEFAULT NULL ,
  `id_tipo_documento` INT(11) NULL DEFAULT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `apellido` VARCHAR(45) NULL DEFAULT NULL ,
  `telefono` VARCHAR(45) NULL DEFAULT NULL ,
  `movil` VARCHAR(45) NULL DEFAULT NULL ,
  `telefono_emergencia` VARCHAR(45) NULL DEFAULT NULL ,
  `direccion` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_nacimiento` DATE NULL DEFAULT NULL ,
  `pareja` VARCHAR(45) NULL DEFAULT NULL ,
  `hijos` VARCHAR(45) NULL DEFAULT NULL ,
  `id_sociedad_medica` INT(11) NULL DEFAULT NULL ,
  `historia_medica` TEXT NULL DEFAULT NULL ,
  `sexo` VARCHAR(1) NULL DEFAULT NULL ,
  `id_localidad` INT(11) NULL DEFAULT NULL ,
  `id_pais` INT(11) NULL DEFAULT NULL ,
  `id_chips` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_corredor_chips`
    FOREIGN KEY (`id_chips` )
    REFERENCES `suca_sports`.`chip` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad`
    FOREIGN KEY (`id_localidad` )
    REFERENCES `suca_sports`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `suca_sports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_sociedad_medida`
    FOREIGN KEY (`id_sociedad_medica` )
    REFERENCES `suca_sports`.`sociedad_medica` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_tipo_documento`
    FOREIGN KEY (`id_tipo_documento` )
    REFERENCES `suca_sports`.`tipo_documento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_id_sociedad_medida` ON `suca_sports`.`corredor` (`id_sociedad_medica` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_id_pais` ON `suca_sports`.`corredor` (`id_pais` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_id_localidad` ON `suca_sports`.`corredor` (`id_localidad` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_chips` ON `suca_sports`.`corredor` (`id_chips` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_tipo_documento` ON `suca_sports`.`corredor` (`id_tipo_documento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`grupo` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL COMMENT '	' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`usuario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `id_grupo` INT(11) NULL DEFAULT NULL ,
  `id_corredor` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_usuarios_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`id_grupo` )
    REFERENCES `suca_sports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_usuarios_grupos` ON `suca_sports`.`usuario` (`id_grupo` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_usuarios_corredor` ON `suca_sports`.`usuario` (`id_corredor` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`carrera` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`carrera` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `url` VARCHAR(45) NULL DEFAULT NULL ,
  `descripcion` TEXT NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`etapa_carrera` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`etapa_carrera` (
  `id_etapa` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_carrera` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `numero_etapa` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_etapa`, `id_carrera`) ,
  CONSTRAINT `fk_etapa_carrera_etapa`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `suca_sports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_etapa_carrera_etapa` ON `suca_sports`.`etapa_carrera` (`id_carrera` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`fecha_etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`fecha_etapa_carrera` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`fecha_etapa_carrera` (
  `fecha_inicio` DATE NOT NULL ,
  `id_etapa` INT(11) NOT NULL ,
  `id_carrera` INT(11) NOT NULL ,
  `max_corredores` INT(11) NULL DEFAULT NULL ,
  `fecha_fin` DATE NULL DEFAULT NULL ,
  `costo` DOUBLE NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`fecha_inicio`, `id_etapa`, `id_carrera`) ,
  CONSTRAINT `fk_fecha_etapa_carrera_etapa_carrera`
    FOREIGN KEY (`id_etapa` , `id_carrera` )
    REFERENCES `suca_sports`.`etapa_carrera` (`id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_fecha_etapa_carrera_etapa_carrera` ON `suca_sports`.`fecha_etapa_carrera` (`id_etapa` ASC, `id_carrera` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`forma_pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`forma_pago` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`forma_pago` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`cuenta_corriente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`cuenta_corriente` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`cuenta_corriente` (
  `id` INT(11) NOT NULL ,
  `id_corredor` INT(11) NOT NULL ,
  `id_forma_pago` INT(11) NOT NULL ,
  `monto` DOUBLE NOT NULL ,
  `concepto` VARCHAR(45) NULL DEFAULT NULL ,
  `firma_digital` VARCHAR(255) NULL DEFAULT NULL ,
  `fecha_de_pago` DATE NULL DEFAULT NULL ,
  `nota` TEXT NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `id_corredor`) ,
  CONSTRAINT `fk_cuenta_corriente_id_forma_pago`
    FOREIGN KEY (`id_forma_pago` )
    REFERENCES `suca_sports`.`forma_pago` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_corriente_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'Transacciones Corredor';

SHOW WARNINGS;
CREATE INDEX `fk_cuenta_corriente_id_forma_pago` ON `suca_sports`.`cuenta_corriente` (`id_forma_pago` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ix_cuenta_corriente_fecha_de_pago_desc` ON `suca_sports`.`cuenta_corriente` (`fecha_de_pago` DESC) ;

SHOW WARNINGS;
CREATE INDEX `fk_cuenta_corriente_corredor` ON `suca_sports`.`cuenta_corriente` (`id_corredor` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`alquiler`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`alquiler` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`alquiler` (
  `id_inventario` INT(11) NOT NULL ,
  `fecha_inicio` DATE NOT NULL ,
  `id_etapa` INT(11) NOT NULL ,
  `id_carrera` INT(11) NOT NULL ,
  `id_cuenta_corriente` INT(11) NOT NULL ,
  `id_corredor` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_inventario`, `fecha_inicio`, `id_etapa`, `id_carrera`, `id_cuenta_corriente`, `id_corredor`) ,
  CONSTRAINT `fk_alquiler_inventario`
    FOREIGN KEY (`id_inventario` )
    REFERENCES `suca_sports`.`inventario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquiler_fecha_etapa_carrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `suca_sports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquiler_cuenta_corriente`
    FOREIGN KEY (`id_cuenta_corriente` , `id_corredor` )
    REFERENCES `suca_sports`.`cuenta_corriente` (`id` , `id_corredor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_alquiler_inventario` ON `suca_sports`.`alquiler` (`id_inventario` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_alquiler_fecha_etapa_carrera` ON `suca_sports`.`alquiler` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_alquiler_cuenta_corriente` ON `suca_sports`.`alquiler` (`id_cuenta_corriente` ASC, `id_corredor` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`asociacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`asociacion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`asociacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `direccion` VARCHAR(45) NULL DEFAULT NULL ,
  `telefono` VARCHAR(45) NULL DEFAULT NULL ,
  `contacto` VARCHAR(45) NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`asociacion_corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`asociacion_corredor` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`asociacion_corredor` (
  `id_corredor` INT(11) NOT NULL ,
  `id_asociacion` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_asociacion`, `id_corredor`) ,
  CONSTRAINT `fk_asociacion_has_corredor_asociacion`
    FOREIGN KEY (`id_asociacion` )
    REFERENCES `suca_sports`.`asociacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asociacion_has_corredor_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_asociacion_has_corredor_asociacion` ON `suca_sports`.`asociacion_corredor` (`id_asociacion` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_asociacion_has_corredor_corredor` ON `suca_sports`.`asociacion_corredor` (`id_corredor` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`categoria` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `regla` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`categoria_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`categoria_carrera` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`categoria_carrera` (
  `id_categoria` INT(11) NOT NULL DEFAULT '0' ,
  `id_carrera` INT(11) NOT NULL DEFAULT '0' ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_carrera`, `id_categoria`) ,
  CONSTRAINT `fk_categoria_carrera_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `suca_sports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_id_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `suca_sports`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_categoria_carrera_id_categoria` ON `suca_sports`.`categoria_carrera` (`id_categoria` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_categoria_carrera_carrera` ON `suca_sports`.`categoria_carrera` (`id_carrera` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`corredor_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`corredor_equipamiento` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`corredor_equipamiento` (
  `id_corredor` INT(11) NOT NULL ,
  `id_equipamiento` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_corredor`, `id_equipamiento`) ,
  CONSTRAINT `fk_corredor_has_equipamiento_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_has_equipamiento_equipamiento`
    FOREIGN KEY (`id_equipamiento` )
    REFERENCES `suca_sports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_has_equipamiento_corredor` ON `suca_sports`.`corredor_equipamiento` (`id_corredor` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_corredor_has_equipamiento_equipamiento` ON `suca_sports`.`corredor_equipamiento` (`id_equipamiento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`equipamiento_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`equipamiento_carrera` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`equipamiento_carrera` (
  `id_tipo_equipamiento` INT(11) NOT NULL ,
  `fecha_inicio` DATE NOT NULL ,
  `id_etapa` INT(11) NOT NULL ,
  `id_carrera` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY USING BTREE (`id_etapa`, `fecha_inicio`, `id_carrera`, `id_tipo_equipamiento`) ,
  CONSTRAINT `fk_equipamiento_carrera_id_carrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `suca_sports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `suca_sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'Tipo de Equipamiento para una Fecha de Etapa de Carrera';

SHOW WARNINGS;
CREATE INDEX `fk_equipamiento_carrera_id_carrera` ON `suca_sports`.`equipamiento_carrera` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_equipamiento_carrera_tipo_equipamiento` ON `suca_sports`.`equipamiento_carrera` (`id_tipo_equipamiento` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`inscripcion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`inscripcion` (
  `id_corredor` INT(11) NOT NULL ,
  `fecha_inicio` DATE NOT NULL ,
  `id_etapa` INT(11) NOT NULL ,
  `id_carrera` INT(11) NOT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `fecha_inscripcion` DATE NULL DEFAULT NULL ,
  `firma_digital` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY USING BTREE (`id_corredor`, `fecha_inicio`, `id_carrera`, `id_etapa`) ,
  CONSTRAINT `fk_inscripcion_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_fechaetapacarrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `suca_sports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_inscripcion_id_corredor` ON `suca_sports`.`inscripcion` (`id_corredor` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_inscripcion_fechaetapacarrera` ON `suca_sports`.`inscripcion` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`permiso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`permiso` (
  `permiso` VARCHAR(15) NOT NULL ,
  `grupos_id` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`permiso`, `grupos_id`) ,
  CONSTRAINT `fk_permiso_grupos`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `suca_sports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_permiso_grupos` ON `suca_sports`.`permiso` (`grupos_id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`post` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`post` (
  `id` INT(11) NOT NULL ,
  `texto` TEXT NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_post_usuarios`
    FOREIGN KEY (`created_by` )
    REFERENCES `suca_sports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_usuarios1`
    FOREIGN KEY (`updated_by` )
    REFERENCES `suca_sports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `fk_post_usuarios` ON `suca_sports`.`post` (`created_by` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_post_usuarios1` ON `suca_sports`.`post` (`updated_by` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `suca_sports`.`resultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suca_sports`.`resultado` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`resultado` (
  `id_corredor` INT(11) NOT NULL ,
  `fecha_inicio` DATE NOT NULL ,
  `id_etapa` INT(11) NOT NULL ,
  `id_carrera` INT(11) NOT NULL ,
  `tiempo` TIMESTAMP NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY USING BTREE (`id_corredor`, `fecha_inicio`, `id_etapa`, `id_carrera`) ,
  CONSTRAINT `fk_resultado_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `suca_sports`.`corredor` (`id` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_resultado_fechaetapacarrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `suca_sports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

SHOW WARNINGS;
CREATE INDEX `ix_resultado_corredor` ON `suca_sports`.`resultado` (`id_corredor` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ix_resultado_fechaetapacarrera` ON `suca_sports`.`resultado` (`id_carrera` ASC, `id_etapa` ASC, `fecha_inicio` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_resultado_fechaetapacarrera` ON `suca_sports`.`resultado` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
