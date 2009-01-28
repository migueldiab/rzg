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
      return $this->getCarreraNombre()."-".$this->getEtapaNombre()."-".$this->getFechaInicio();
    }
    
    public function getCarreraNombre(){
        $carrera = CarreraPeer::retrieveByPK($this->getIdCarrera());
        return $carrera->getNombre();
    }

    public function getEtapaNombre(){
        $etapa = new EtapaCarrera;
        $etapa = EtapaCarreraPeer::retrieveByPK($this->getIdEtapa(),$this->getIdCarrera());
        return $etapa->getNombre();
    }
    public function getEtapaNumero(){
        $etapa = new EtapaCarrera;
        $etapa = EtapaCarreraPeer::retrieveByPK($this->getIdEtapa(),$this->getIdCarrera());
        return $etapa->getNumeroEtapa();
    }
    
}
