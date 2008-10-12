<?php

/**
 * Subclass for representing a row from the 'sociedad_medica' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SociedadMedica extends BaseSociedadMedica
{
  public function __toString() {
    return $this->getNombre();
  }
    
}
