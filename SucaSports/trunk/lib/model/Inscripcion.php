<?php

/**
 * Subclass for representing a row from the 'inscripcion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Inscripcion extends BaseInscripcion
{
  public function getCarrera($con = null)
  {
    if ($this->aCarrera === null && ($this->id_carrera !== null)) {
      $this->aCarrera = CarreraPeer::retrieveByPK($this->id_carrera, $con);
    }
    return $this->aCarrera;
  }
 public function getEtapa($con = null)
  {
    if ($this->aEtapa === null && ($this->id_etapa !== null)) {
      $this->aEtapa = EtapaCarreraPeer::retrieveByPK($this->id_etapa, $this->id_carrera, $con);
    }
    return $this->aEtapa;
  }
  
}
