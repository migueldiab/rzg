ALTER TABLE `inscripcion` ADD COLUMN `id_categoria` INT(11) NOT NULL;

ALTER TABLE `inscripcion` ADD CONSTRAINT `fk_inscripcion_categoria`
    FOREIGN KEY (`id_categoria` )
    REFERENCES `rasengan_sucasports`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

CREATE INDEX `fk_inscripcion_categoria` ON `inscripcion` (`id_categoria` ASC) ;

