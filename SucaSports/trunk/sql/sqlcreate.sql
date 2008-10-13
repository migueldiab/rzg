SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `Suca_Sports` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `Suca_Sports`;

-- -----------------------------------------------------
-- Table `Suca_Sports`.`carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`carrera` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`carrera` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `url` VARCHAR(45) NULL ,
  `descripcion` TEXT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`etapa_carrera` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`etapa_carrera` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_carrera` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `numero_etapa` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`, `id_carrera`) ,
  CONSTRAINT `fk_etapa_carrera_etapa`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `Suca_Sports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_etapa_carrera_etapa` ON `Suca_Sports`.`etapa_carrera` (`id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`fecha_etapa_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`fecha_etapa_carrera` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`fecha_etapa_carrera` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `max_corredores` INT NULL ,
  `fecha_inicio` DATE NOT NULL ,
  `fecha_fin` DATE NULL ,
  `costo` DOUBLE NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `id_etapa_carrera` INT NOT NULL ,
  `id_carrera` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_fecha_etapa_carrera_etapa_carrera`
    FOREIGN KEY (`id_etapa_carrera` , `id_carrera` )
    REFERENCES `Suca_Sports`.`etapa_carrera` (`id` , `id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_fecha_etapa_carrera_etapa_carrera` ON `Suca_Sports`.`fecha_etapa_carrera` (`id_etapa_carrera` ASC, `id_carrera` ASC) ;

CREATE UNIQUE INDEX `unique_etapa_carrera_fecha` ON `Suca_Sports`.`fecha_etapa_carrera` (`fecha_inicio` ASC, `id_etapa_carrera` ASC, `id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`tipo_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`tipo_equipamiento` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`tipo_equipamiento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`equipamiento` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`equipamiento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `marca` VARCHAR(45) NULL ,
  `id_tipo_equipamiento` INT NOT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_equipamiento_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_equipamiento_tipo_equipamiento` ON `Suca_Sports`.`equipamiento` (`id_tipo_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`estado` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`inventario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`inventario` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`inventario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `id_tipo_equipamiento` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `id_estado` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_inventario_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `Suca_Sports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_inventario_tipo_equipamiento` ON `Suca_Sports`.`inventario` (`id_tipo_equipamiento` ASC) ;

CREATE INDEX `fk_inventario_estado` ON `Suca_Sports`.`inventario` (`id_estado` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`equipamiento_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`equipamiento_carrera` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`equipamiento_carrera` (
  `id_fecha_etapa_carrera` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo_equipamiento` INT NOT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id_fecha_etapa_carrera`) ,
  CONSTRAINT `fk_equipamiento_carrera_id_carrera`
    FOREIGN KEY (`id_fecha_etapa_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_equipamiento_carrera_id_carrera` ON `Suca_Sports`.`equipamiento_carrera` (`id_fecha_etapa_carrera` ASC) ;

CREATE INDEX `fk_equipamiento_carrera_tipo_equipamiento` ON `Suca_Sports`.`equipamiento_carrera` (`id_tipo_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`grupo` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`grupo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL COMMENT '	' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`sociedad_medica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`sociedad_medica` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`sociedad_medica` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`pais` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `updated_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`localidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`localidad` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`localidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_pais` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `updated_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_localidad_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `Suca_Sports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_localidad_id_pais` ON `Suca_Sports`.`localidad` (`id_pais` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`chip`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`chip` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`chip` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo_chip` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `id_estado` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_chip_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `Suca_Sports`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_chip_estado` ON `Suca_Sports`.`chip` (`id_estado` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`tipo_documento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`tipo_documento` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`tipo_documento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`corredor` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`corredor` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `documento` VARCHAR(45) NULL ,
  `id_tipo_documento` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `movil` VARCHAR(45) NULL ,
  `telefono_emergencia` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `fecha_nacimiento` DATE NULL ,
  `pareja` VARCHAR(45) NULL ,
  `hijos` VARCHAR(45) NULL ,
  `id_sociedad_medica` INT NULL ,
  `historia_medica` TEXT NULL ,
  `sexo` VARCHAR(1) NULL ,
  `id_localidad` INT NULL ,
  `id_pais` INT NULL ,
  `id_chips` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_corredor_id_sociedad_medida`
    FOREIGN KEY (`id_sociedad_medica` )
    REFERENCES `Suca_Sports`.`sociedad_medica` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `Suca_Sports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad`
    FOREIGN KEY (`id_localidad` )
    REFERENCES `Suca_Sports`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_chips`
    FOREIGN KEY (`id_chips` )
    REFERENCES `Suca_Sports`.`chip` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_tipo_documento`
    FOREIGN KEY (`id_tipo_documento` )
    REFERENCES `Suca_Sports`.`tipo_documento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_corredor_id_sociedad_medida` ON `Suca_Sports`.`corredor` (`id_sociedad_medica` ASC) ;

CREATE INDEX `fk_corredor_id_pais` ON `Suca_Sports`.`corredor` (`id_pais` ASC) ;

CREATE INDEX `fk_corredor_id_localidad` ON `Suca_Sports`.`corredor` (`id_localidad` ASC) ;

CREATE INDEX `fk_corredor_chips` ON `Suca_Sports`.`corredor` (`id_chips` ASC) ;

CREATE INDEX `fk_corredor_tipo_documento` ON `Suca_Sports`.`corredor` (`id_tipo_documento` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `id_grupo` INT NULL ,
  `id_corredor` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`id_grupo` )
    REFERENCES `Suca_Sports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_usuarios_grupos` ON `Suca_Sports`.`usuario` (`id_grupo` ASC) ;

CREATE INDEX `fk_usuarios_corredor` ON `Suca_Sports`.`usuario` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`alquiler`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`alquiler` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`alquiler` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_equipamiento` INT NOT NULL ,
  `id_fecha_etapa_carrera` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_alquileres_equipamiento_id`
    FOREIGN KEY (`id_equipamiento` )
    REFERENCES `Suca_Sports`.`inventario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_fecha_carrera_id`
    FOREIGN KEY (`id_fecha_etapa_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_usuarios`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `Suca_Sports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_alquileres_equipamiento_id` ON `Suca_Sports`.`alquiler` (`id_equipamiento` ASC) ;

CREATE INDEX `fk_alquileres_fecha_carrera_id` ON `Suca_Sports`.`alquiler` (`id_fecha_etapa_carrera` ASC) ;

CREATE INDEX `fk_alquileres_usuarios` ON `Suca_Sports`.`alquiler` (`id_usuario` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`forma_pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`forma_pago` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`forma_pago` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`cuenta_corriente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`cuenta_corriente` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`cuenta_corriente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_corredor` INT NOT NULL ,
  `id_forma_pago` INT NOT NULL ,
  `monto` DOUBLE NOT NULL ,
  `concepto` VARCHAR(45) NULL ,
  `firma_digital` VARCHAR(255) NULL ,
  `fecha_de_pago` DATE NULL ,
  `nota` TEXT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_cuenta_corriente_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_corriente_id_forma_pago`
    FOREIGN KEY (`id_forma_pago` )
    REFERENCES `Suca_Sports`.`forma_pago` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_cuenta_corriente_id_corredor` ON `Suca_Sports`.`cuenta_corriente` (`id_corredor` ASC) ;

CREATE INDEX `fk_cuenta_corriente_id_forma_pago` ON `Suca_Sports`.`cuenta_corriente` (`id_forma_pago` ASC) ;

CREATE INDEX `idx_cuenta_corriente_fecha_de_pago_desc` ON `Suca_Sports`.`cuenta_corriente` (`fecha_de_pago` DESC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`inscripcion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`inscripcion` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`inscripcion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_fecha_etapa_carrera` INT NOT NULL ,
  `id_corredor` INT NOT NULL ,
  `created_at` TIMESTAMP NULL ,
  `created_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `fecha_inscripcion` DATE NULL ,
  `firma_digital` VARCHAR(255) NULL ,
  `cuenta_corriente_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_inscripcion_id_carrera`
    FOREIGN KEY (`id_fecha_etapa_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_cuenta_corriente`
    FOREIGN KEY (`cuenta_corriente_id` )
    REFERENCES `Suca_Sports`.`cuenta_corriente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_inscripcion_id_carrera` ON `Suca_Sports`.`inscripcion` (`id_fecha_etapa_carrera` ASC) ;

CREATE INDEX `fk_inscripcion_id_corredor` ON `Suca_Sports`.`inscripcion` (`id_corredor` ASC) ;

CREATE INDEX `fk_inscripcion_cuenta_corriente` ON `Suca_Sports`.`inscripcion` (`cuenta_corriente_id` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`asociacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`asociacion` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`asociacion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `contacto` VARCHAR(45) NULL ,
  `created_by` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`resultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`resultado` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`resultado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_fecha_etapa_carrera` INT NOT NULL ,
  `id_corredor` INT NOT NULL ,
  `tiempo` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_resultados_fecha_carrera`
    FOREIGN KEY (`id_fecha_etapa_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_resultados_fecha_carrera` ON `Suca_Sports`.`resultado` (`id_fecha_etapa_carrera` ASC) ;

CREATE INDEX `fk_resultado_corredor` ON `Suca_Sports`.`resultado` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`categoria` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `regla` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`categoria_carrera`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`categoria_carrera` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`categoria_carrera` (
  `id_categoria` INT NOT NULL ,
  `id_carrera` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id_categoria`) ,
  CONSTRAINT `fk_categoria_carrera_id_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `Suca_Sports`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `Suca_Sports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_categoria_carrera_id_categoria` ON `Suca_Sports`.`categoria_carrera` (`id_categoria` ASC) ;

CREATE INDEX `fk_categoria_carrera_carrera` ON `Suca_Sports`.`categoria_carrera` (`id_carrera` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`corredor_equipamiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`corredor_equipamiento` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`corredor_equipamiento` (
  `id_corredor` INT NOT NULL ,
  `id_equipamiento` INT NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id_corredor`, `id_equipamiento`) ,
  CONSTRAINT `fk_corredor_has_equipamiento_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_has_equipamiento_equipamiento`
    FOREIGN KEY (`id_equipamiento` )
    REFERENCES `Suca_Sports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_corredor_has_equipamiento_corredor` ON `Suca_Sports`.`corredor_equipamiento` (`id_corredor` ASC) ;

CREATE INDEX `fk_corredor_has_equipamiento_equipamiento` ON `Suca_Sports`.`corredor_equipamiento` (`id_equipamiento` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`asociacion_corredor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`asociacion_corredor` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`asociacion_corredor` (
  `id_corredor` INT NOT NULL ,
  `id_asociacion` INT NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id_asociacion`, `id_corredor`) ,
  CONSTRAINT `fk_asociacion_has_corredor_asociacion`
    FOREIGN KEY (`id_asociacion` )
    REFERENCES `Suca_Sports`.`asociacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asociacion_has_corredor_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_asociacion_has_corredor_asociacion` ON `Suca_Sports`.`asociacion_corredor` (`id_asociacion` ASC) ;

CREATE INDEX `fk_asociacion_has_corredor_corredor` ON `Suca_Sports`.`asociacion_corredor` (`id_corredor` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`post` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`post` (
  `id` INT NOT NULL ,
  `texto` TEXT NULL ,
  `created_by` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_post_usuarios`
    FOREIGN KEY (`created_by` )
    REFERENCES `Suca_Sports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_usuarios1`
    FOREIGN KEY (`updated_by` )
    REFERENCES `Suca_Sports`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_post_usuarios` ON `Suca_Sports`.`post` (`created_by` ASC) ;

CREATE INDEX `fk_post_usuarios1` ON `Suca_Sports`.`post` (`updated_by` ASC) ;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Suca_Sports`.`permiso` ;

CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`permiso` (
  `permiso` VARCHAR(15) NOT NULL ,
  `grupos_id` INT NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`permiso`, `grupos_id`) ,
  CONSTRAINT `fk_permiso_grupos`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `Suca_Sports`.`grupo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_permiso_grupos` ON `Suca_Sports`.`permiso` (`grupos_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
