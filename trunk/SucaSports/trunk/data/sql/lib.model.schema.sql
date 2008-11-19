
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- alquiler
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `alquiler`;


CREATE TABLE `alquiler`
(
	`id_inventario` INTEGER  NOT NULL,
	`fecha_inicio` DATE  NOT NULL,
	`id_etapa` INTEGER  NOT NULL,
	`id_carrera` INTEGER  NOT NULL,
	`id_cuenta_corriente` INTEGER  NOT NULL,
	`id_corredor` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_inventario`,`fecha_inicio`,`id_etapa`,`id_carrera`,`id_cuenta_corriente`,`id_corredor`),
	KEY `fk_alquiler_inventario`(`id_inventario`),
	KEY `fk_alquiler_fecha_etapa_carrera`(`fecha_inicio`, `id_etapa`, `id_carrera`),
	KEY `fk_alquiler_cuenta_corriente`(`id_cuenta_corriente`, `id_corredor`),
	CONSTRAINT `alquiler_FK_1`
		FOREIGN KEY (`id_inventario`)
		REFERENCES `inventario` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- asociacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `asociacion`;


CREATE TABLE `asociacion`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`direccion` VARCHAR(45),
	`telefono` VARCHAR(45),
	`contacto` VARCHAR(45),
	`created_by` INTEGER,
	`created_at` DATETIME,
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- asociacion_corredor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `asociacion_corredor`;


CREATE TABLE `asociacion_corredor`
(
	`id_corredor` INTEGER  NOT NULL,
	`id_asociacion` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_corredor`,`id_asociacion`),
	KEY `fk_asociacion_has_corredor_asociacion`(`id_asociacion`),
	KEY `fk_asociacion_has_corredor_corredor`(`id_corredor`),
	CONSTRAINT `asociacion_corredor_FK_1`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `asociacion_corredor_FK_2`
		FOREIGN KEY (`id_asociacion`)
		REFERENCES `asociacion` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `carrera`;


CREATE TABLE `carrera`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`url` VARCHAR(45),
	`descripcion` TEXT,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` VARCHAR(45),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- categoria
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;


CREATE TABLE `categoria`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`regla` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- categoria_carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria_carrera`;


CREATE TABLE `categoria_carrera`
(
	`id_categoria` INTEGER default 0 NOT NULL,
	`id_carrera` INTEGER default 0 NOT NULL,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_categoria`,`id_carrera`),
	KEY `fk_categoria_carrera_id_categoria`(`id_categoria`),
	KEY `fk_categoria_carrera_carrera`(`id_carrera`),
	CONSTRAINT `categoria_carrera_FK_1`
		FOREIGN KEY (`id_categoria`)
		REFERENCES `categoria` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `categoria_carrera_FK_2`
		FOREIGN KEY (`id_carrera`)
		REFERENCES `carrera` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- chip
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `chip`;


CREATE TABLE `chip`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`codigo_chip` VARCHAR(45),
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`id_estado` INTEGER,
	PRIMARY KEY (`id`),
	KEY `fk_chip_estado`(`id_estado`),
	CONSTRAINT `chip_FK_1`
		FOREIGN KEY (`id_estado`)
		REFERENCES `estado` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- corredor
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `corredor`;


CREATE TABLE `corredor`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`documento` VARCHAR(45),
	`id_tipo_documento` INTEGER,
	`nombre` VARCHAR(45),
	`apellido` VARCHAR(45),
	`telefono` VARCHAR(45),
	`movil` VARCHAR(45),
	`telefono_emergencia` VARCHAR(45),
	`direccion` VARCHAR(45),
	`fecha_nacimiento` DATE,
	`pareja` VARCHAR(45),
	`hijos` VARCHAR(45),
	`id_sociedad_medica` INTEGER,
	`historia_medica` TEXT,
	`sexo` VARCHAR(1),
	`id_localidad` INTEGER,
	`id_pais` INTEGER,
	`id_chips` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER,
	PRIMARY KEY (`id`),
	KEY `fk_corredor_id_sociedad_medida`(`id_sociedad_medica`),
	KEY `fk_corredor_id_pais`(`id_pais`),
	KEY `fk_corredor_id_localidad`(`id_localidad`),
	KEY `fk_corredor_chips`(`id_chips`),
	KEY `fk_corredor_tipo_documento`(`id_tipo_documento`),
	CONSTRAINT `corredor_FK_1`
		FOREIGN KEY (`id_tipo_documento`)
		REFERENCES `tipo_documento` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `corredor_FK_2`
		FOREIGN KEY (`id_sociedad_medica`)
		REFERENCES `sociedad_medica` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `corredor_FK_3`
		FOREIGN KEY (`id_localidad`)
		REFERENCES `localidad` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `corredor_FK_4`
		FOREIGN KEY (`id_pais`)
		REFERENCES `pais` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `corredor_FK_5`
		FOREIGN KEY (`id_chips`)
		REFERENCES `chip` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- corredor_equipamiento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `corredor_equipamiento`;


CREATE TABLE `corredor_equipamiento`
(
	`id_corredor` INTEGER  NOT NULL,
	`id_equipamiento` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_corredor`,`id_equipamiento`),
	KEY `fk_corredor_has_equipamiento_corredor`(`id_corredor`),
	KEY `fk_corredor_has_equipamiento_equipamiento`(`id_equipamiento`),
	CONSTRAINT `corredor_equipamiento_FK_1`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `corredor_equipamiento_FK_2`
		FOREIGN KEY (`id_equipamiento`)
		REFERENCES `equipamiento` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- cuenta_corriente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cuenta_corriente`;


CREATE TABLE `cuenta_corriente`
(
	`id` INTEGER  NOT NULL,
	`id_corredor` INTEGER  NOT NULL,
	`id_forma_pago` INTEGER  NOT NULL,
	`monto` DOUBLE  NOT NULL,
	`concepto` VARCHAR(45),
	`firma_digital` VARCHAR(255),
	`fecha_de_pago` DATE,
	`nota` TEXT,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`,`id_corredor`),
	KEY `fk_cuenta_corriente_id_forma_pago`(`id_forma_pago`),
	KEY `ix_cuenta_corriente_fecha_de_pago_desc`(`fecha_de_pago`),
	KEY `fk_cuenta_corriente_corredor`(`id_corredor`),
	CONSTRAINT `cuenta_corriente_FK_1`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `cuenta_corriente_FK_2`
		FOREIGN KEY (`id_forma_pago`)
		REFERENCES `forma_pago` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- equipamiento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `equipamiento`;


