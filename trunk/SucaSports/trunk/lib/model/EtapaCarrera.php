<?php
require "FechaEtapaCarreraPeer.php";


/**
 * Subclass for representing a row from the 'etapa_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class EtapaCarrera extends BaseEtapaCarrera
{
    public function __toString() {
      return $this->getNombre();
    }
    public function getFechaEtapa($etapa){
     
                $criteria = new Criteria();
		$criteria->add(FechaEtapaCarreraPeer::ID_CARRERA, $etapa->getIdCarrera());
                $criteria->add(FechaEtapaCarreraPeer::ID_ETAPA, $etapa->getIdEtapa());

                FechaEtapaCarreraPeer::addSelectColumns($criteria);
                $arrayfechas = Array();
                $arrayfechas = EtapaCarreraPeer::doSelect($criteria);
      }
}
