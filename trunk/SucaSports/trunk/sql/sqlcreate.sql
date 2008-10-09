SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`carrera` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `url` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`etapa_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`etapa_carrera` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `numero_etapa` INT NULL ,
  `etapa_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_etapa_carrera_etapa` (`etapa_id` ASC) ,
  CONSTRAINT `fk_etapa_carrera_etapa`
    FOREIGN KEY (`etapa_id` )
    REFERENCES `mydb`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`fecha_etapa_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`fecha_etapa_carrera` (
  `id` INT NOT NULL ,
  `id_carrera` INT NULL ,
  `max_corredores` INT NULL ,
  `fecha_inicio` DATE NULL ,
  `fecha_fin` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fecha_carrera_id_carrera` (`id_carrera` ASC) ,
  CONSTRAINT `fk_fecha_carrera_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `mydb`.`etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tipo_equipamiento` (
  `id` INT NOT NULL ,
  `tipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`equipamiento` (
  `id` INT NOT NULL ,
  `marca` VARCHAR(45) NULL ,
  `id_tipo_equipamiento` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_equipamiento_tipo_equipamiento` (`id_tipo_equipamiento` ASC) ,
  CONSTRAINT `fk_equipamiento_tipo_equipamiento`
    FOREIGN KEY (`id_tipo_equipamiento` )
    REFERENCES `mydb`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`inventario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`inventario` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `tipo_equipamiento_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inventario_tipo_equipamiento` (`tipo_equipamiento_id` ASC) ,
  CONSTRAINT `fk_inventario_tipo_equipamiento`
    FOREIGN KEY (`tipo_equipamiento_id` )
    REFERENCES `mydb`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipamiento_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`equipamiento_carrera` (
  `id_carrera` INT NOT NULL ,
  `tipo_equipamiento_id` INT NULL ,
  PRIMARY KEY (`id_carrera`) ,
  INDEX `fk_equipamiento_carrera_id_carrera` (`id_carrera` ASC) ,
  INDEX `fk_equipamiento_carrera_tipo_equipamiento` (`tipo_equipamiento_id` ASC) ,
  CONSTRAINT `fk_equipamiento_carrera_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `mydb`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipamiento_carrera_tipo_equipamiento`
    FOREIGN KEY (`tipo_equipamiento_id` )
    REFERENCES `mydb`.`tipo_equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alquileres`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`alquileres` (
  `id` INT NOT NULL ,
  `equipamiento_id` INT NOT NULL ,
  `fecha_carrera_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_alquileres_%dcolumn%` (`equipamiento_id` ASC) ,
  INDEX `fk_alquileres_%dcolumn%1` (`fecha_carrera_id` ASC) ,
  CONSTRAINT `fk_alquileres_%dcolumn%`
    FOREIGN KEY (`equipamiento_id` )
    REFERENCES `mydb`.`inventario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alquileres_%dcolumn%1`
    FOREIGN KEY (`fecha_carrera_id` )
    REFERENCES `mydb`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sociedad_medica`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`sociedad_medica` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pais`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`pais` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`localidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`localidad` (
  `id` INT NOT NULL ,
  `id_pais` INT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_localidad_id_pais` (`id_pais` ASC) ,
  CONSTRAINT `fk_localidad_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `mydb`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`chips`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`chips` (
  `id` INT NOT NULL ,
  `codigo_chip` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`grupos` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `grupos_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_grupos` (`grupos_id` ASC) ,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`grupos_id` )
    REFERENCES `mydb`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`corredor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`corredor` (
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
  `usuarios_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `usuarios_id`) ,
  INDEX `fk_corredor_id_sociedad_medida` (`id_sociedad_medica` ASC) ,
  INDEX `fk_corredor_id_pais` (`id_pais` ASC) ,
  INDEX `fk_corredor_id_localidad` (`id_localidad` ASC) ,
  INDEX `fk_corredor_chips` (`id_chips` ASC) ,
  INDEX `fk_corredor_usuarios` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_corredor_id_sociedad_medida`
    FOREIGN KEY (`id_sociedad_medica` )
    REFERENCES `mydb`.`sociedad_medica` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_pais`
    FOREIGN KEY (`id_pais` )
    REFERENCES `mydb`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_id_localidad`
    FOREIGN KEY (`id_localidad` )
    REFERENCES `mydb`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_chips`
    FOREIGN KEY (`id_chips` )
    REFERENCES `mydb`.`chips` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_usuarios`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `mydb`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`inscripcion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`inscripcion` (
  `id` INT NOT NULL ,
  `id_carrera` INT NOT NULL ,
  `id_corredor` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inscripcion_id_carrera` (`id_carrera` ASC) ,
  INDEX `fk_inscripcion_id_corredor` (`id_corredor` ASC) ,
  CONSTRAINT `fk_inscripcion_id_carrera`
    FOREIGN KEY (`id_carrera` )
    REFERENCES `mydb`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscripcion_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `mydb`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asociacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`asociacion` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`forma_pago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`forma_pago` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cuenta_corriente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`cuenta_corriente` (
  `id` INT NOT NULL ,
  `id_corredor` INT NULL ,
  `id_forma_pago` INT NULL ,
  `monto` DOUBLE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cuenta_corriente_id_corredor` (`id_corredor` ASC) ,
  INDEX `fk_cuenta_corriente_id_forma_pago` (`id_forma_pago` ASC) ,
  CONSTRAINT `fk_cuenta_corriente_id_corredor`
    FOREIGN KEY (`id_corredor` )
    REFERENCES `mydb`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_corriente_id_forma_pago`
    FOREIGN KEY (`id_forma_pago` )
    REFERENCES `mydb`.`forma_pago` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`resultados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`resultados` (
  `id` INT NOT NULL ,
  `id_fecha_carrera` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_resultados_fecha_carrera` (`id_fecha_carrera` ASC) ,
  CONSTRAINT `fk_resultados_fecha_carrera`
    FOREIGN KEY (`id_fecha_carrera` )
    REFERENCES `mydb`.`fecha_etapa_carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`categoria` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria_carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`categoria_carrera` (
  `id_categoria` INT NOT NULL ,
  `carrera_id` INT NULL ,
  PRIMARY KEY (`id_categoria`) ,
  INDEX `fk_categoria_carrera_id_categoria` (`id_categoria` ASC) ,
  INDEX `fk_categoria_carrera_carrera` (`carrera_id` ASC) ,
  CONSTRAINT `fk_categoria_carrera_id_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `mydb`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categoria_carrera_carrera`
    FOREIGN KEY (`carrera_id` )
    REFERENCES `mydb`.`carrera` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`corredor_equipamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`corredor_equipamiento` (
  `corredor_id` INT NOT NULL ,
  `equipamiento_id` INT NOT NULL ,
  PRIMARY KEY (`corredor_id`, `equipamiento_id`) ,
  INDEX `fk_corredor_has_equipamiento_corredor` (`corredor_id` ASC) ,
  INDEX `fk_corredor_has_equipamiento_equipamiento` (`equipamiento_id` ASC) ,
  CONSTRAINT `fk_corredor_has_equipamiento_corredor`
    FOREIGN KEY (`corredor_id` )
    REFERENCES `mydb`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_corredor_has_equipamiento_equipamiento`
    FOREIGN KEY (`equipamiento_id` )
    REFERENCES `mydb`.`equipamiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asociacion_corredor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`asociacion_corredor` (
  `asociacion_id` INT NOT NULL ,
  `corredor_id` INT NOT NULL ,
  PRIMARY KEY (`asociacion_id`, `corredor_id`) ,
  INDEX `fk_asociacion_has_corredor_asociacion` (`asociacion_id` ASC) ,
  INDEX `fk_asociacion_has_corredor_corredor` (`corredor_id` ASC) ,
  CONSTRAINT `fk_asociacion_has_corredor_asociacion`
    FOREIGN KEY (`asociacion_id` )
    REFERENCES `mydb`.`asociacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asociacion_has_corredor_corredor`
    FOREIGN KEY (`corredor_id` )
    REFERENCES `mydb`.`corredor` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`post`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`post` (
  `id` INT NOT NULL ,
  `texto` TEXT NULL ,
  `usuarios_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_post_usuarios` (`usuarios_id` ASC) ,
  CONSTRAINT `fk_post_usuarios`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `mydb`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
