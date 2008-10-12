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
      return $nombre = $this->getApellido() + ", " + $this->getNombre();
       
    }
    
}
