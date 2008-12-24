SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estado` ;

CREATE  TABLE IF NOT EXISTS `estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tipo_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipo_equipamiento` ;

CREATE  TABLE IF NOT EXISTS `tipo_equipamiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `equipamiento` ;

CREATE  TABLE IF NOT EXISTS `equipamiento` (
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
    REFERENCES `rasengan_sucasports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_equipamiento_tipo_equipamiento` ON `equipamiento` (`id_tipo_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `inventario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inventario` ;

CREATE  TABLE IF NOT EXISTS `inventario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `id_tipo_equipamiento` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `id_estado` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_inventario_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `rasengan_sucasports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `rasengan_sucasports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_inventario_tipo_equipamiento` ON `inventario` (`id_tipo_equipamiento` ASC) ;

CREATE INDEX `fk_inventario_estado` ON `inventario` (`id_estado` ASC) ;


-- -----------------------------------------------------
-- Table `chip`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `chip` ;

CREATE  TABLE IF NOT EXISTS `chip` (
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
    REFERENCES `rasengan_sucasports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_chip_estado` ON `chip` (`id_estado` ASC) ;


-- -----------------------------------------------------
-- Table `pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pais` ;

CREATE  TABLE IF NOT EXISTS `pais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `localidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `localidad` ;

CREATE  TABLE IF NOT EXISTS `localidad` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_pais` INT(11) NULL DEFAULT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_localidad_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `rasengan_sucasports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_localidad_id_pais` ON `localidad` (`id_pais` ASC) ;


-- -----------------------------------------------------
-- Table `sociedad_medica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sociedad_medica` ;

CREATE  TABLE IF NOT EXISTS `sociedad_medica` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tipo_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipo_documento` ;

CREATE  TABLE IF NOT EXISTS `tipo_documento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `corredor` ;

CREATE  TABLE IF NOT EXISTS `corredor` (
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
    REFERENCES `rasengan_sucasports`.`chip` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad`
    FOREIGN KEY (`id_localidad` )
    REFERENCES `rasengan_sucasports`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `rasengan_sucasports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_sociedad_medida`
    FOREIGN KEY (`id_sociedad_medica` )
    REFERENCES `rasengan_sucasports`.`sociedad_medica` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_tipo_documento`
    FOREIGN KEY (`id_tipo_documento` )
    REFERENCES `rasengan_sucasports`.`tipo_documento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_corredor_id_sociedad_medida` ON `corredor` (`id_sociedad_medica` ASC) ;

CREATE INDEX `fk_corredor_id_pais` ON `corredor` (`id_pais` ASC) ;

CREATE INDEX `fk_corredor_id_localidad` ON `corredor` (`id_localidad` ASC) ;

CREATE INDEX `fk_corredor_chips` ON `corredor` (`id_chips` ASC) ;

CREATE INDEX `fk_corredor_tipo_documento` ON `corredor` (`id_tipo_documento` ASC) ;


-- -----------------------------------------------------
-- Table `grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `grupo` ;

CREATE  TABLE IF NOT EXISTS `grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL COMMENT '	' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE  TABLE IF NOT EXISTS `usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `documento` VARCHAR(45) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `id_grupo` INT(11) NULL DEFAULT NULL ,
  `id_corredor` INT(11) NULL DEFAULT NULL ,
  `pregunta_secreta` VARCHAR(45) NULL ,
  `respuesta_secreta` VARCHAR(45) NULL ,
  `estado` CHAR(1) NULL ,
  `verificador` VARCHAR(255) NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_usuarios_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`id_grupo` )
    REFERENCES `rasengan_sucasports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_usuarios_grupos` ON `usuario` (`id_grupo` ASC) ;

CREATE INDEX `fk_usuarios_corredor` ON `usuario` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `carrera` ;

CREATE  TABLE IF NOT EXISTS `carrera` (
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


-- -----------------------------------------------------
-- Table `etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `etapa_carrera` ;

CREATE  TABLE IF NOT EXISTS `etapa_carrera` (
  `id_etapa` INT(11) NOT NULL AUTO_INCREMENT ,
  `id_carrera` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `numero_etapa` INT(11) NULL DEFAULT NULL ,
  `estado` CHAR(1) NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_etapa`, `id_carrera`) ,
  CONSTRAINT `fk_etapa_carrera_etapa`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `rasengan_sucasports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_etapa_carrera_etapa` ON `etapa_carrera` (`id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `fecha_etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fecha_etapa_carrera` ;

CREATE  TABLE IF NOT EXISTS `fecha_etapa_carrera` (
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
    REFERENCES `rasengan_sucasports`.`etapa_carrera` (`id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_fecha_etapa_carrera_etapa_carrera` ON `fecha_etapa_carrera` (`id_etapa` ASC, `id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `forma_pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `forma_pago` ;

CREATE  TABLE IF NOT EXISTS `forma_pago` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `cuenta_corriente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cuenta_corriente` ;

CREATE  TABLE IF NOT EXISTS `cuenta_corriente` (
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
    REFERENCES `rasengan_sucasports`.`forma_pago` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_corriente_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'Transacciones Corredor';

CREATE INDEX `fk_cuenta_corriente_id_forma_pago` ON `cuenta_corriente` (`id_forma_pago` ASC) ;

CREATE INDEX `ix_cuenta_corriente_fecha_de_pago_desc` ON `cuenta_corriente` (`fecha_de_pago` DESC) ;

CREATE INDEX `fk_cuenta_corriente_corredor` ON `cuenta_corriente` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `alquiler`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `alquiler` ;

CREATE  TABLE IF NOT EXISTS `alquiler` (
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
    REFERENCES `rasengan_sucasports`.`inventario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquiler_fecha_etapa_carrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `rasengan_sucasports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquiler_cuenta_corriente`
    FOREIGN KEY (`id_cuenta_corriente` , `id_corredor` )
    REFERENCES `rasengan_sucasports`.`cuenta_corriente` (`id` , `id_corredor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_alquiler_inventario` ON `alquiler` (`id_inventario` ASC) ;

CREATE INDEX `fk_alquiler_fecha_etapa_carrera` ON `alquiler` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

CREATE INDEX `fk_alquiler_cuenta_corriente` ON `alquiler` (`id_cuenta_corriente` ASC, `id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `asociacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `asociacion` ;

CREATE  TABLE IF NOT EXISTS `asociacion` (
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


-- -----------------------------------------------------
-- Table `asociacion_corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `asociacion_corredor` ;

CREATE  TABLE IF NOT EXISTS `asociacion_corredor` (
  `id_corredor` INT(11) NOT NULL ,
  `id_asociacion` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_asociacion`, `id_corredor`) ,
  CONSTRAINT `fk_asociacion_has_corredor_asociacion`
    FOREIGN KEY (`id_asociacion` )
    REFERENCES `rasengan_sucasports`.`asociacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asociacion_has_corredor_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_asociacion_has_corredor_asociacion` ON `asociacion_corredor` (`id_asociacion` ASC) ;

CREATE INDEX `fk_asociacion_has_corredor_corredor` ON `asociacion_corredor` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `categoria` ;

CREATE  TABLE IF NOT EXISTS `categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `regla` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `categoria_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `categoria_carrera` ;

CREATE  TABLE IF NOT EXISTS `categoria_carrera` (
  `id_categoria` INT(11) NOT NULL DEFAULT '0' ,
  `id_carrera` INT(11) NOT NULL DEFAULT '0' ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_carrera`, `id_categoria`) ,
  CONSTRAINT `fk_categoria_carrera_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `rasengan_sucasports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_id_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `rasengan_sucasports`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_categoria_carrera_id_categoria` ON `categoria_carrera` (`id_categoria` ASC) ;

CREATE INDEX `fk_categoria_carrera_carrera` ON `categoria_carrera` (`id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `corredor_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `corredor_equipamiento` ;

CREATE  TABLE IF NOT EXISTS `corredor_equipamiento` (
  `id_corredor` INT(11) NOT NULL ,
  `id_equipamiento` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id_corredor`, `id_equipamiento`) ,
  CONSTRAINT `fk_corredor_has_equipamiento_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_has_equipamiento_equipamiento`
    FOREIGN KEY (`id_equipamiento` )
    REFERENCES `rasengan_sucasports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_corredor_has_equipamiento_corredor` ON `corredor_equipamiento` (`id_corredor` ASC) ;

CREATE INDEX `fk_corredor_has_equipamiento_equipamiento` ON `corredor_equipamiento` (`id_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `equipamiento_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `equipamiento_carrera` ;

CREATE  TABLE IF NOT EXISTS `equipamiento_carrera` (
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
    REFERENCES `rasengan_sucasports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `rasengan_sucasports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = 'Tipo de Equipamiento para una Fecha de Etapa de Carrera';

CREATE INDEX `fk_equipamiento_carrera_id_carrera` ON `equipamiento_carrera` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;

CREATE INDEX `fk_equipamiento_carrera_tipo_equipamiento` ON `equipamiento_carrera` (`id_tipo_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inscripcion` ;

CREATE  TABLE IF NOT EXISTS `inscripcion` (
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
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_fechaetapacarrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `rasengan_sucasports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_inscripcion_id_corredor` ON `inscripcion` (`id_corredor` ASC) ;

CREATE INDEX `fk_inscripcion_fechaetapacarrera` ON `inscripcion` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `permiso` ;

CREATE  TABLE IF NOT EXISTS `permiso` (
  `permiso` VARCHAR(15) NOT NULL ,
  `grupos_id` INT(11) NOT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`permiso`, `grupos_id`) ,
  CONSTRAINT `fk_permiso_grupos`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `rasengan_sucasports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_permiso_grupos` ON `permiso` (`grupos_id` ASC) ;


-- -----------------------------------------------------
-- Table `post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `post` ;

CREATE  TABLE IF NOT EXISTS `post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `texto` TEXT NULL DEFAULT NULL ,
  `created_by` INT(11) NULL DEFAULT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT NULL ,
  `updated_by` INT(11) NULL DEFAULT NULL ,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ,
  `fecha_etapa_carrera_fecha_inicio` DATE NULL ,
  `fecha_etapa_carrera_id_etapa` INT(11) NULL ,
  `fecha_etapa_carrera_id_carrera` INT(11) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_post_usuarios`
    FOREIGN KEY (`created_by` )
    REFERENCES `rasengan_sucasports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_usuarios1`
    FOREIGN KEY (`updated_by` )
    REFERENCES `rasengan_sucasports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_fecha_etapa_carrera`
    FOREIGN KEY (`fecha_etapa_carrera_fecha_inicio` , `fecha_etapa_carrera_id_etapa` , `fecha_etapa_carrera_id_carrera` )
    REFERENCES `rasengan_sucasports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `fk_post_usuarios` ON `post` (`created_by` ASC) ;

CREATE INDEX `fk_post_usuarios1` ON `post` (`updated_by` ASC) ;

CREATE INDEX `fk_post_fecha_etapa_carrera` ON `post` (`fecha_etapa_carrera_fecha_inicio` ASC, `fecha_etapa_carrera_id_etapa` ASC, `fecha_etapa_carrera_id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `resultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `resultado` ;

CREATE  TABLE IF NOT EXISTS `resultado` (
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
    REFERENCES `rasengan_sucasports`.`corredor` (`id` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_resultado_fechaetapacarrera`
    FOREIGN KEY (`fecha_inicio` , `id_etapa` , `id_carrera` )
    REFERENCES `rasengan_sucasports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa` , `id_carrera` )
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `ix_resultado_corredor` ON `resultado` (`id_corredor` ASC) ;

CREATE INDEX `ix_resultado_fechaetapacarrera` ON `resultado` (`id_carrera` ASC, `id_etapa` ASC, `fecha_inicio` ASC) ;

CREATE INDEX `fk_resultado_fechaetapacarrera` ON `resultado` (`fecha_inicio` ASC, `id_etapa` ASC, `id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `configuracion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `configuracion` ;

CREATE  TABLE IF NOT EXISTS `configuracion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parametro` VARCHAR(45) NULL ,
  `valor` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `portal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `portal` ;

CREATE  TABLE IF NOT EXISTS `portal` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombrePagina` VARCHAR(45) NULL ,
  `texto` TEXT NULL ,
  `updated_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
