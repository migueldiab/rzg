<?php

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
}
