DROP TABLE IF EXISTS `suca_sports`.`configuracion` ;
CREATE  TABLE IF NOT EXISTS `suca_sports`.`configuracion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parametro` VARCHAR(45) NULL ,
  `valor` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `updated_at` TIMESTAMP NULL ,
  `updated_by` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


INSERT INTO `suca_sports`.`configuracion` VALUES (null, 'NRO_POST_PRINCIPAL',3,'Cantidad de posts para mostrar en la página principal',null, null);

ALTER TABLE `suca_sports`.`usuario` ADD UNIQUE INDEX `idx_usuarios_documentos`(`documento`);