CREATE TABLE `equipamiento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`marca` VARCHAR(45),
	`id_tipo_equipamiento` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	KEY `fk_equipamiento_tipo_equipamiento`(`id_tipo_equipamiento`),
	CONSTRAINT `equipamiento_FK_1`
		FOREIGN KEY (`id_tipo_equipamiento`)
		REFERENCES `tipo_equipamiento` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- equipamiento_carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `equipamiento_carrera`;


CREATE TABLE `equipamiento_carrera`
(
	`id_tipo_equipamiento` INTEGER  NOT NULL,
	`fecha_inicio` DATE  NOT NULL,
	`id_etapa` INTEGER  NOT NULL,
	`id_carrera` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_tipo_equipamiento`,`fecha_inicio`,`id_etapa`,`id_carrera`),
	KEY `fk_equipamiento_carrera_id_carrera`(`fecha_inicio`, `id_etapa`, `id_carrera`),
	KEY `fk_equipamiento_carrera_tipo_equipamiento`(`id_tipo_equipamiento`),
	CONSTRAINT `equipamiento_carrera_FK_1`
		FOREIGN KEY (`id_tipo_equipamiento`)
		REFERENCES `tipo_equipamiento` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- estado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `estado`;


CREATE TABLE `estado`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`updated_at` DATETIME,
	`updated_by` VARCHAR(45),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- etapa_carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `etapa_carrera`;


CREATE TABLE `etapa_carrera`
(
	`id_etapa` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_carrera` INTEGER  NOT NULL,
	`nombre` VARCHAR(45),
	`numero_etapa` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_etapa`,`id_carrera`),
	KEY `fk_etapa_carrera_etapa`(`id_carrera`),
	CONSTRAINT `etapa_carrera_FK_1`
		FOREIGN KEY (`id_carrera`)
		REFERENCES `carrera` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- fecha_etapa_carrera
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `fecha_etapa_carrera`;


