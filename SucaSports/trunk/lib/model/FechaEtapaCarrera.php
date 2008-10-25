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
}
