SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `Suca_Sports` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `Suca_Sports`;

-- -----------------------------------------------------
-- Table `Suca_Sports`.`carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`carrera` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `url` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`etapa_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`etapa_carrera` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `numero_etapa` INT NULL ,
  `id_etapa` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_etapa_carrera_etapa` (`id_etapa` ASC) ,
  CONSTRAINT `fk_etapa_carrera_etapa`
    FOREIGN KEY (`id_etapa` )
    REFERENCES `Suca_Sports`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`fecha_etapa_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`fecha_etapa_carrera` (
  `id` INT NOT NULL ,
  `id_carrera` INT NULL ,
  `max_corredores` INT NULL ,
  `fecha_inicio` DATE NULL ,
  `fecha_fin` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fecha_carrera_id_carrera` (`id_carrera` ASC) ,
  CONSTRAINT `fk_fecha_carrera_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `Suca_Sports`.`etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`tipo_equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`tipo_equipamiento` (
  `id` INT NOT NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`equipamiento` (
  `id` INT NOT NULL ,
  `marca` VARCHAR(45) NULL ,
  `id_tipo_equipamiento` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_equipamiento_tipo_equipamiento` (`id_tipo_equipamiento` ASC) ,
  CONSTRAINT `fk_equipamiento_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`inventario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`inventario` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `id_tipo_equipamiento` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inventario_tipo_equipamiento` (`id_tipo_equipamiento` ASC) ,
  CONSTRAINT `fk_inventario_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`equipamiento_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`equipamiento_carrera` (
  `id_carrera` INT NOT NULL ,
  `id_tipo_equipamiento` INT NULL ,
  PRIMARY KEY (`id_carrera`) ,
  INDEX `fk_equipamiento_carrera_id_carrera` (`id_carrera` ASC) ,
  INDEX `fk_equipamiento_carrera_tipo_equipamiento` (`id_tipo_equipamiento` ASC) ,
  CONSTRAINT `fk_equipamiento_carrera_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `Suca_Sports`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`alquileres`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`alquileres` (
  `id` INT NOT NULL ,
  `id_equipamiento` INT NOT NULL ,
  `id_fecha_carrera` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_alquileres_equipamiento_id` (`id_equipamiento` ASC) ,
  INDEX `fk_alquileres_fecha_carrera_id` (`id_fecha_carrera` ASC) ,
  CONSTRAINT `fk_alquileres_equipamiento_id`
    FOREIGN KEY (`id_equipamiento` )
    REFERENCES `Suca_Sports`.`inventario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_fecha_carrera_id`
    FOREIGN KEY (`id_fecha_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`sociedad_medica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`sociedad_medica` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`pais`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`pais` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`localidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`localidad` (
  `id` INT NOT NULL ,
  `id_pais` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_localidad_id_pais` (`id_pais` ASC) ,
  CONSTRAINT `fk_localidad_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `Suca_Sports`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`chips`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`chips` (
  `id` INT NOT NULL ,
  `codigo_chip` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`grupos` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`usuarios` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `id_grupos` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_grupos` (`id_grupos` ASC) ,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`id_grupos` )
    REFERENCES `Suca_Sports`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`corredor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`corredor` (
  `id` INT NOT NULL ,
  `tipo_documento` INT NULL ,
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
  `historia_medica` VARCHAR(255) NULL ,
  `sexo` VARCHAR(1) NULL ,
  `id_localidad` INT NULL ,
  `id_pais` INT NULL ,
  `id_chips` INT NULL ,
  `id_usuario` INT NOT NULL ,
  PRIMARY KEY (`id`, `id_usuario`) ,
  INDEX `fk_corredor_id_sociedad_medida` (`id_sociedad_medica` ASC) ,
  INDEX `fk_corredor_id_pais` (`id_pais` ASC) ,
  INDEX `fk_corredor_id_localidad` (`id_localidad` ASC) ,
  INDEX `fk_corredor_chips` (`id_chips` ASC) ,
  INDEX `fk_corredor_usuarios` (`id_usuario` ASC) ,
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
    REFERENCES `Suca_Sports`.`chips` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_usuarios`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `Suca_Sports`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`inscripcion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`inscripcion` (
  `id` INT NOT NULL ,
  `id_carrera` INT NOT NULL ,
  `id_corredor` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inscripcion_id_carrera` (`id_carrera` ASC) ,
  INDEX `fk_inscripcion_id_corredor` (`id_corredor` ASC) ,
  CONSTRAINT `fk_inscripcion_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `Suca_Sports`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`asociacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`asociacion` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`forma_pago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`forma_pago` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`cuenta_corriente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`cuenta_corriente` (
  `id` INT NOT NULL ,
  `id_corredor` INT NULL ,
  `id_forma_pago` INT NULL ,
  `monto` DOUBLE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cuenta_corriente_id_corredor` (`id_corredor` ASC) ,
  INDEX `fk_cuenta_corriente_id_forma_pago` (`id_forma_pago` ASC) ,
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


-- -----------------------------------------------------
-- Table `Suca_Sports`.`resultados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`resultados` (
  `id` INT NOT NULL ,
  `id_fecha_carrera` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_resultados_fecha_carrera` (`id_fecha_carrera` ASC) ,
  CONSTRAINT `fk_resultados_fecha_carrera`
    FOREIGN KEY (`id_fecha_carrera` )
    REFERENCES `Suca_Sports`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`categoria` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Suca_Sports`.`categoria_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`categoria_carrera` (
  `id_categoria` INT NOT NULL ,
  `id_carrera` INT NULL ,
  PRIMARY KEY (`id_categoria`) ,
  INDEX `fk_categoria_carrera_id_categoria` (`id_categoria` ASC) ,
  INDEX `fk_categoria_carrera_carrera` (`id_carrera` ASC) ,
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


-- -----------------------------------------------------
-- Table `Suca_Sports`.`corredor_equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`corredor_equipamiento` (
  `id_corredor` INT NOT NULL ,
  `id_equipamiento` INT NOT NULL ,
  PRIMARY KEY (`id_corredor`, `id_equipamiento`) ,
  INDEX `fk_corredor_has_equipamiento_corredor` (`id_corredor` ASC) ,
  INDEX `fk_corredor_has_equipamiento_equipamiento` (`id_equipamiento` ASC) ,
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


-- -----------------------------------------------------
-- Table `Suca_Sports`.`asociacion_corredor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`asociacion_corredor` (
  `id_asociacion` INT NOT NULL ,
  `id_corredor` INT NOT NULL ,
  PRIMARY KEY (`id_asociacion`, `id_corredor`) ,
  INDEX `fk_asociacion_has_corredor_asociacion` (`id_asociacion` ASC) ,
  INDEX `fk_asociacion_has_corredor_corredor` (`id_corredor` ASC) ,
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


-- -----------------------------------------------------
-- Table `Suca_Sports`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Suca_Sports`.`post` (
  `id` INT NOT NULL ,
  `texto` TEXT NULL ,
  `id_usuarios` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_post_usuarios` (`id_usuarios` ASC) ,
  CONSTRAINT `fk_post_usuarios`
    FOREIGN KEY (`id_usuarios` )
    REFERENCES `Suca_Sports`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