CREATE TABLE `fecha_etapa_carrera`
(
	`fecha_inicio` DATE  NOT NULL,
	`id_etapa` INTEGER  NOT NULL,
	`id_carrera` INTEGER  NOT NULL,
	`max_corredores` INTEGER,
	`fecha_fin` DATE,
	`costo` DOUBLE,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`fecha_inicio`,`id_etapa`,`id_carrera`),
	KEY `fk_fecha_etapa_carrera_etapa_carrera`(`id_etapa`, `id_carrera`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- forma_pago
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `forma_pago`;


CREATE TABLE `forma_pago`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- grupo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `grupo`;


CREATE TABLE `grupo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- inscripcion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `inscripcion`;


CREATE TABLE `inscripcion`
(
	`id_corredor` INTEGER  NOT NULL,
	`fecha_inicio` DATE  NOT NULL,
	`id_etapa` INTEGER  NOT NULL,
	`id_carrera` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`fecha_inscripcion` DATE,
	`firma_digital` VARCHAR(255),
	PRIMARY KEY (`id_corredor`,`fecha_inicio`,`id_etapa`,`id_carrera`),
	KEY `fk_inscripcion_id_corredor`(`id_corredor`),
	KEY `fk_inscripcion_fechaetapacarrera`(`fecha_inicio`, `id_etapa`, `id_carrera`),
	CONSTRAINT `inscripcion_FK_1`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- inventario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `inventario`;


CREATE TABLE `inventario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`id_tipo_equipamiento` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`id_estado` INTEGER,
	PRIMARY KEY (`id`),
	KEY `fk_inventario_tipo_equipamiento`(`id_tipo_equipamiento`),
	KEY `fk_inventario_estado`(`id_estado`),
	CONSTRAINT `inventario_FK_1`
		FOREIGN KEY (`id_tipo_equipamiento`)
		REFERENCES `equipamiento` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `inventario_FK_2`
		FOREIGN KEY (`id_estado`)
		REFERENCES `estado` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- localidad
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `localidad`;


CREATE TABLE `localidad`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`id_pais` INTEGER,
	`nombre` VARCHAR(45),
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `fk_localidad_id_pais`(`id_pais`),
	CONSTRAINT `localidad_FK_1`
		FOREIGN KEY (`id_pais`)
		REFERENCES `pais` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- pais
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pais`;


CREATE TABLE `pais`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- permiso
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `permiso`;


CREATE TABLE `permiso`
(
	`permiso` VARCHAR(15)  NOT NULL,
	`grupos_id` INTEGER  NOT NULL,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`permiso`,`grupos_id`),
	KEY `fk_permiso_grupos`(`grupos_id`),
	CONSTRAINT `permiso_FK_1`
		FOREIGN KEY (`grupos_id`)
		REFERENCES `grupo` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;


CREATE TABLE `post`
(
	`id` INTEGER  NOT NULL,
	`texto` TEXT,
	`created_by` INTEGER,
	`created_at` DATETIME,
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `fk_post_usuarios`(`created_by`),
	KEY `fk_post_usuarios1`(`updated_by`),
	CONSTRAINT `post_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `usuario` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `post_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `usuario` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- resultado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `resultado`;


CREATE TABLE `resultado`
(
	`id_corredor` INTEGER  NOT NULL,
	`fecha_inicio` DATE  NOT NULL,
	`id_etapa` INTEGER  NOT NULL,
	`id_carrera` INTEGER  NOT NULL,
	`tiempo` DATETIME,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id_corredor`,`fecha_inicio`,`id_etapa`,`id_carrera`),
	KEY `ix_resultado_corredor`(`id_corredor`),
	KEY `ix_resultado_fechaetapacarrera`(`id_carrera`, `id_etapa`, `fecha_inicio`),
	KEY `fk_resultado_fechaetapacarrera`(`fecha_inicio`, `id_etapa`, `id_carrera`),
	CONSTRAINT `resultado_FK_1`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sociedad_medica
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sociedad_medica`;


CREATE TABLE `sociedad_medica`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_documento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_documento`;


CREATE TABLE `tipo_documento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_equipamiento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_equipamiento`;


CREATE TABLE `tipo_equipamiento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipo` VARCHAR(45),
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- usuario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;


CREATE TABLE `usuario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(45),
	`id_grupo` INTEGER,
	`id_corredor` INTEGER,
	`created_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`password` VARCHAR(45)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `fk_usuarios_grupos`(`id_grupo`),
	KEY `fk_usuarios_corredor`(`id_corredor`),
	CONSTRAINT `usuario_FK_1`
		FOREIGN KEY (`id_grupo`)
		REFERENCES `grupo` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	CONSTRAINT `usuario_FK_2`
		FOREIGN KEY (`id_corredor`)
		REFERENCES `corredor` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
