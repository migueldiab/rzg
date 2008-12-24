INSERT INTO `localidad` (`id`,`id_pais`,`nombre`,`updated_by`,`updated_at`) VALUES
 (1,1,'Maldonado',NULL,NULL);

 
INSERT INTO `pais` (`id`,`nombre`,`updated_by`,`updated_at`) VALUES 
 (1,'Uruguay',NULL,NULL);

INSERT INTO `post` (`id`,`texto`,`created_by`,`created_at`,`updated_by`,`updated_at`) VALUES 
 (1,' Falta pocos días para la última fecha del 2008 de Misión GT, el Arboretum Lussich será el escenario natural para esta nueva aventura,\r\n\r\n \r\n\r\nno te la pierdas, inscribite y ....\r\n\r\n \r\n\r\n nos vemos en carrera!\r\n\r\n \r\n\r\nFORMATO\r\n\r\n \r\n\r\nEl formato es tipo triatlón, el lugar de largada, llegada y parque cerrado será siempre en el mismo lugar. Desde el parque cerrado saldrán a remar y luego harán las transiciones al mountain bike y por ultimo al running.\r\n\r\nLa carrera será en la playa de la Laguna del Sauce, a una cuadra del Hotel Barceló Laguna del Sauce.',NULL,NULL,NULL,NULL),
 (2,'otro post',NULL,NULL,NULL,NULL),
 (3,'este es un tercero',NULL,NULL,NULL,NULL),
 (4,'ufffa.... toy cansado',NULL,NULL,NULL,NULL),
 (5,'list, no va mas',NULL,NULL,NULL,NULL);

INSERT INTO `sociedad_medica` (`id`,`nombre`,`updated_at`,`updated_by`) VALUES 
 (1,'Asistencial Medica de Maldonado',NULL,NULL);

INSERT INTO `tipo_documento` (`id`,`nombre`) VALUES 
 (1,'CI'),
 (2,'Pasaporte'),
 (3,'DNI');

INSERT INTO `grupo` (`id`, `nombre`)
(1, `Admin`);

INSERT INTO `usuario` (`id`,`documento`,`email`,`password`,`id_grupo`,`id_corredor`,`estado`,`verificador`,`pregunta_secreta`,`respuesta_secreta`,`created_at`,`created_by`,`updated_at`,`updated_by`) VALUES 
 (1,'28597576','migueldiab@gmail.com','b7d8e8e641c8c0b0f6b9e4009da0bedc398927b6',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2008-12-11 01:07:37',NULL),
 (2,'alberto',NULL,'b7d8e8e641c8c0b0f6b9e4009da0bedc398927b6',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2008-12-03 12:58:08',NULL),
 (3,'12345','mike@mike.com','cae758978da31fa3b0b19edb1177738d4f57f8dd',NULL,NULL,NULL,NULL,NULL,NULL,'2008-12-11 02:29:54',NULL,'2008-12-11 02:29:54',NULL),
 (4,'1234','mike@mike.com','e58bfdbc83a1c1fb607efb00c9256d146137b4f1',NULL,NULL,NULL,NULL,NULL,NULL,'2008-12-11 02:42:01',NULL,'2008-12-11 02:43:04',NULL);