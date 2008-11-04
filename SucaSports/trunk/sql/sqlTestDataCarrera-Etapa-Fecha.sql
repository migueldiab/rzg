/*---------------------------------------------
*- Script para crear 1 carrera con
*- dos etapas (1,2) y dos fechas de comienzo.
*--------------------------------------------
*/
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


USE suca_sports;

INSERT INTO carrera(nombre) VALUES("La Carrera de Markster");

INSERT INTO etapa_carrera(id_carrera,nombre,numero_etapa) value((select max(id) from carrera),'Primera etapa',1);

INSERT INTO fecha_etapa_carrera(max_corredores,fecha_inicio,fecha_fin,id_etapa,id_carrera) VALUES(10,current_date,current_date,(select max(id) from etapa_carrera),(select max(id) from carrera));

INSERT INTO etapa_carrera(id_carrera,nombre,numero_etapa) value((select max(id) from carrera),'Segunda etapa',1);

INSERT INTO fecha_etapa_carrera(max_corredores,fecha_inicio,fecha_fin,id_etapa,id_carrera) VALUES(5,current_date + 1,current_date + 1,(select max(id) from etapa_carrera),(select max(id) from carrera));

INSERT INTO `categoria` (`id`,`nombre`,`updated_at`,`updated_by`,`regla`) VALUES (0,'Damas','2008-10-13 00:00:00',NULL,NULL), (1,'Caballeros',NULL,NULL,NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

