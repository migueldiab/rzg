<?php

/**
 * Subclass for representing a row from the 'corredor' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Corredor extends BaseCorredor
{
    public function __toString() {
    	if (!$this->getApellido() || !$this->getNombre()) {
        return false;
      }
      else {
        return $this->getApellido().", ".$this->getNombre();
      }
    }    
}
