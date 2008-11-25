<?php

/**
 * Subclass for representing a row from the 'fecha_etapa_carrera' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FechaEtapaCarrera extends BaseFechaEtapaCarrera
{
    public function __toString() {
      return $this->getNombre();
    }
    
    public function getCarreraNombre(){
        $carrera = CarreraPeer::retrieveByPK($this->getIdCarrera());
        return $carrera->getNombre();
    }

    Public function getEtapNombre(){
        $etapa = new EtapaCarrera;
        $etapa = EtapaCarreraPeer::retrieveByPK(1,2);
        return "PUTO";
    }
 
    
}
