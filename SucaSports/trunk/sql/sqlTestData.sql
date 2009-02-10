INSERT INTO `pais` (`id`,`nombre`,`updated_by`,`updated_at`) VALUES
 (1,'Uruguay',NULL,NULL);

INSERT INTO `localidad` (`id`,`id_pais`,`nombre`,`updated_by`,`updated_at`) VALUES
 (1,1,'Maldonado',NULL,NULL);

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

INSERT INTO `grupo` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'corredor');
