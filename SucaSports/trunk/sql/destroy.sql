SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;

USE `mydb`;

ALTER TABLE `suca_sports`.`alquiler` DROP COLUMN `id_fecha_etapa_carrera` , ADD COLUMN `fecha_inicio_etapa` DATE NOT NULL  AFTER `updated_by` , ADD COLUMN `id_carrera` INT(11) NOT NULL  AFTER `updated_by` , ADD COLUMN `id_etapa_carrera` INT(11) NOT NULL  AFTER `id_carrera` , DROP FOREIGN KEY `fk_alquileres_fecha_carrera_id` ;

ALTER TABLE `suca_sports`.`alquiler` 
  ADD CONSTRAINT `fk_alquileres_fechaetapacarrera`
  FOREIGN KEY (`id_carrera` , `fecha_inicio_etapa` , `id_etapa_carrera` )
  REFERENCES `suca_sports`.`fecha_etapa_carrera` (`id_carrera` , `fecha_inicio` , `id_etapa_carrera` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_alquileres_fechaetapacarrera` (`id_carrera` ASC, `fecha_inicio_etapa` ASC, `id_etapa_carrera` ASC) 
, DROP INDEX `fk_alquileres_fecha_carrera_id` ;

ALTER TABLE `suca_sports`.`fecha_etapa_carrera` DROP COLUMN `id` , DROP FOREIGN KEY `fk_fecha_etapa_carrera_carrera` 
, DROP INDEX `fk_fecha_etapa_carrera_carrera` 
, DROP INDEX `fk_fecha_etapa_carrera_etapa_carrera` 
, DROP INDEX `unique_etapa_carrera_fecha` 
, DROP PRIMARY KEY 
, ADD PRIMARY KEY (`fecha_inicio`, `id_etapa_carrera`, `id_carrera`) ;

ALTER TABLE `suca_sports`.`inscripcion` DROP COLUMN `id_fecha_etapa_carrera` , ADD COLUMN `fecha_inicio_etapa` DATE NOT NULL  AFTER `cuenta_corriente_id` , ADD COLUMN `id_carrera` INT(11) NOT NULL  AFTER `cuenta_corriente_id` , ADD COLUMN `id_etapa_carrera` INT(11) NOT NULL  AFTER `cuenta_corriente_id` , DROP FOREIGN KEY `fk_inscripcion_id_carrera` ;

ALTER TABLE `suca_sports`.`inscripcion` 
  ADD CONSTRAINT `fk_inscripcion_fechaetapacarrera`
  FOREIGN KEY (`fecha_inicio_etapa` , `id_etapa_carrera` , `id_carrera` )
  REFERENCES `suca_sports`.`fecha_etapa_carrera` (`fecha_inicio` , `id_etapa_carrera` , `id_carrera` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_inscripcion_fechaetapacarrera` (`fecha_inicio_etapa` ASC, `id_etapa_carrera` ASC, `id_carrera` ASC) 
, DROP INDEX `fk_inscripcion_id_carrera` 
, DROP PRIMARY KEY 
, ADD PRIMARY KEY USING BTREE (`id_corredor`, `fecha_inicio_etapa`, `id_carrera`, `id_etapa_carrera`) ;

ALTER TABLE `suca_sports`.`resultado` DROP COLUMN `id_fecha_etapa_carrera` , ADD COLUMN `fecha_inicio_etapa` DATE NOT NULL  AFTER `updated_by` , ADD COLUMN `id_carrera` INT(11) NOT NULL  AFTER `fecha_inicio_etapa` , ADD COLUMN `id_etapa_carrera` INT(11) NOT NULL  AFTER `fecha_inicio_etapa` , DROP FOREIGN KEY `fk_resultados_fecha_carrera` ;

ALTER TABLE `suca_sports`.`resultado` 
  ADD CONSTRAINT `fk_resultado_fechaetapacarrera`
  FOREIGN KEY (`id_carrera` , `id_etapa_carrera` , `fecha_inicio_etapa` )
  REFERENCES `suca_sports`.`fecha_etapa_carrera` (`id_carrera` , `id_etapa_carrera` , `fecha_inicio` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_resultado_fechaetapacarrera` (`id_carrera` ASC, `id_etapa_carrera` ASC, `fecha_inicio_etapa` ASC) 
, DROP INDEX `fk_resultados_fecha_carrera` 
, DROP PRIMARY KEY 
, ADD PRIMARY KEY USING BTREE (`id_corredor`, `fecha_inicio_etapa`, `id_etapa_carrera`, `id_carrera`) ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
